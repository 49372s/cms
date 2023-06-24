<?php
include('../api/connect/func.php');
if(loginCheck()){
    http_response_code(302);
    header('Location: ./');
    exit();
}
?>
<!DOCTYPE html>
<html lang="ja-jp">
    <head>
        <title>ダッシュボード</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/dashboard">Takanashi CMS Dashboard</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <div class="w-75 ms-auto me-auto">
            <h1>ログイン</h1>
            <form id="login">
                <div class="mb-1">
                    <label for="user" class="form-label">ユーザーID</label>
                    <input type="text" class="form-control" id="user" name="user">
                </div>
                <div class="mb-1">
                    <label for="pwd" class="form-label">パスワード</label>
                    <input type="password" name="pwd" id="pwd" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">ログイン</button>
            </form>
            <hr>
            <h1>新規登録</h1>
            <p>注意: 新規登録は、1CMSにつきデフォルトで1ユーザーまでです。この設定は設定ファイルから変更できます。詳しくはシステム管理者、または開発者にお問い合わせください。</p>
            <form id="regist">
                <div class="mb-1">
                    <label for="ru" class="form-label">ユーザID</label>
                    <input type="text" name="user" id="ru" class="form-control">
                </div>
                <div class="mb-1">
                    <label for="rp" class="form-label">パスワード</label>
                    <input type="password" name="pwd" id="rp" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">新規登録</button>
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
        <script src="/core/resource/script/jq.min.js"></script>
        <script src="/core/resource/script/base.js?<?php echo(time());?>"></script>
        <script src="/core/resource/script/login.js?<?php echo(time());?>"></script>
    </body>
</html>