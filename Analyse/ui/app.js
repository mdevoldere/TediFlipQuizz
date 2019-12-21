class Team
{
    constructor(_id, _name) {
        this.id = _id;
        this.name = _name;
        this.isActive = false;
    }
}

class Question 
{
    constructor(_id, _level, _content){
        this.id = _id;
        this.selector = ("Q" + this.id);
        this.level = _level;
        this.content = "Question content for #" + this.id;
    }
}

class Category 
{
    constructor(_id){
        this.id = _id*10;
        this.questions = [
            new Question(this.id+1, 100, 1),
            new Question(this.id+2, 200, 2),
            new Question(this.id+3, 300, 3),
            new Question(this.id+4, 400, 4),
            new Question(this.id+5, 500, 5)
        ];
    }
}


var appTop = {
    el: '#top',
    data: {
        title: 'Tedi FlipQuiz',
        teams: [
            new Team(1, "Team #1"),
            new Team(2, "Team #2")
        ]
    }
};

var appMain = {
    el: '#app',
    data: {
        categories: [
            new Category(1),
            new Category(2),
            new Category(3),
            new Category(4),
            new Category(5),
            new Category(6)
        ]
    }
};

    

