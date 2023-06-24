// Takanashi CMS Category Script File
// (C)2016-2023 Takanashi.
// -------------------------------
// Using librarys
// -jQuery
// -Bootstrap
// -------------------------------
// version 1.04
if(document.getElementById('add-category')!=undefined){
    const form = document.getElementById('add-category');
    form.onsubmit = (e)=>{
        e.preventDefault();
        $.post("/api/admin/category/add/",{"name":form.category.value},(data)=>{
            if(data.result==true){
                showModal("カテゴリー追加","カテゴリーを追加しました。");
                location.reload();
            }else{
                showModal("カテゴリー追加",data.data);
            }
        })
    }
}