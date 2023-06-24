<?php
include("../../../connect/func.php");
if(!APIAuthenticate($_COOKIE['token'])){
    APIResponse(false,"Authenticate failed");
}
//ログイン情報からアカウントの情報を返す
$pdo = cdb();
$res = $pdo->query("SELECT * From account");
foreach($res as $val){
    if($_COOKIE['token'] == md5(date("Ym").$val[0].$val[1])){
        APIResponse(true,array('id'=>$val[0],'name'=>$val[2]));
    }
}
APIResponse(false);
?>