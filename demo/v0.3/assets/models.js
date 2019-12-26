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
    constructor(q){
        this.question_id = parseInt(q.question_id);
        this.category_id = parseInt(q.category_id);
        this.question_level = (parseInt(q.question_level)*100);
        this.question_content = q.question_content;
        this.question_answer = q.question_answer;
        this.isAvailable = true;
    }
}

class Category 
{
    constructor(c){
        this.category_id = parseInt(c.category_id);
        this.quiz_id = parseInt(c.quiz_id);
        this.category_name = c.category_name;
        this.category_description = c.category_description;
    }
}

class Quiz
{
    constructor(q = null) {
        if(q !== null) {
            this.quiz_id = parseInt(q.quiz_id);
            this.quiz_theme = q.quiz_theme;
            this.quiz_textcolor = q.quiz_textcolor;
            this.quiz_backcolor = q.quiz_backcolor;
        }
        else {
            this.quiz_id = 0;
            this.quiz_theme = "Tedi FlipQuiz";
            this.quiz_textcolor = "#000000";
            this.quiz_backcolor = "#FFFFFF";
        }
    }
}
