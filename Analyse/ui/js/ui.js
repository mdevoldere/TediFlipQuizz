
class Ui
{

  static getConfigContainer()
  {
      return document.querySelector('#config');
  }

  static getQuizContainer()
  {
      return document.querySelector('#quiz');
  }

  static getQuestionContainer()
  {
      return document.querySelector('#currentQuestion');
  }

  static displayQuestion()
  {
    var c =  getQuestionElement(this.dataset.qid);
    c.classList.add("active");
    this.removeEventListener("click", Ui.displayQuestion);
    this.classList.add("disabled");
  }
}


window.addEventListener("DOMContentLoaded", function(event) {

  const app = new Vue({
    el: "#app",
    data: {
        title: "Tedi FlipQuiz",
        message: 'Welcome',
        quiz: new Quiz(2),
        question: new Question(1, 0 , "Welcome")
    },
    methods: {
      startQuiz: function(event) {
        Ui.getConfigContainer().classList.remove('active');
        Ui.getQuizContainer().classList.add('active');
        this.quiz.startRound();
      },
      questionClick : function(event) {
        this.question = this.quiz.getQuestion(event.target.dataset.qid);
        if(this.question.isAvailable) {
          Ui.getQuestionContainer().classList.add('active');
        }
      },
      questionAnswer : function(status, event) {
        Ui.getQuestionContainer().classList.remove('active');
        status = parseInt(status);
        var score = (status == 1) ? this.question.level : 0;
        this.quiz.endRound(score);
        this.question.isAvailable = false;
      } 
    }
  });
/*
  const elems = document.querySelectorAll("#flipquiz article div");

  for(var i = 0; i < elems.length; i++) {

      elems[i].addEventListener("click", displayQuestion);
      
      var btn = document.querySelectorAll('#Q' + elems[i].dataset.qid + ' button');

      for(var j = 0; j < btn.length; j++){
          btn[j].addEventListener("click", function() {
            var c =  getQuestionElement(this.dataset.qid);
            c.remove("active");
            quiz.endRound(this.dataset.won);
          });
      }
        
  }

  document.querySelector("#config").addEventListener("click", function(){
    var b = document.querySelector("#flipquiz").style.display == 'none';

    if(b) {
      document.querySelector("#flipquiz").style.display= 'flex';
      document.querySelector("#flipconfig").style.display= 'none';
    }
    else {
      document.querySelector("#flipquiz").style.display= 'none';
      document.querySelector("#flipconfig").style.display= 'flex';
    }
});

document.querySelector("#end").addEventListener("click", function(){
  document.querySelector("#flipquiz").innerHTML = '<h2>Bye</h2>';
});

  startRound(quiz);*/

});