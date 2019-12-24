class Game
{
    constructor() {
        this.db = new Db();
        this.teams = [];
        this.quiz = new Quiz();
        this.categories = [];
        //this.activeTeam = 0;
        //this.activeQuestion = 0;
        var database = this.db;
        setTimeout(function() { database.init() }, 1000);
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
        }


        console.log("Game Mode: " + this.teams.length + " teams.");
    }

    setQuiz(_id) {
        console.log("Quiz: " + _id);
        this.quiz = this.db.getQuiz(_id);
        this.categories = this.db.getQuizCategories(_id);
        console.log("Quiz "+ this.quiz.quiz_theme +" Loaded");
        console.log(this);
    }

}