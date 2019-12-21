window.addEventListener("DOMContentLoaded", function(event) {

  var vueTop = new Vue(appTop);
  var vueMain = new Vue(appMain);
  vueTop.teams[Math.floor(Math.random() * 2)].isActive = true;

  var qCollection = [];

  const elems = document.querySelectorAll("#app article div");

  for(var i = 0; i < elems.length; i++) {

      qCollection[elems[i].dataset.qid] = document.querySelector('#Q' + elems[i].dataset.qid);

      qCollection[elems[i].dataset.qid].addEventListener("click", function() {

          this.classList.remove("active");

      });
    
      elems[i].addEventListener("click", function() {

          //alert("Pour " + this.dataset.level + "\r\n" + "Quelle est la réponse à la question ?");

          var el2 = qCollection[this.dataset.qid];
          el2.classList.add("active");
      });
  }

  document.querySelector("#end").addEventListener("click", function(){

      document.querySelector("#app").innerHTML = 'GoodBye';

  });

  /*document.querySelector('#aa').addEventListener('click', function() {
    vueHeader.question.id++;
    console.log(vueHeader.question.id);
  });*/
    

});