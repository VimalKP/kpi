<?php

include_once 'db_connection.php';
include_once 'kpiclass.php';
$kpiobj = new kpiclass();
$table = 'oauth';
$tablemain = 'oauth_usertoken';

$kpiobj->getallaccesstoken($table);
global $access_token, $index;
$result = $kpiobj->select("SELECT * FROM brand_detail"); //1409270795987491	kpisolution
echo '<pre>';
print_r($result);
//print_r($access_token);
echo '<pre>';
//exit();
if (count($result) > 0) {
    for ($i = 0; $i < count($result); $i++) {
        $channel_name = trim($result[$i]['channel_name']);
        $brand_id = trim($result[$i]['brand_id']);
        $brand = trim($result[$i]['brand']);
        $company_id_fk = trim($result[$i]['company_id_fk']);
        if ($channel_name == 'twitter') {
            if ($brand != '') {
                $twitter_details = $kpiobj->getResponse(API_HOST . "statuses/user_timeline.json?screen_name=$brand&count=200&include_rts=1&include_entities=1", $access_token[$index]);
                if (count($twitter_details) > 0) {
                    for ($j = $k; $j < count($twitter_details); $j++) {
                        $tweet_id = $twitter_details[$j]['id_str'];
                        $body = $twitter_details[$j]['text'];
                        $created_at = $kpiobj->formateDate(trim($twitter_details[$j]['created_at']), '');
                        if ($tweet_id != '') {
                            $kpiobj->insert("INSERT INTO posts (brand_id_fk,postid,content,posted) VALUES
                      ('$brand_id','$tweet_id','" . htmlspecialchars_decode(addslashes($body)) . "','$created_at')");
                        }
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