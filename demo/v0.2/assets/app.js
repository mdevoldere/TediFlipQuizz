const appData = {
    el: "#app",
    data: {
        title: "Tedi FlipQuiz",
        message: 'Welcome',
        gameConfig: true,
        gameReady: false,
        gameStarted: false,
        quizzesLoaded: false,
        game: new Game(),
        activeTeam: 0        
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
          
        },
        questionAnswer : function(status, event) {

        } 
    }
    
};