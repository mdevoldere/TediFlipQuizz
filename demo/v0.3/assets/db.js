class Db
{
    constructor() {
        this.quizzes = [];
        this.categories = [];
        this.questions = [];
    }

    loadQuizzes() {
        if(this.quizzes.length < 1) {
            var dbself = this;
            Ajx.getJsonData('quizzes', function(result) {
                for(var a=0; a<result.length; a++) {
                    let quizz = new Quiz(result[a]);
                    dbself.quizzes.push(quizz);
                }
            });
        }
    }

    loadCategories() {
        if(this.categories.length < 1) {
            var dbself = this;
            Ajx.getJsonData('categories', function(result) {
                for(var a=0; a<result.length; a++) {
                    let cat = new Category(result[a]);
                    dbself.categories.push(cat);
                }
            });
        }
    }

    loadQuestions() {
        if(this.questions.length < 1) {
            var dbself = this;
            Ajx.getJsonData('questions', function(result) {
                for(var a=0; a<result.length; a++) {
                    let que = new Question(result[a]);
                    dbself.questions.push(que);
                }
            });
        }
    }

    getQuiz(_id) {
        this.loadQuizzes();
        _id = parseInt(_id);
        return this.quizzes.find(item => item.quiz_id === _id);
    }

    getCategories(_quiz_id) {
        this.loadCategories();
        _quiz_id = parseInt(_quiz_id);
        return this.categories.filter(item => item.quiz_id === _quiz_id);
    }

    getQuestions(_cat_id) {
        this.loadQuestions();
        _cat_id = parseInt(_cat_id);
        return this.questions.filter(item => item.category_id === _cat_id);
    }

    getQuestion(_id) {
        this.loadQuestions();
        _id = parseInt(_id);
        return this.questions.find(item => item.question_id === _id);
    }
}