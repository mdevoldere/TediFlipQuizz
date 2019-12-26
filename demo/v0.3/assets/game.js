class Game 
{
    constructor() {
        this.db = new Db();
        this.quiz = new Quiz();
        this.categories = [];
        this.questions= [];
        this.teams = [];
        this.teamId = 0;
        this.team = null;
        this.question = null;
        this.message = 'Loading...';
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

        console.log("" + this.teams.length + " teams.");
    }

    setQuiz(_id) {
        _id = parseInt(_id);
        console.log("Quiz: " + _id);
        this.quiz = this.db.getQuiz(_id);
        this.categories = this.db.getCategories(_id);
        this.questions = [];
        console.log("Quiz "+ this.quiz.quiz_theme +" Loaded");
        console.log(this);
    }

    start() {
        
        this.questions = [];
        
        for(var i=0; i<this.categories.length; i++) {
            var que = this.db.getQuestions(this.categories[i].category_id);

            for(var j=0; j<que.length; j++) {
                que.isAvailable = true;
                this.questions.push(que[j]);
            }
        }
        this.teamId = Math.floor(Math.random() * this.teams.length);
        this.next();
    }

    next() {
        this.teamId = (this.teamId >= this.teams.length-1) ? 0 : this.teamId+1;
        this.team = this.teams[this.teamId];
    }
}