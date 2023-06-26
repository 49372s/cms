<?php
// CMS設定ファイル
// define("キー名","値");で構成されています。設定を変更する際は値を変更してください。
// !!絶対にキー名をいじらない!!
// =======================================================================
// +表記の見かた
// [+]は、見出しの役割をしています。検索するときに+の部分を検索すると目的の定数を見つけやすいです。
// ``で囲まれた値は「数値」です。ダブルクオーテーションで囲まずに数値を指定する必要があることを示しています。
// ""で囲まれた値は「文字」です。ダブルクオーテーションあるいはシングルクォーテーションで囲み、文字列として指定する必要があることを示しています。


// +管理者ユーザー上限
// 管理者のユーザー上限の値です。`0`で無限に作成できます。デフォルトで`1`です。
define("MAX_ADMINISTRATOR",1);

// +管理者名設定
// 管理者の名前(ID[ハンドル]とは別に一般表示用の名前)を固定するかどうか。デフォルトは`0`です。
define("NAME_ADMINISTRATOR_DEFINED",0);

// +管理者名
// 管理者名設定で[1]を選択した際の管理者名です。全てのアカウントにこの名前が適用されます。デフォルトは"user"です。
define("NAME_ADMINISTRATOR","user");

// +サイト名
// サイト全体の名前を設定します。これはビューページにのみ適用されますが、ビューページのサンプルを参考に、titleタグに組み込むと、使い回すことができます。デフォルトは"サイト名"です。
define("SITE_TITLE","サイト名");

// +記事を表示するファイルのURL
// 記事を表示する先を設定します。これを設定しないと、記事の一覧表示を行うことができません。
// URLは、絶対パス、あるいはルートパスを利用してください。
// 絶対パスはhttp://から始まる形式、ルートパスは/をトップとする形式です。パスについて理解できない場合は必ず絶対パスを利用することです。
// なお、絶対パスを利用する際は、ファイル名までつけるか、ディレクトリの最後に/をつけることを忘れないでください。デフォルトは"http://example.com/toukou/"です。
define("VIEW_URL","http://example.com");

// +MySQL互換性モード設定
// 互換性で問題が発生する可能性がある環境で利用するモード。使用しないことを推奨するが、MySQLの最新版が使えない場合（レンタルサーバーなど）は`1`にしてください。
define("MYSQL_COMPATIBLE",0);

// +UPDATEファイル設定
// ここに定義されたファイルのみアップデートで適用します。デフォルトはSQL接続情報とサイトのコンフィグファイル（これ）以外の全てです。なお、サンプルファイルは動作とは別なので更新は行われません。
// もし、改造を行っており、更新したくないファイルが有る場合はリストから削除してください。
define("UPDATE_FILE_LIST",array(
    "dashboard/index.php",
    "dashboard/login.php",
    "dashboard/article/index.php",
    "dashboard/article/new/index.php",
    "dashboard/category/index.php",
    "dashboard/category/new/index.php",
    "core/resource/script/base.js",
    "core/resource/script/category.js",
    "core/resource/script/edit.js",
    "core/resource/script/login.js",
    "core/resource/script/list.js",
    "core/resource/script/update.js",
    "api/admin/category/add/index.php",
    "api/admin/category/get/dashboard/index.php",
    "api/admin/category/get/detail/index.php",
    "api/admin/category/get/index.php",
    "api/admin/edit/delete/index.php",
    "api/admin/edit/delete/category/index.php",
    "api/admin/get/index.php",
    "api/admin/get/detail/index.php",
    "api/admin/login/index.php",
    "api/admin/login/regist/index.php",
    "api/admin/login/get/index.php",
    "api/admin/post/index.php",
    "api/connect/func.php",
    "api/system/check/index.php",
    "api/system/update/index.php",
));
?>