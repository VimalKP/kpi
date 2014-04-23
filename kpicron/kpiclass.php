<?php

$access_token = array();
$index = 0;
$access_token_fb = array();
$index_fb = 0;
$cnt = 0;

class kpiclass {

    public function select($sql = "") {
        if (empty($sql)) {
            return false;
        }
        $results = mysql_query($sql);
        if ((!$results) or (empty($results))) {
            return false;
        }
        $count = 0;
        $data = array();
        while ($row = mysql_fetch_array($results)) {
            $data[$count] = $row;
            $count++;
        }
        mysql_free_result($results);
        return $data;
    }

    public function insert($sql = "") {
        if (empty($sql)) {
            return false;
        }

        mysql_query($sql);
        $id = mysql_insert_id();
        return $id;
    }

    public function update($sql = "") {
        if (empty($sql)) {
            return false;
        }
        mysql_query($sql);
    }

    public function getallaccesstokentt($table) {
        global $access_token;
        $kpiobj = new kpiclass();
        $result = $kpiobj->select("select access_token  from $table where access_token!=''");
//        echo '<pre>';
//        print_r($result);
//        echo '</pre>';

        for ($j = 0; $j < count($result); $j++) {
            $access_token[] = $result[$j]['access_token'];
        }
//       / echo '<pre>';
//        print_r($result);
//        print_r($access_token);
//        echo '</pre>';
//        exit();/
        return $access_token;
    }

    public function getallaccesstokenfb($table) {
        global $access_token_fb;
        $kpiobj = new kpiclass();
        $result = $kpiobj->select("select access_token  from $table where access_token!=''");
//        echo '<pre>';
//        print_r($result);
//        echo '</pre>';

        for ($j = 0; $j < count($result); $j++) {
            $access_token_fb[] = $result[$j]['access_token'];
        }
//       / echo '<pre>';
//        print_r($result);
//        print_r($access_token);
//        echo '</pre>';
//        exit();/
        return $access_token_fb;
    }

    public function getAccessToken($cons) {
        $fields = array(
            'grant_type' => 'client_credentials'
        );
        $post = '';
        foreach ($fields as $key => $value) {
            $post .= $key . '=' . $value . '&';
        }
        $post = rtrim($post, '&');
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.twitter.com/oauth2/token');
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/x-www-form-urlencoded;charset=UTF-8", "Authorization: Basic $cons"));
//curl_setopt($curl, CURLOPT_ENCODING, 'gzip');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        $result_access = curl_exec($curl);
        $response = json_decode($result_access, TRUE);
        curl_close($curl);
        $access_token = $response['access_token'];
        return $access_token;
    }

    public function getResponse($url, $token) {
//        global $index_user_timeline, $cnt_user_timeline, $indexsearch_show, $cnt_show, $indexsearch, $cntsearch, $index, $cnt, $access_token, $index_user_retweets, $cnt_user_retweets;
        $curlopt = curl_init();
        curl_setopt($curlopt, CURLOPT_URL, $url);
        curl_setopt($curlopt, CURLOPT_HTTPHEADER, array("Authorization: Bearer $token"));
        curl_setopt($curlopt, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curlopt, CURLOPT_SSL_VERIFYPEER, FALSE);
        $result_access_t = curl_exec($curlopt);
        $twitter_response = json_decode($result_access_t, TRUE);
        curl_close($curlopt);
        return $twitter_response;
    }

    public function update_access_token($table) {
        $kpiobj = new kpiclass();
        $result = $kpiobj->select("", "select *  from $table");
        for ($i = 0; $i < count($result); $i++) {
            $consumer_key = trim($result[$i]['consumer_key']);
            $oauth_id = $result[$i]['oauth_id'];
            $consumer_secret = trim($result[$i]['consumer_secret']);
            $cons = base64_encode($consumer_key . ':' . $consumer_secret);
            $access_token = $kpiobj->getAccessToken($cons);
            $kpiobj->update("update $table SET access_token='$access_token' WHERE oauth_id ='$oauth_id'");
        }
    }

    public function formateDate($date, $type) {
//        $text = preg_replace('/\s+/', ' ', $date);
//        $a = split(' ', "$text");
//        if ($type == '') {
//            $created_at = date("Y-m-d H:i:s", strtotime("$a[0].$a[1].$a[2].$a[3].$a[5]"));
//        } else {
//            $created_at = date("Y-m-d H:i:s", strtotime("$a[0].$a[1].$a[2].$a[3].$a[4]"));
        $created_at = date("Y-m-d H:i:s", strtotime("$date"));
//        }
        return $created_at;
    }
 public function gettime($search) {
        return date("Y-m-d H:i:s", strtotime($search));
    }

    public function content_check($api_call = "") {
        global $cnt, $access_token_fb, $index_fb;;
        if (empty($api_call)) {
            return false;
        } else {
//            echo 'cnt--->' . $cnt . '<br/>';
            if ($cnt == 500) {//5000
                $cnt = 0;
                if ($index_fb >= (count($access_token_fb) - 1)) {
                    $index_fb = 0;
                } else {
                    $index_fb++;
                }
            }
            $cnt++;
//            if ($cnt == 50) {
//                if ($connectedVpn != "") {
//                    $output = shell_exec('rasdial "' . $connectedVpn . '" /DISCONNECT');
//                }
//                if (trim($output) == "Command completed successfully.") {
//                    lbl:$output2 = shell_exec('rasdial "' . $index . '" client01008933 street');
//                    if ($index > $vpnLimit) {
//                        $index = -1;
//                    }
//                    if (strpos($output2, 'error') !== false) {
//                        $index++;
//                        goto lbl;
//                    } else {
//                         sleep(120);
//                        $connectedVpn = $index;
//            $facebook_scrapper_obj = new facebook_scrapper();
            $kpiobj = new kpiclass();
            $url = $kpiobj->getResponsefb("$api_call");
            $data = json_decode($url, TRUE);
            $err = $data['error'];
//            $data = @file_get_contents("$api_call");
//            if ($err) {
////                return $data;
////            } else {//613 :- limit exceed
//                $errcode = $err['code'];
//                if ($errcode == 613 || $errcode == 104) {
//                    $index++;
//                    $cnt = 0;
//                } else if ($errcode == 190) {
//                    $index++;
//                    $cnt = 0;
//                    $val = explode('access_token=', $api_call);
//                    mysql_query("UPDATE oauth_usertoken SET status=0 where access_token='$val[1]");
//                }
//
//                $errmessage = $err['message'];
//
//                $errtype = $err['type'];
//                $sql = "INSERT INTO error_log(channel,api_call,error_code,error_type,error_message,output,error_date)values('facebook','$api_call','$errcode','" . mysql_real_escape_string($errtype) . "','" . mysql_real_escape_string($errmessage) . "','" . mysql_real_escape_string($url) . "','" . date("Y-m-d H:i:s") . "')";
//                mysql_query($sql);
//                return false;
//            } else {
            return $data;
//            }
//            $data = file_get_contents($api_call);
//                        $cnt = 0;
//                        $index++;
//                    }
//                }
//            } else {
//                $data = @file_get_contents("$api_call");
//            }
//            $cnt++;
//            if (!$data) {
////                echo "their's something wrong happenig here please try again letter";
//                return false;
//            } else {
//                return $data;
//            }
        }
    }

    public function getResponsefb($url) {
        $curlopt = curl_init();
        curl_setopt($curlopt, CURLOPT_URL, $url);
//        curl_setopt($curlopt, CURLOPT_HTTPHEADER, array("Authorization: Bearer $access_token"));
        curl_setopt($curlopt, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curlopt, CURLOPT_SSL_VERIFYPEER, FALSE);
        $result_access_t = curl_exec($curlopt);
        curl_close($curlopt);
        return $result_access_t;
    }

}

?>
