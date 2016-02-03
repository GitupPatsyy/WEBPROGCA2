window.onload = function () {
    var deleteData = document.getElementsByClassName("deletebtn");

    for (var i = 0; i < deleteData.length; i++) {
        deleteData[i].addEventListener("click", function (event) {
            
            if (!confirm("Do you really want to Delete this error?")) {
                event.preventDefault();
            }
        });
    }
};