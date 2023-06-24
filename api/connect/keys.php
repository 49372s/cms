<?php
function getCDBInfo(){
    $host = "MYSQLのホスト名(通常はlocalhost:3306を利用しますが、ホスティング先によって指定がある場合は指定通りに入力してください)";
    $dbn = "データベース名";
    $name = "接続ユーザー名";
    $pass = "接続者パスワード";
    return array(
        0=>$host,
        1=>$dbn,
        2=>$name,
        3=>$pass
    );
}
?>