<?php
include('../../../../connect/func.php');
if(!APIAuthenticate($_COOKIE['token'])){
    APIResponse(false,"Authenticate failed");
}
//一斉取得モード
$pdo = cdb();

$res = $pdo->query("SELECT * from category");
$html = "";
foreach($res as $val){
    if(mb_strpos($val[1],$_POST['title'])===false){
        continue;
    }
    $html = $html . "<tr>
    <td>".$val[1]."</td>
    <td>".$val[0]."</td>
    <td><button class=\"btn btn-danger\" onclick=\"requestDeleteCat('".$val[0]."');\">削除</button>
    </tr>";
}
APIResponse(true,$html);
?>