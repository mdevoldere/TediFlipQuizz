window.addEventListener('DOMContentLoaded', function() {

    app = new Vue({
        el: '#vue',
        data: {
            quizzes: [],
            game: new Game(),

        },
        mounted: function() {

        },
        methods: {
            getQuizzes: function (_db) {
                this.quizzes = _db.quizzes;
                console.log('App Quizzes loaded ');
            },
            addTeam: function() {
                this.game.addTeam();
                console.log(this.game.teams.length);

                if(this.quizzes.length < 1) {
                    var db = new Db();
                    db.loadQuizzes(this.getQuizzes);
                }

            },
            deleteTeam: function() {
                this.game.deleteTeam();
            },
            loadCategories: function(event) {
                var db = new Db();
                db.loadCategories(event.target.dataset.id);
            },
            getCategories: function() {

            }
        },
    }); 

});


