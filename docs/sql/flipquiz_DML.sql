-- USE flipquizz;


INSERT INTO fp_quizzes
(`quizz_id`, `quizz_theme`)
VALUES 
(1, 'Quiz Test 1'),
(2, 'Quiz Test 2');

INSERT INTO fp_categories 
(category_id, category_name, category_description, quizz_id) 
VALUES 
(1, 'C#', 'Questions about c#', 1),
(2, 'ASP.NET', 'ASP.NET attacks !', 1),
(3, 'Javascript', 'Javascript is not Java', 1),
(4, 'UML', 'UML is not ULM', 2),
(5, 'Merise', 'Merise time !', 2),
(6, 'Movies', 'French movies', 2),
(7, 'Taratata', 'Music is life', 2),
(8, 'English Basics', 'Beginners', 2),
(9, 'Alsace', 'Jolie région', 2);

INSERT INTO fp_questions 
(question_id, question_content, question_answer, question_level, category_id)
VALUES
(1, 'What is the answer to the question #1 ?', 'Anwser #1', 1, 1),
(2, 'What is the answer to the question #2 ?', 'Anwser #2', 2, 1),
(3, 'What is the answer to the question #3 ?', 'Anwser #3', 3, 1),
(4, 'What is the answer to the question #4 ?', 'Anwser #4', 4, 1),
(5, 'What is the answer to the question #5 ?', 'Anwser #5', 5, 1),
(6, 'What is the answer to the question #6 ?', 'Anwser #6', 1, 2),
(7, 'What is the answer to the question #7 ?', 'Anwser #7', 2, 2),
(8, 'What is the answer to the question #8 ?', 'Anwser #8', 3, 2),
(9, 'What is the answer to the question #9 ?', 'Anwser #9', 4, 2),
(10, 'What is the answer to the question #10 ?', 'Anwser #10', 5, 2),
(11, 'What is the answer to the question #11 ?', 'Anwser #11', 1, 3),
(12, 'What is the answer to the question #12 ?', 'Anwser #12', 2, 3),
(13, 'What is the answer to the question #13 ?', 'Anwser #13', 3, 3),
(14, 'What is the answer to the question #14 ?', 'Anwser #14', 4, 3),
(15, 'What is the answer to the question #15 ?', 'Anwser #15', 5, 3),
(16, 'What is the answer to the question #16 ?', 'Anwser #16', 1, 4),
(17, 'What is the answer to the question #17 ?', 'Anwser #17', 2, 4),
(18, 'What is the answer to the question #18 ?', 'Anwser #18', 3, 4),
(19, 'What is the answer to the question #19 ?', 'Anwser #19', 4, 4),
(20, 'What is the answer to the question #20 ?', 'Anwser #20', 5, 4),
(21, 'What is the answer to the question #21 ?', 'Anwser #21', 1, 5),
(22, 'What is the answer to the question #22 ?', 'Anwser #22', 2, 5),
(23, 'What is the answer to the question #23 ?', 'Anwser #23', 3, 5),
(24, 'What is the answer to the question #24 ?', 'Anwser #24', 4, 5),
(25, 'What is the answer to the question #25 ?', 'Anwser #25', 5, 5),
(26, 'What is the answer to the question #26 ?', 'Anwser #26', 1, 6),
(27, 'What is the answer to the question #27 ?', 'Anwser #27', 2, 6),
(28, 'What is the answer to the question #28 ?', 'Anwser #28', 3, 6),
(29, 'What is the answer to the question #29 ?', 'Anwser #29', 4, 6),
(30, 'What is the answer to the question #30 ?', 'Anwser #30', 5, 6),
(31, 'What is the answer to the question #31 ?', 'Anwser #31', 1, 7),
(32, 'What is the answer to the question #32 ?', 'Anwser #32', 2, 7),
(33, 'What is the answer to the question #33 ?', 'Anwser #33', 3, 7),
(34, 'What is the answer to the question #34 ?', 'Anwser #34', 4, 7),
(35, 'What is the answer to the question #35 ?', 'Anwser #35', 5, 7),
(36, 'What is the answer to the question #36 ?', 'Anwser #36', 1, 7),
(37, 'What is the answer to the question #37 ?', 'Anwser #37', 2, 8),
(38, 'What is the answer to the question #38 ?', 'Anwser #38', 3, 8),
(39, 'What is the answer to the question #39 ?', 'Anwser #39', 4, 8),
(40, 'What is the answer to the question #40 ?', 'Anwser #40', 5, 8),
(41, 'What is the answer to the question #41 ?', 'Anwser #41', 1, 9),
(42, 'What is the answer to the question #42 ?', 'Anwser #42', 2, 9),
(43, 'What is the answer to the question #43 ?', 'Anwser #43', 3, 9),
(44, 'What is the answer to the question #44 ?', 'Anwser #44', 4, 9),
(45, 'What is the answer to the question #45 ?', 'Anwser #45', 5, 9);
