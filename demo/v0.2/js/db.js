class Db
{
    constructor(_callback) {

        this.quizzes = [];
        this.categories = [];
        this.questions = [];

        var ajx = new XMLHttpRequest();
        ajx.open('GET', './data/flipquiz.json', true);
        ajx.onload = function() {
            if (this.status === 200) {
                this.json = JSON.parse(this.responseText);
                console.log(json);

                for(var i=0; i<json.quizzes.length; i++) {
                    this.quizzes.push(new Quiz(json.quizzes[i]));
                }

                for(var j=0; j<json.categories.length; j++) {
                    this.categories.push(new Category(json.categories[j]));
                }

                for(var k=0; k<json.questions.length; k++) {
                    this.questions.push(new Question(json.questions[k]));
                }

                _callback(this);
             }
        };
  
        ajx.send();
    }

    getQuizzes() {
        return this.json.quizzes;
    }

    getQuiz(_id) {
        return this.json.quizzes.find(item => item.quizz_id === _id);
    }

    getQuizCategories(_quiz_id) {
        return this.json.categories.filter(item => item.quizz_id === _quiz_id);
    }

    getCategories() {
        return this.json.categories;
    }

    getCategory(_id) {
        return this.json.categories.find(item => item.category_id === _id);
    }

    getCategoryQuestions(_cat_id) {
        return this.json.questions.filter(item => item.category_id === _cat_id);
    }

    getQuestions() {
        return this.json.questions;
    }

    getQuestion(_id) {
        return this.json.questions.find(item => item.question_id === _id);
    }
}