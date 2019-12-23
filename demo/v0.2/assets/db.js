class Db
{
    constructor() {
        this.ready = false;
        this.quizzes = [];
        this.categories = [];
        this.questions = [];
    }

    init(_callback) {
        let dbself = this;

        var ajx = new XMLHttpRequest();
        ajx.open('GET', './data/dbdata.json', true);
        ajx.onload = function() {
            if (this.status === 200) {
                var json = JSON.parse(this.responseText);

                for(var i=0; i<json.quizzes.length; i++) {
                    dbself.quizzes.push(new Quiz(json.quizzes[i]));
                }

                for(var j=0; j<json.categories.length; j++) {
                    dbself.categories.push(new Category(json.categories[j]));
                }

                for(var k=0; k<json.questions.length; k++) {
                    dbself.questions.push(new Question(json.questions[k]));
                }

                dbself.ready = true;

                _callback(dbself);
             }
             else {
                 console.log("Db load error. " + this.status + ": " + this.statusText);
             }
        };
  
        ajx.send();
    }

    initDb() {
        console.log(this);
    }

    getQuizzes() {
        return this.quizzes;
    }

    getQuiz(_id) {
        return this.quizzes.find(item => item.quizz_id === _id);
    }

    getQuizCategories(_quiz_id) {
        return this.categories.filter(item => item.quizz_id === _quiz_id);
    }

    getCategories() {
        return this.categories;
    }

    getCategory(_id) {
        return this.categories.find(item => item.category_id === _id);
    }

    getCategoryQuestions(_cat_id) {
        return this.questions.filter(item => item.category_id === _cat_id);
    }

    getQuestions() {
        return this.questions;
    }

    getQuestion(_id) {
        return this.questions.find(item => item.question_id === _id);
    }
}