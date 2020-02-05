class Quiz
{
    constructor() {
        this.quiz_id = 0;
        this.quiz_theme = "Tedi FlipQuiz";
        this.quiz_textcolor = "#000000";
        this.quiz_backcolor = "#FFFFFF";
        this.categories = [];
    }

    setQuiz(q) {
        this.quiz_id = parseInt(q.quiz_id);
        this.quiz_theme = q.quiz_theme;
        this.quiz_textcolor = q.quiz_textcolor;
        this.quiz_backcolor = q.quiz_backcolor;

        if(quiz.quiz_id > 0) {
            Ajx.getJson('./api.php?t=categories&id=', this.setCategories);
        }
    }

    setCategories(_c) {
        
        this.categories = [];
        
        for(cat of _c) {

        }
    }
}

const appData = {
    el: "#app",
    data: {
        title: "Tedi FlipQuiz",
        message: 'Welcome',

        quiz: new Quiz(),
        categories: [],
        questions: [],
        teams: [],

        gameConfig: true,
        gameReady: false,
        gameStarted: false,
        quizzesLoaded: false,
        activeTeam: 0,
        activeQuestion: 0,    
        question: null,  
    },
    created: function() {

    },
    mounted: function() {
        
    },
    watch: {
      game: function (val) {
        
      },
    },
    methods: {
        setTeams: function(_nb, event) {
            //console.log(event);
            this.game.setTeams(_nb);
            if(this.game.teams.length < 1) {
                this.gameReady = false;
                this.gameStarted = false;
            }
            if(this.quizzesLoaded === false) {
                this.game.db.getQuizzes();
                this.quizzesLoaded = true;
            }
            
            //console.log(this.game.db.quizzes);
        },
        setQuiz: function(){
            this.game.setQuiz(event.target.value);
            this.gameReady = true;
        },
        startQuiz: function(event) {
            this.gameConfig = false;
            this.gameStarted = true;
            this.activeTeam = Math.floor(Math.random() * this.game.teams.length);
            this.game.teams[this.activeTeam].isActive = true;
            this.message = this.game.teams[this.activeTeam].name + "'s turn !";
        },
        questionClick : function(event) {
          this.question = this.game.db.getQuestion(event.target.dataset.qid);

          if(this.question.isAvailable) {
            console.log(this.question);
            this.activeQuestion = this.question.question_id;
          }
        },
        questionAnswer : function(event) {
            this.game.teams[this.activeTeam].score += parseInt(event.target.dataset.score);
            this.message = "Team " + this.game.teams[this.activeTeam].name + " wins " + event.target.dataset.score + "pts";
            this.activeQuestion = 0;
            this.question.isAvailable = false;
            
            var cApp = this;
            setTimeout(function() {
                cApp.game.teams[cApp.activeTeam].isActive = false;
                if(cApp.activeTeam >= cApp.game.teams.length-1) {
                    cApp.activeTeam = 0;
                }
                else {
                    cApp.activeTeam++;
                }
                cApp.game.teams[cApp.activeTeam].isActive = true;

                cApp.message = "" + cApp.game.teams[cApp.activeTeam].name + "'s turn ";
            
            }, 2000);
        } 
    }
    
};