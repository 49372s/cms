<?php
include('../../connect/func.php');
//一斉取得モード
$pdo = cdb();

$res = $pdo->query("SELECT * from article order by militime desc");
$html = "";
foreach($res as $val){
    if(!empty($_GET['mode'])){
        if($_GET['mode']=="1"){
            $html = $html . "<li><a href=\"".VIEW_URL."?id=".$val[0]."\">".$val[1]."</a></li>";
        }
    }else{
        if(!APIAuthenticate($_COOKIE['token'])){
            APIResponse(false,"Authenticate failed");
        }
        $html = $html . "<tr>
        <td>".$val[4]."</td>
        <td>".$val[1]."</td>
        <td>".$val[2]."</td>
        <td>".searchCat($val[3])."</td>
        <td>".$val[0]."</td>
        <td><button class=\"me-1 btn btn-info\" onclick=\"view('".$val[0]."');\">閲覧</button><button class=\"btn btn-danger\" onclick=\"requestDelete('".$val[0]."');\">削除</button>
        </tr>";
    }
}
APIResponse(true,$html);
?>