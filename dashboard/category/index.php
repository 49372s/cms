<?php
include('../../api/connect/func.php');
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
        <link rel="stylesheet" href="/core/resource/css/spinner.css?version=1.03">
        <title>カテゴリー一覧</title>
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
        <div class="w-75 ms-auto me-auto">
            <h1>投稿一覧</h1>
            <form method="post" id="search-category-edit">
                <div class="mb-3">
                    <label for="article-category-title" class="form-label">記事タイトル</label>
                    <input type="text" name="act" id="article-category-title" class="form-control">
                </div>
                <button type="submit" class="btn btn-outline-primary w-100">検索</button>
            </form>
            <hr>
            <form id="control-category" method="post" style="overflow-x: scroll;">
                <table class="table" style="white-space: nowrap;">
                    <thead>
                        <tr>
                            <th scope="col">カテゴリ名</th>
                            <th scope="col">ID</th>
                            <th scope="col">操作</th>
                        </tr>
                    </thead>
                    <tbody id="category-list">
                        <tr>
                            <td colspan="5" class="text-center">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="modal" tabindex="-1" aria-hidden="true" id="modal00">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                    </div>
                    <div class="modal-body" id="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="loading">
            <div class="spinner-border text-primary" role="status" id="spinner">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <script src="/core/resource/script/jq.min.js"></script>
        <script src="/core/resource/script/base.js?<?php echo(time());?>"></script>
        <script src="/core/resource/script/edit.js?<?php echo(time());?>"></script>
    </body>
</html>