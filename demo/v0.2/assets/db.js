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

                for(var a=0; a<dbself.json.quizzes.length; a++) {
                    let quizz = new Quiz();
                    quizz.hydrate(dbself.json.quizzes[a]);
                    dbself.quizzes.push(quizz);
                }

                for(var b=0; b<dbself.json.questions.length; b++) {
                    dbself.questions.push(new Question(dbself.json.questions[b]));
                }

                for(var i=0; i<dbself.json.categories.length; i++) {

                    var cat = new Category(dbself.json.categories[i]);
                    var que = dbself.questions.filter(item => item.category_id === cat.category_id);

                    for(var j=0; j<que.length; j++) {
                        cat.questions.push(que[j]);
                    }
                    
                    dbself.categories.push(cat);
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
        _quiz_id = parseInt(_quiz_id);
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