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
            addTeam: function() {
                this.game.addTeam();
                console.log(this.game.teams.length);
            },
            deleteTeam: function() {
                this.game.deleteTeam();
            }
        },
    }); 

    document.querySelector('#btn').addEventListener('click', function() {
        app.year = parseInt(app.year);
        app.year += 1;
        app.isActive = !app.isActive;
    });


});


