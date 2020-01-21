class Db {

    constructor() {
        this.quizzes = [];
    }

    loadQuizzes(_callback) {
        var dbself = this;

        var ajx = new XMLHttpRequest();
        // GET - POST - PUT - DELETE
        // LIRE - AJOUT - METTRE A JOUR - SUPPRIMER
        ajx.open('GET', './api.php?t=quizzes', true);

        ajx.onload = function() {
            if(this.status === 200) {
                var json = JSON.parse(this.responseText);
                dbself.quizzes = json;
                _callback(dbself);
                console.log('Db Quizzes loaded !');
            }
            else {
                alert('Error loading Quizzes');
            }
            
        }

        ajx.send();
    }

    loadCategories(_id) {
        var ajx = new XMLHttpRequest();

        ajx.open('GET', './api.php?t=categories&id=' + _id, true);

        ajx.onload = function() {
            if(this.status === 200) {
                var json = JSON.parse(this.responseText);
                console.log(json);
            }
            else {
                alert('Error loading Categories');
            }
        }

        ajx.send();

    }

    loadQuestions() {

    }
}
