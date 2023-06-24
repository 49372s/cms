<?php
include("../../../../connect/func.php");
if(!APIAuthenticate($_COOKIE['token'])){
    APIResponse(false,"Authenticate failed");
}
$pdo = cdb();
$sql = "select * from category";
$html = "";
foreach($pdo->query($sql) as $val){
    $html = $html . '<option value="'.$val[0].'">'.$val[1].'</option>'."\n";
}
if(empty($html)){
    APIResponse(false);
}
APIResponse(true,$html);
?>