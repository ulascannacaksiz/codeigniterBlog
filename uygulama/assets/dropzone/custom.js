/*Dropzone.autoDiscover=false;
$(function () {

    var myDropzone = new Dropzone("#dropForm");
    myDropzone.on("complete",function (file) {
        //console.log(file);
// Başlangıç
        function showUser(str) {//Str This.Value olacak
            if (str == "") {
                document.getElementById("yuklenenler").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("yuklenenler").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","admin/resim_getir/"+str,true);
                xmlhttp.send();
            }
        }


        //Bitiş
    });

});*/