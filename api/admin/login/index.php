<?php
include("../../connect/func.php");
$keys = array(
    "id",
    "pw"
);
emptyCheck($keys,"post");
AdminAuthenticate($_POST['id'],$_POST['pw']);
?>