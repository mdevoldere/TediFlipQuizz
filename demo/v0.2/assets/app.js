const appData = {
    el: "#app",
    data: {
        title: "Tedi FlipQuiz",
        message: 'Welcome',
        gameReady: false,
        quizzesLoaded: false,
        game: new Game(),        
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

        },
        questionClick : function(event) {
          
        },
        questionAnswer : function(status, event) {

        } 
    }
    
};