class Team
{
    constructor(_id, _name) {
        this.id = _id;
        this.name = _name;
        this.score = 0;
        this.isActive = false;
    }
}


class Question 
{
    constructor(_cat_id, _id, _level, _content){
        this.category_id = _cat_id;
        this.id = _id;
        this.selector = ("Q" + this.id);
        this.level = _level;
        this.content = "Question content for #" + this.id;
        this.answer = "";
        this.isAvailable = true;
    }
}

class Category 
{
    constructor(_id){
        this.id = _id*10;
        this.name = "Category " + this.id;
        this.description = "";
        this.questions = [
            new Question(this.id, this.id+1, 100, 1),
            new Question(this.id, this.id+2, 200, 2),
            new Question(this.id, this.id+3, 300, 3),
            new Question(this.id, this.id+4, 400, 4),
            new Question(this.id, this.id+5, 500, 5)
        ];
    }
}

class Quiz
{
    constructor(_nb_teams)  {
        this.theme = "Tedi FlipQuiz";
        this.textcolor = "FFFFFF";
        this.backcolor = "000000";
        this.backimage = "uj.jpg";
        this.categories = [
            new Category(1),
            new Category(2),
            new Category(3),
            new Category(4),
            new Category(5),
            new Category(6)
        ];

        this.questions = [];
 
        for(var i=0; i< this.categories.length; i++) {
            for(var j=0; j<this.categories[i].questions.length; j++) {
                this.questions.push(this.categories[i].questions[j]);
            }
        }

        this.teams = [];

        for(var i=0; i<_nb_teams; i++) {
            this.teams.push(new Team(i+1, "Team #" +(i+1)));
        }

        this.activeTeamIdx = Math.floor(Math.random() * this.teams.length);
        this.activeTeam.isActive = true;

        this.message = "Welcome !";
    }

    get activeTeam() {
        return this.teams[this.activeTeamIdx];
    }

    getQuestion(_id)
    {
        return this.questions.find(item => item.id === parseInt(_id));
    }

    static setMessage(_quiz, _message) {
        _quiz.message =  _message;
    }

    startRound() {
        var msg = this.activeTeam.name + "'s turn !";
        var q = this;
        setTimeout(function() { Quiz.setMessage(q, msg)}, 5000);
    }

    endRound(_won) {

        this.activeTeam.score += parseInt(_won);
        this.activeTeam.isActive = false;

        this.message = this.activeTeam.name + ' wins ' + _won + ' points';

        if(this.activeTeamIdx >= (this.teams.length - 1)) {
            this.activeTeamIdx = 0;
        }
        else {
            this.activeTeamIdx++;
        }

        this.activeTeam.isActive = true;

        this.startRound();
    }



}