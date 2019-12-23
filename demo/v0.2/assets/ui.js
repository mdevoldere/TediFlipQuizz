class Ui
{
  static getConfigContainer() {
      return document.querySelector('#config');
  }

  static getQuizContainer() {
      return document.querySelector('#quiz');
  }

  static getQuestionContainer() {
      return document.querySelector('#currentQuestion');
  }

  static displayQuestion() {
    var c =  getQuestionElement(this.dataset.qid);
    c.classList.add("active");
    this.removeEventListener("click", Ui.displayQuestion);
    this.classList.add("disabled");
  }
}


window.addEventListener("DOMContentLoaded", function(event) {

  const app = new Vue(appData);

});