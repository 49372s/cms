<?php
define("VS_DR",$_SERVER['DOCUMENT_ROOT']);
//Include define file
include(VS_DR."/core/resource/config/config.php");
function cdb(){
    include_once(VS_DR."/api/connect/keys.php");
    $info = getCDBInfo();
    return new PDO("mysql:host=".$info[0].";dbname=".$info[1].";charset=utf8",$info[2],$info[3]);
}

function APIResponse($flug=false,$data=null){
    header('Content-Type: application/json;charset=UTF-8;');
    echo json_encode(array("result"=>$flug,"data"=>$data));
    exit();
}

function getSHA($str){
    return hash("sha3-512",$str);
}

function loginCheck(){
    if(empty($_COOKIE['token'])){
        return false;
    }
    return APIAuthenticate($_COOKIE['token']);
}

function loginRedirect(){
    if(!loginCheck()){
        http_response_code(401);
        header('Location: ./login.php');
        exit();
    }
}

function AdminAuthenticate($user,$pass){
    $pdo = cdb();
    $res = $pdo->query("SELECT * from account");
    foreach($res as $val){
        if($val[0] == $user && $val[1]==getSHA($pass)){
            APIResponse(true,md5(date("Ym").$val[0].$val[1]));
        }
    }
    APIResponse(false,"Login authenticate is failed.");
}

function APIAuthenticate($token){
    $pdo = cdb();
    $res = $pdo->query("SELECT * from account");
    foreach($res as $val){
        if($token == md5(date("Ym").$val[0].$val[1])){
            return true;
        }
    }
    return false;
}

function emptyCheck($keys,$mode="get"){
    foreach($keys as $key){
        if($mode=="get"){
            if(empty($_GET[$key])){
                APIResponse(false,"Bad request(GET).");
            }
        }else{
            if(empty($_POST[$key])){
                APIResponse(false,"Bad request(POST).".$key);
            }
        }
    }
}

function getCategory($mode=0,$q=null){
    if($mode==0){
        $pdo = cdb();
        $res = $pdo->query("SELECT * from category");
        foreach($res as $val){
            if($val[0] == $q || $val[1] == $q){
                return true;
            }
        }
        return false;
    }elseif($mode==1){
        $pdo = cdb();
        $res = $pdo->query("SELECT * from category");
        $html = "";
        foreach($res as $val){
            $html = $html . '<option value="'.$val[0].'">'.$val[1].'</option>'."\n";
        }
        APIResponse(true,$html);
    }
}

function searchCat($id){
    $pdo = cdb();
    $res = $pdo->query("SELECT * from category");
    $category = array();
    foreach($res as $val){
        if($id == $val[0]){
            return $val[1];
        }
    }
    return false;
}

function getArticle($id){
    $pdo = cdb();
    $sql = "SELECT * from article";
    $res = $pdo->query($sql);
    foreach($res as $val){
        if($val[0]==$id){
            $html = file_get_contents(VS_DR."/data/blog/$id.html");
            return array("title"=>$val[1],"author"=>$val[2],"category"=>$val[3],"lastUpdate"=>$val[4],"html"=>$html);
        }
    }
}
?>