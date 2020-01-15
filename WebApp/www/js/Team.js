class Team 
{
    constructor(_id) {
        this.id = parseInt(_id);
        this.name = 'Team #' + this.id;
        this.avatar = '';
        this.score = 0;
    }
}