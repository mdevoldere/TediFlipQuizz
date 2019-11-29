window.addEventListener("DOMContentLoaded", function(event) {

    const elems = document.querySelectorAll("main > article");

    for(var i = 0; i < elems.length; i++) {
        elems[i].addEventListener("click", function() {
            alert("Pour " + this.innerText + "\r\n" + "Quelle est la réponse à la question ?");
        });
    }

});