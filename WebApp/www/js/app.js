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

                /*for (var myQuiz of this.quizzes) {
                    if(myQuiz.quiz_id == event.target.dataset.id) {
                        this.game.quiz.hydrate(myQuiz);
                        break;
                    }
                }*/

                var quiz = this.quizzes.find(myQuiz => myQuiz.quiz_id == event.target.dataset.id);
                this.game.quiz.hydrate(quiz);

                var db = new Db();
                db.loadCategories(event.target.dataset.id, this.getCategories);
            },
            getCategories: function(_db) {

               /*for(var cat of _db.categories) {
                    var newCat = new Category();
                    newCat.hydrate(cat);
                    this.game.quiz.categories.push(newCat);
               }*/

               this.game.quiz.categories = _db.categories.map(item => new Category().hydrate(item));

                console.log("App Categories loaded");
            }
        },
    }); 

});


