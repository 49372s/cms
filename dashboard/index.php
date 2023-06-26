<?php
include('../api/connect/func.php');
loginRedirect();
?>
<!DOCTYPE html>
<html lang="ja-jp">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <title>ダッシュボード</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/dashboard">Takanashi CMS Dashboard</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="menu">
                                記事メニュー
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" id="menu-dropdown">
                                <li><a href="/dashboard/article/new" class="dropdown-item">新規投稿</a></li>
                                <li><a href="/dashboard/article/" class="dropdown-item">記事一覧</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a href="/dashboard/category/new" class="dropdown-item">カテゴリーの追加</a></li>
                                <li><a href="/dashboard/category/" class="dropdown-item">カテゴリー一覧</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="account">
                                アカウント
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" id="account-dropdown">
                                <li><a class="dropdown-item" href="./config">設定</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" onclick="logout()">ログアウト</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="mt-2 me-2 ms-2 mb-2">
            <h2>アップデート</h2>
            <div id="update_information">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
        <script src="/core/resource/script/jq.min.js"></script>
        <script src="/core/resource/script/base.js?<?php echo(time());?>"></script>
        <script src="/core/resource/script/update.js?ver=1.02"></script>
        <script>
            checkUpdate("update_information");
        </script>
    </body>
</html>