<?php
include('../../connect/func.php');
//アップデート実行
//もう一度バージョンを取得する
$ch = curl_init("https://api.github.com/repos/49372s/cms/releases");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT,"TKNGH/2.01 (Apache2 / Linux)");
$response = curl_exec($ch);
curl_close($ch);
$version = 0;
$json = json_decode($response,true);
foreach($json as $val){
    if(floatval($val["tag_name"])>$version){
        //バージョンがデカければ、versionをそれで上書きしてforeachを続行する。
        $version = floatval($val["tag_name"]);
    }
}
//最新バージョンを取得できた！
$version = strval($version);
$fhd = fopen("./tmp/update.zip","w");
//ファイルをダウンロード
fwrite($fhd,file_get_contents("https://github.com/49372s/cms/archive/refs/tags/".$version.".zip"));
fclose($fhd);

//展開
$zip = new ZipArchive;
$res = $zip->open('./tmp/update.zip');
if ($res === TRUE) {
    $zip->extractTo('./tmp/'.$version.'/');
    $zip->close();
} else {
    APIResponse(false,"Failed select zip file");
}
//アップデートするファイルをconfigから読み出す
include(VS_DR."/core/resource/config/update.php");
$target = UPDATE_FILE_LIST;

//パスを設定する
//from
$from = VS_DR."/api/system/update/tmp/$version/cms-$version/";
//to
$to = VS_DR."/";
//コピーを開始
foreach($target as $file){
    if(!copy($from.$file,$to.$file)){
        APIResponse(false,"An error was detected while copying the file. File copy was forcibly terminated.<br>For more information, please contact a technician.");
    }
}
//コピーを完了。次はConfig.phpに載っていない新規ファイルのコピー。
if(file_exists($from."new_file.php")){
    include($from."new_file.php");
    //必ず変数は($newfilesforupdate)にしてください。
    if(!copy($from.$file,$to.$file)){
        APIResponse(false,"An error was detected while copying the file. File copy was forcibly terminated.<br>For more information, please contact a technician.");
    }
}
$fhd = fopen(VS_DR."/api/system/version.txt","w");
fwrite($fhd,$version);
fclose($fhd);
APIResponse(true,"アップデートを適用しました");
?>