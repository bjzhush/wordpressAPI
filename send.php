<?php
include('class-IXR.php');

function send_wp_post($xmlurl, $title, $tags, $description, $user, $password, $allowComment = 'closed') {
        $client = new IXR_Client($xmlurl);
        $postData = array(
                'title' => $title,
                'description' => $description,
                'mt_keywords' => $tags,
                'mt_allow_comments' => $allowComment,
                );
        if (!$client->query('metaWeblog.newPost','', $user, $password, $postData, true))
        {
            die( 'Error while creating a new post' . $client->getErrorCode() ." : ". $client->getErrorMessage()); 
        } else {
            return $client->getResponse();
        }
        
}

$res = send_wp_post('http://localhost/wordpress/xmlrpc.php', 'zs title', array('taga', 'tagb'), 'desc', 'root', 'root');
print_r($res);
