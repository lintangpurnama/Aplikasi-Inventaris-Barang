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

function deleteQuestion(url,text){
    Swal.fire({
        text:text,
        icon:'warning',
        showCancelButton:true,
        confirmButtonColor:'#3085d6',
        confirmButtonColor:'#d33',
        confirmButtonText:'oke'
    }).then((result)=>{
        if (result.isConfirmed) {
            document.location.href = url;
        }
    })
}

$(document).on('click','.delete-department', function(){
    var id = $(this).data("id");
    var url = `${base_url}departement/delete/${id}`;
    deleteQuestion(url,"apakah anda yakin ?");
});

});