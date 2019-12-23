const appData = {
    el: "#app",
    data: {
        title: "Tedi FlipQuiz",
        message: 'Welcome',
        game: new Game(),
        
    },
    created: function() {
        
        this.game.init();
    },
    mounted: function() {
        
        this.game.init();
    },
    methods: {
        selectTeams: function(event) {

        },
        startQuiz: function(event) {
        },
        questionClick : function(event) {
          
        },
        questionAnswer : function(status, event) {
        } 
    }
    
};