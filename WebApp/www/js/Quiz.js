class Quiz 
{
    constructor() {
        this.quiz_id = 1;
        this.quiz_theme = 'My Quiz';
        this.quiz_textcolor = '';
        this.quiz_backcolor = '';
        this.categories = [];
    }

    /**
     * 
     * @param {array} _input 
     */
    hydrate(_input) {
        this.quiz_id = _input.quiz_id;
        this.quiz_theme = _input.quiz_theme;
        this.quiz_textcolor = _input.quiz_textcolor;
        this.quiz_backcolor = _input.quiz_backcolor;
    }
}