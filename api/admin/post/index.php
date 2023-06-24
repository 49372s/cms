<?php
include("../../connect/func.php");
require_once(VS_DR."/core/modules/md/Markdown.inc.php");
require_once(VS_DR."/api/connect/uuid.php");
use Michelf\Markdown;
//利用する変数配列群
$key = array(
    "author",
    "category",
    "title",
    "body",
    "mode"
);
emptyCheck($key,"post");
if(!APIAuthenticate($_COOKIE['token'])){
    APIResponse(false,"Authenticate failed.");
}

//データを一度格納
$author = $_POST['author'];
$category = $_POST['category'];
$title = $_POST['title'];
$body = $_POST['body'];
$mode = $_POST['mode'];

//タイトルへのHTMLタグの使用を禁止する
$title = strip_tags($title);
//カテゴリーの検証
if(!getCategory(0,$category)){
    //問題あり
    APIResponse(false,"Category is invalid.");
}

//記事のIDを取得する
$uuid = UuidV4Factory::generate();

//DBにデータを保存する
$pdo = cdb();
$sql = "insert into article(id,title,author,category,lastupdate,militime) values(:i,:t,:a,:c,:l,:m)";
$pre = $pdo->prepare($sql);
$arr = array(
    ":i"=>$uuid,
    ":t"=>$title,
    ":a"=>$author,
    ":c"=>$category,
    ":l"=>date("Y/m/d H:i:s"),
    ":m"=>time()
);
$flug = $pre->execute($arr);
if($flug != 1){
    APIResponse(false,"Undefined error");
}

//HTMLモードとMarkdownモードで対応を分ける
if($mode == "html"){
    //そのままファイルに保存する。
    $fhd = fopen(VS_DR."/data/blog/$uuid.html","w");
    fwrite($fhd,$body);
    fclose($fhd);
}elseif($mode == "markdown"){
    $html = Markdown::defaultTransform($body);
    $fhd = fopen(VS_DR."/data/blog/$uuid.html","w");
    fwrite($fhd,$html);
    fclose($fhd);
}
APIResponse(true,"Success");
?>