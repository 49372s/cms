// Takanashi CMS Update Script.
// (C)2016-2023 Takanashi.
// -------------------------------
// Using librarys
// -jQuery
// -Bootstrap
// -------------------------------
// version 1.04

function checkUpdate(target){
    //checkUpdate(通知先ID)
    $.post("/api/system/check/",(data)=>{
        document.getElementById(target).innerHTML = data.data;
        if(data.result==true){
            document.getElementById(target).innerHTML = document.getElementById(target).innerHTML + "<div><button class=\"btn btn-outline-success\" onclick=\"doUpdate()\">アップデート</button></div>";
        }
    })
}

function doUpdate(){
    $.post("/api/system/update/",(data)=>{
        if(data.result==true){
            window.alert(data.data);
            location.reload();
        }else{
            window.alert(data.data);
        }
    });
}