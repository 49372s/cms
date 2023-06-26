<?php
include('../../connect/func.php');
$version = "";

//バージョンのチェックを行うためにGitHubのサーバーにアクセスする。
$ch = curl_init("https://api.github.com/repos/49372s/cms/releases");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

//受け取ったJSONを仮想配列へと変換する。
$json = json_decode($response,true);

//JSONを解析するまえに、現在のバージョンを取得する。
//存在しますか？
if(!file_exists(VS_DR."/api/system/version.txt")){
    //この時点で存在価値がないレガシーシステムなのでバージョンが低い通知をすることが決定。
    $version = "1.0.5";//とりあえず1.0.5にしておく
}else{
    $version = intval(file_get_contents(VS_DR."/api/system/version.txt"));//現在のバージョンを取得
}
if($version == "1.0.5"){
    APIResponse(true,"Your version is unknown. But, update program is exists. Please run update.");
}
//アップデートプログラムを走らせる。
foreach($json as $val){
    if(intval($val["tag_name"])>$version){
        //バージョンが低い！！
        APIResponse(true,str_replace("\n","<br>",$val["body"]));
    }elseif(intval($val["tag_name"])>$version){
        APIResponse(false,"どうやらあなたは開発バージョン、あるいはGithubに公開されていないバージョンを利用されているようです。");
    }
}
APIResponse(false,"アップデートはありません");
?>