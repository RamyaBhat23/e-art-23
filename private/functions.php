<?php
//id in url is called URL parameter.
//&, !, (, ) etc in parameter values has to be encoded using urlencode($string) & rawurlencode($string)

//reserved characters are encoded. space is encoded as +
//used after ? in URL
function u($string=""){
    return urlencode($string);
}

//reserved characters are encoded. space is encoded as %20
//used before ? in URL
function raw_u($string=""){
    return rawurlencode($string);
}

//to encode spcl char in html
function h($string=""){
    return htmlspecialchars($string);
}

function error_404(){
    header($_SERVER["SERVER_PROTOCOL"] . "404 not found");
    exit();
}

function error_500(){
    header($_SERVER["SERVER_PROTOCOL"] . "500 internal server error");
    exit();
}

function redirect($location){
    echo("<script>location.href ='$location';</script>");
    // header("Location:". $location);
    exit;
}

function isPostRequest(){
    return $_SERVER['REQUEST_METHOD']=='POST';
}

function isgetRequest(){
    return $_SERVER['REQUEST_METHOD']=='GET';
}

?>