class Game
{
    constructor() {
        this.ready = false;
        this.db = new Db(this.loaded);
    }

    loaded(_db) {
        this.ready = true;
    }
}