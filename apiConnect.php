<?php

function apiCallGet($url){
    if(isset($_SESSION['token'])){
        try{
            $ch = curl_init($url);
            // use key 'http' even if you send the request to https://...
            curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: ".$_SESSION['token']->token));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = json_decode(curl_exec($ch));
            curl_close($ch);
        }catch(Exception $err){
            echo '<script>alert('.$err.')</script>';
        }
        return $result;
    }else{
        echo '<script>alert("failed to authenticate")</script>';
    }
}

function apiCallPost($url , $data){
        
    if(isset($_SESSION['token'])){
        try{
            $ch = curl_init($url);
            // use key 'http' even if you send the request to https://...
            $payload = json_encode(array("user" => $data));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
            $headers = array(
                'Authorization: '.$_SESSION['token']->token,
                'Content-type: application/json'
            );
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = json_decode(curl_exec($ch));
            curl_close($ch);
        }catch(Exception $e){
            $result = $e;
        }
        return $result;        
    }else{
        echo '<script>alert("failed to authenticate")</script>';
    }
}

    
?>