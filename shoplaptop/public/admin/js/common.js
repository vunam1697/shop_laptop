$(document).ready( function () {
    
    if($('#myTable').length >0){
        $('#myTable').DataTable();
    }
    if($('#ckeditor').length > 0){
        var editor = CKEDITOR.replace('ckeditor');
    }
} );


