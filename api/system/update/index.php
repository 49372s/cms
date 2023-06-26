<?php
include('../../connect/func.php');
//アップデート実行
//もう一度バージョンを取得する
$ch = curl_init("https://api.github.com/repos/49372s/cms/releases");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$version = 0;
foreach($json as $val){
    if(intval($val["tag_name"])>$version){
        //バージョンがデカければ、versionをそれで上書きしてforeachを続行する。
        $version = intval($val["tag_name"]);
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
?>