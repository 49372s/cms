<?php
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
    "core/resource/config/update.php",
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