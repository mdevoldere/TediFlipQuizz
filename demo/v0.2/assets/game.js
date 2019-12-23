class Game
{
    constructor() {
        this.db = new Db();
        this.teams = [];
        this.quiz = new Quiz();
        this.categories = [];
        this.questions = [];
    }

    init() {
        this.db.init(this.loaded);
    }

    loaded(_db) {
        console.log("Game DB loaded !");
        console.log(_db);
        console.log("Game loaded !");
    }

    setQuiz(_id) {
        this.quiz = this.db.getQuiz(_id);
        this.categories = this.db.getQuizCategories(_id);
        this.questions = [];
        for(var i=0; i<this.categories.length; i++) {
            var r = this.db.getCategoryQuestions(this.categories[i].category_id);

            for(var j=0; j<r.length; j++) {
                this.questions.push(r[i]);
            }
        }
    }
}