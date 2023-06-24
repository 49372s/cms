// Takanashi CMS Base Script File
// (C)2016-2023 Takanashi.
// -------------------------------
// Using librarys
// -jQuery
// -Bootstrap
// -------------------------------
// version 1.04
function showModal(title,body){
    let modal = new bootstrap.Modal(document.getElementById('modal00'));
    document.getElementById('modal-title').innerHTML = title;
    document.getElementById('modal-body').innerHTML = body
    modal.show()
}

function logout(){
    document.cookie = "token=0;path=/;max-age=1";
    location.reload();
}