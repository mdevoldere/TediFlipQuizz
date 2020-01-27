Category = function() {
    this.category_id = 1;
    this.category_name = '';
    this.category_description = '';
    this.quiz_id = 0;
    this.questions = [];
}

Category.prototype.hydrate = function(_input) {
    this.category_id = _input.category_id;
    this.category_name = _input.category_name;
    this.category_description = _input.category_description;
    this.quiz_id = _input.quiz_id;
    return this;
}