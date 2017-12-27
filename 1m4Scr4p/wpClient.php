<?php

class WPClient {

    var $xmlRpcUrl = "";
    var $username  = "";
    var $password = "";

    public function __construct($xmlrpcurl, $username, $password) {
        $this->xmlRpcUrl = $xmlrpcurl;
        $this->username  = $username;
        $this->password = $password;
    }

    function sendRequest($requestname, $params) {
        $request = xmlrpc_encode_request($requestname, $params);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
        curl_setopt($ch, CURLOPT_URL, $this->xmlRpcUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1);
        $results = curl_exec($ch);
        curl_close($ch);
        return $results;
    }

    function createPost($title, $body, $category, $keywords , $encoding='UTF-8') {

        $title = htmlentities($title, ENT_NOQUOTES, $encoding);
        //$keywords = htmlentities($keywords, ENT_NOQUOTES, $encoding);
        //$body = htmlentities($body, ENT_NOQUOTES, $encoding);

        $postData = array(
            'title' => $title,
            'description' => $body,
            'mt_allow_comments' => 1,  // If 1 => allow comments
            'mt_allow_pings' => 0,  // If 1 => allow trackbacks
            'post_type' => 'post',
            'categories' => array($category),
            'mt_keywords' => $keywords
        );
        $params = array(0, $this->username, $this->password, $postData, true);

        return $this->sendRequest('metaWeblog.newPost', $params);
    }
}

?>