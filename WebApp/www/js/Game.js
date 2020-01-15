class Game 
{
    constructor() {
        this.teams = [];
        this.quiz = new Quiz();
    }

    addTeam() {
        let _id = this.teams.length + 1;
        this.teams.push(new Team(_id));
    }

    deleteTeam() {
        this.teams.pop();
    }
}
/*
Game = function() {
    this.teams = [];
    this.quiz = new Quiz();

    this.addTeam = function() {
        let _id = this.teams.length + 1;
        this.teams.push(new Team(_id));
    }

    this.deleteTeam() {
        this.teams.pop();
    }
}

Game.prototype.addTeam = function() {
    let _id = this.teams.length + 1;
    this.teams.push(new Team(_id));
}
*/