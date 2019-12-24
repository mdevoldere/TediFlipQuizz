class Db
{
    constructor() {
        this.ready = false;
        this.json = null;
        this.quizzes = [];
        this.categories = [];
        this.questions = [];
    }

    init() {

        console.log("Loading Game DB...");
        let dbself = this;

        var ajx = new XMLHttpRequest();
        ajx.open('GET', './data/dbdata.json', true);
        ajx.onload = function() {
            if (this.status === 200) {
                dbself.json = JSON.parse(this.responseText);

                for(var j=0; j<dbself.json.categories.length; j++) {
                    dbself.categories.push(new Category(dbself.json.categories[j]));
                }

                for(var k=0; k<dbself.json.questions.length; k++) {
                    dbself.questions.push(new Question(dbself.json.questions[k]));
                }

                dbself.ready = true;
                
                console.log(dbself);
                console.log("Game DB loaded !");
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
        this.quizzes = [];
        for(var i=0; i<this.json.quizzes.length; i++) {
            let q = new Quiz();
            q.hydrate(this.json.quizzes[i]);
            this.quizzes.push(q);
        }
        return this.quizzes;
    }

    getQuiz(_id) {
        return this.quizzes.find(item => item.quiz_id == _id);
    }

    getQuizCategories(_quiz_id) {
        return this.categories.filter(item => item.quiz_id === _quiz_id);
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