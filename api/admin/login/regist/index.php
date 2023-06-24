<?php
include("../../../connect/func.php");
$keys = array(
    "id",
    "pw"
);
emptyCheck($keys,"post");
$pdo = cdb();
$sql = "SELECT * from account";
$res = $pdo->query($sql);

$count = 0;
if(MYSQL_COMPATIBLE == 0){
    if($res->rowCount() == MAX_ADMINISTRATOR && MAX_ADMINISTRATOR!=0){
        APIResponse(false,"You have reached the maximum number of administrators. The system has rejected your request to create an administrator.<br>For more information, contact your system administrator or developer.");
    }
}
foreach($res as $val){
    if($val[0]==$_POST['id']){
        APIResponse(false,$_POST['id']." is already exists.");
    }
    if(MAX_ADMINISTRATOR!=0){
        $count++;
        if($count==MAX_ADMINISTRATOR){
            APIResponse(false,"You have reached the maximum number of administrators. The system has rejected your request to create an administrator.<br>For more information, contact your system administrator or developer.");
        }
    }
}

if(NAME_ADMINISTRATOR_DEFINED==1){
    $handle = NAME_ADMINISTRATOR;
}else{
    emptyCheck(array("handle"),"post");
    $handle = $_POST['handle'];
}

$sql = "INSERT into account(id,pwd,hdn) values(:i,:p,:h)";
$pre = $pdo->prepare($sql);
$flug = $pre->execute(array(":i"=>$_POST['id'],":p"=>getSHA($_POST['pw']),":h"=>$handle));
if($flug != 1){
    APIResponse(false,"Undefined error.");
}else{
    APIResponse(true);
}
?>