// Takanashi CMS Article List Script File
// (C)2016-2023 Takanashi.
// -------------------------------
// Using librarys
// -jQuery
// -Bootstrap
// -------------------------------
// version 1.04
//
// +このファイルでできること
// -記事の一覧表示
// 
// IDは動的にいじれるようになっています。このライブラリを読んだあとに、<script>listing("id")</script>とすることで<div id="id"></div>の中に記事のリストが表示されます。
// リストは<ul><li>の形式で作成されます。カスタマイズする場合は各自CSSでいじってください。

function listing(id){
    $.post("/api/admin/get/?mode=1",(data)=>{
        if(data.result==true){
            document.getElementById(id).innerHTML = "<ul>"+data.data+"</ul>";
        }
    })
}