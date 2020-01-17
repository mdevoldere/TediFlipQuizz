class Db {

    constructor() {
        this.quizzes = [];
    }

    loadQuizzes(_callback) {
        var db = this;
        var ajx = new XMLHtppRequest();
        ajx.open('GET', './api.php?t=quizzes', true);

        ajx.onload = function() {
            if(this.status === 200) {
                var result = JSON.parse(this.responseText);
                db.quizzes = result;
                _callback(db);
            }
        }

        ajx.send();
    }
}