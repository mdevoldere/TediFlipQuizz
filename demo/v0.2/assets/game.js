class Game
{
    constructor() {
        this.db = new Db();
        this.teams = [];
        this.quiz = new Quiz();
        this.categories = [];
        this.questions = [];
        this.activeTeam = 0;
        this.activeQuestion = 0;
        var database = this.db;
        setTimeout(function() { database.init() }, 2000);
        //this.db.init();
    }

    setTeams(_nb)
    {
        _nb = parseInt(_nb);

        if(_nb === 0) {
            this.teams.pop();
        }
        else {
            if(this.teams.length > 3) {
                return;
            }
            
            let _id = this.teams.length+1;
            this.teams.push(new Team(_id, ('Team #' + _id)));
            this.teams[0].score = 3500;
        }


        console.log("Game Mode: " + this.teams.length + " teams.");
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