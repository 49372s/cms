<?php
//記事の取得をするためのモジュールを入れる
//このファイルの１行目から11行目にかけては必ず必要です。必ず表示をしたいページの先頭においてください。
include('../api/connect/func.php');
if(empty($_GET['id'])){
    http_response_code(302);
    header('Location: /');
    exit();
}
$info = getArticle($_GET['id']);
?>
<!DOCTYPE html>
<html lang="ja-jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$info['title'];?> | <?=SITE_TITLE;?></title><!-- この行はタイトルを指定するための行です。必須項目です。-->
</head>
<body>
    <?=$info['html'];//この行でHTMLを表示しています。必須項目です。この行を任意の場所に組み込むと好きな場所にブログ記事を表示できます ?>
</body>
</html>
<?php
//ここから先は不要です。
/** このCMSで表示する仕組み 
 * includeという関数で読み込んだファイルに、全てが詰まっています。そのファイルにある[getArticle]関数でブログの記事を取得しています。
 * ブログの記事を指定するには、urlにリクエストを送信する必要があります。
 * 通常であれば、http://example.com/toukou/記事のファイル名.html といった指定をしますが、このシステムはファイルを自動的に作成することを目的としているため、URLが変わります。
 * 例えば、このファイルが http://example.com/toukou/index.php となっている場合、記事を読むためには以下のように記述する必要があります。
 *  http://example.com/toukou/index.php?id=投稿のID
 * ?id=投稿のID この部分が、手打ちで言うところの 記事のファイル名.htmlに当たります。ここまで理解できれば多分簡単です(？)
*/
?>