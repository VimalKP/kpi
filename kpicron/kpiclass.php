<?php

$access_token = array();
$index = 0;

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

    public function getallaccesstoken($table) {
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
        if ($twitter_response['errors']) {
            
        }
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

}

?>
