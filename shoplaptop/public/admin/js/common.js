$(document).ready(function () {
    if ($("#myTable").length > 0) {
        $("#myTable").DataTable();
    }
    if ($("#ckeditor").length > 0) {
        var editor = CKEDITOR.replace("ckeditor");
    }
});

function changeFile(e) {
    readURL(e.files);
}

function changeListFile(e){
    readListURL(e.files);
}

function readURL(input) {
    var divBao = document.getElementById("row-img");
    $('.row-image').remove();
    if (input) {

        for (var i = 0; i < input.length; i++) {   
            var reader = new FileReader();
            reader.onload = function (e) {
                var img = document.createElement("img");
                img.src = e.target.result;
                $(img).attr("class", "img-thumbnail row-image");
                divBao.append(img);
            }
            reader.readAsDataURL(input[i]);
        };
    }
}

function readListURL(input) {
    var divBao = document.getElementById("list-img");
    $('.list-image').remove();
    if (input) {

        for (var i = 0; i < input.length; i++) {   
            var reader = new FileReader();
            reader.onload = function (e) {
                var img = document.createElement("img");
                img.src = e.target.result;
                $(img).attr("class", "img-thumbnail list-image");
                divBao.append(img);
            }
            reader.readAsDataURL(input[i]);
        };
    }
}
