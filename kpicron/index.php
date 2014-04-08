<?php

include_once 'db_connection.php';
include_once 'kpiclass.php';
$kpiobj = new kpiclass();
$table = 'oauth';
$tablemain = 'oauth_usertoken';

$kpiobj->getallaccesstokentt($table);
$kpiobj->getallaccesstokenfb($tablemain);
global $access_token, $index, $access_token_fb, $index_fb;
$dest = ".\\images\\";
$result = $kpiobj->select("SELECT * FROM brand_detail where brandID IS  NULL");
updatebranddata($result);
//1409270795987491	kpisolution
$result = $kpiobj->select("SELECT * FROM brand_detail where brandID IS NOT NULL"); //1409270795987491	kpisolution
////                link=  "https://twitter.com/"+userpostId[0]['handle']+"/status/"+userpostId[0]['postID'];
// //            https://www.facebook.com/40796308305/posts/10152148484323306
//echo '<pre>';
//print_r($result);
//$as='AAAAAAAAAAAAAAAAAAAAAP0vRQAAAAAA44TgCPucybAvKBwZxZ1jkBBALFE%3DKzMGzhszqOzqWVZb8KkyWuZndEc297YO4OCVmiLo';
//print_r($access_token);
//echo '<pre>';
//exit();

if (count($result) > 0) {
    for ($i = 0; $i < count($result); $i++) {
        $channel_name = trim($result[$i]['channel_name']);
        $brand_id = trim($result[$i]['brand_id']);
        $brand = trim($result[$i]['brand']);
        $brandID = trim($result[$i]['brandID']);
//        $company_id_fk = trim($result[$i]['company_id_fk']);
        if ($channel_name == 'twitter') {
            if ($brand != '') {
                $twitter_details = $kpiobj->getResponse(API_HOST . "statuses/user_timeline.json?screen_name=$brand&count=200&include_rts=1&include_entities=1", $access_token[$index]);
                if (count($twitter_details) > 0) {
                    for ($j = $k; $j < count($twitter_details); $j++) {
                        $tweet_id = $twitter_details[$j]['id_str'];
                        $body = $twitter_details[$j]['text'];
                        $screen_name = $twitter_details[$j]['user']['screen_name'];
                        $created_at = $kpiobj->formateDate(trim($twitter_details[$j]['created_at']), '');
                        $link = "https://twitter.com/" . $screen_name . "/status/" . $tweet_id;
                        if ($tweet_id != '') {
                            $kpiobj->insert("INSERT INTO posts (brand_id_fk,postid,content,posted) VALUES
                     ('$brand_id','$tweet_id','" . htmlspecialchars_decode(addslashes($body)) . "','$created_at','$link')");
                        }
                    }
                }
            }
        } else if ($channel_name == 'facebook') {
            $data = $kpiobj->content_check("" . API_GRAPH . "$brandID/posts?fields=actions,application,coordinates,created_time,description,id,picture,message,story,story_tags,with_tags,link,name,object_id,parent_id,type,shares,source&limit=50&access_token=$access_token_fb[$index_fb]");
            if ($data['data']) {
                $arr = $data['data'];
                for ($k = 0; $k < count($arr); $k++) {
                    $created_at = ($kpiobj->gettime($arr[$k]['created_time']));
                    $postid = $arr['id'];
                    if ($postid != '') {
                        $content = $arr['message'];
                        $type = trim($arr['type']);
                        if ($type == 'swf') {
                            $type == 'Video';
                        }
                        if ($type == 'photo' && $content == '') {
                            $content = $arr['name'];
                            if ($arr['name'] == '') {
                                $content = $arr['story'];
                            }
                        }
                        if ($type == 'status' && $content == '') {
                            $content = $arr['story'];
                        }
                        $patterns = array("'s (.*?) on (.*?)'s wall", "on their own (.*?)", "on (.*?)'s photo", "likes a (.*?)", "on (.*?)'s link");
                        $patterns_flattened = implode('|', $patterns);

                        if (!preg_match_all('/' . $patterns_flattened . '/', $content, $matches)) {
                            if ($arr['actions']) {
                                $link = $arr['actions'][0]['link'];
                            } else {
                                $result = explode("_", $postid);
                                $link = "https://www.facebook.com/$result[0]/posts/$result[1]";
                            }
                        }
                        $kpiobj->insert("INSERT INTO posts (brand_id_fk,postid,content,posted) VALUES
                      ('$brand_id','$postid','" . htmlspecialchars_decode(addslashes($content)) . "','$created_at','$link')");
                    }
                }
            }
        }
    }
}

function updatebranddata($result) {
    global $access_token, $index, $access_token_fb, $index_fb, $kpiobj, $dest;
    if (count($result) > 0) {
        for ($i = 0; $i < count($result); $i++) {
            $channel_name = trim($result[$i]['channel_name']);
            $brand_id = trim($result[$i]['brand_id']);
            $brand = trim($result[$i]['brand']);
            if ($channel_name == 'twitter') {
                $twitter_details = $kpiobj->getResponse(API_HOST . "users/show.json?screen_name=$brand", $access_token[$index]);
                if (!$twitter_details['errors']) {
                    $twitter_id = $twitter_details['id'];
                    $picurl = $twitter_details['profile_image_url'];
                    $name = time() . '.png';
                    $dest.=$name;
                    if (copy($picurl, $dest) == 1) {
                        $kpiobj->update("UPDATE brand_detail SET profile_image='" . $name . "',brandID='" . $twitter_id . "'  WHERE brand_id='$brand_id' ");
                    } else {
                        $kpiobj->update("UPDATE brand_detail SET brandID='" . $twitter_id . "'  WHERE brand_id='$brand_id' ");
                    }
                }
            } else if ($channel_name == 'facebook') {
                $data = $kpiobj->content_check("" . API_GRAPH . "$brand?access_token=$access_token_fb[$index_fb]");
                if ($data) {
                    $fbid = $data['id'];
                    $picurl = $data['profile_image_url'];
                    $name = time() . '.png';
                    $dest.=$name;
                    if (copy($picurl, $dest) == 1) {
                        $kpiobj->update("UPDATE brand_detail SET profile_image='" . $name . "',brandID='" . $fbid . "'  WHERE brand_id='$brand_id' ");
                    } else {
                        $kpiobj->update("UPDATE brand_detail SET brandID='" . $fbid . "'  WHERE brand_id='$brand_id' ");
                    }
                }
            }
        }
    }
}

//SELECT * 
//FROM  `posts` AS p
//JOIN brand_detail AS b ON p.brand_id_fk = b.brand_id
//WHERE b.channel_name =  'twitter'
//AND b.company_id_fk =1
?>