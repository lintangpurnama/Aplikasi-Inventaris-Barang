$(document).ready(function(){
const flashdata = $(".flashdata").data("flashdata");
const type =  $(".flashdata").data("type");

if (flashdata) {
    sweetAlert(flashdata,type);
}
function sweetAlert(text,icon){
    Swal.fire({
        timer:4000,
        text:text,
        icon:icon,
        timerProgressBar:true,
        showConfirmButton:false
    })
}
});