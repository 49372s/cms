// Takanashi CMS Login and 
//        Registration Script File
// (C)2016-2023 Takanashi.
// -------------------------------
// Using librarys
// -jQuery
// -Bootstrap
// -------------------------------
// version 1.04

document.getElementById('login').onsubmit = (e)=>{
    e.preventDefault();
    const form = document.getElementById('login');
    $.post("/api/admin/login/",{"id":form.user.value,"pw":form.pwd.value},(data)=>{
        if(data.result==true){
            document.cookie = "token="+data.data+";path=/;max-age=39000000";
            location.href = "/dashboard/";
        }else{
            showModal("ログイン失敗","ユーザー名あるいはパスワードが違います。");
        }
    })
}

document.getElementById('regist').onsubmit = (e)=>{
    e.preventDefault();
    const form = document.getElementById('regist');
    $.post("/api/admin/login/regist/",{"id":form.user.value,"pw":form.pwd.value},(data)=>{
        if(data.result == true){
            $.post("/api/admin/login/",{"id":form.user.value,"pw":form.pwd.value},(data)=>{
                if(data.result==true){
                    document.cookie = "token="+data.data+";path=/;max-age=39000000";
                    location.href = "/dashboard/";
                }else{
                    showModal("ログイン失敗","ユーザー名あるいはパスワードが違います。");
                }
            });
        }else{
            showModal("アカウント新規登録失敗",data.data);
        }
    })
}