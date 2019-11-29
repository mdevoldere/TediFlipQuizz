USE flipquizz;


INSERT INTO TEAMS
(team_id, team_name)
VALUES
(1, 'DWWM'),
(2, 'CDA'),
(3, 'Formateurs');

INSERT INTO `QUIZZ`
(`quizz_id`, `quizz_name`)
VALUES 
(1, 'Quizz de Noël'),
(2, 'Quizz du 3 Janvier');

INSERT INTO THEMES 
(theme_id, theme_name, theme_description) 
VALUES 
(1, 'C#', 'Questions about c#')
(2, 'ASP.NET', 'ASP.NET attacks !'),
(3, 'Javascript', 'Javascript is not Java'),
(4, 'UML', 'UML is not ULM'),
(5, 'Merise', 'Merise time !'),
(6, 'Movies', NULL),
(7, 'Video Games', 'Online Game');

INSERT INTO LEVELS 
(level_id, level_point)
VALUES 
(1, '100'),
(2, '200'),
(3, '300'),
(4, '400'),
(5, '500');

-- 2019-11-28 15:04:00
INSERT INTO GAMES 
(game_id, game_date, quizz_id)
VALUES
(1, '2019-11-28 15:04:54', 1),
(2, '2020-01-03 09:30:01', 2);


INSERT INTO QUESTIONS 
(question_id, question_content, question_answer, level_id, theme_id)
(1, 'What is the answer to the question #1 ?', 'Anwser #1', 1, 1),
(2, 'What is the answer to the question #2 ?', 'Anwser #2', 1, 1),
(3, 'What is the answer to the question #3 ?', 'Anwser #3', 2, 1),
(4, 'What is the answer to the question #4 ?', 'Anwser #4', 3, 1),
(5, 'What is the answer to the question #5 ?', 'Anwser #5', 4, 1),
(6, 'What is the answer to the question #6 ?', 'Anwser #6', 5, 1),
(7, 'What is the answer to the question #7 ?', 'Anwser #7', 1, 2),
(8, 'What is the answer to the question #8 ?', 'Anwser #8', 1, 2),
(9, 'What is the answer to the question #9 ?', 'Anwser #9', 2, 2),
(10, 'What is the answer to the question #10 ?', 'Anwser #10', 3, 2),
(11, 'What is the answer to the question #11 ?', 'Anwser #11', 4, 2),
(12, 'What is the answer to the question #12 ?', 'Anwser #12', 5, 2),
(13, 'What is the answer to the question #13 ?', 'Anwser #13', 1, 3),
(14, 'What is the answer to the question #14 ?', 'Anwser #14', 1, 3),
(15, 'What is the answer to the question #15 ?', 'Anwser #15', 2, 3),
(16, 'What is the answer to the question #16 ?', 'Anwser #16', 3, 3),
(17, 'What is the answer to the question #17 ?', 'Anwser #17', 4, 3),
(18, 'What is the answer to the question #18 ?', 'Anwser #18', 5, 3),
(19, 'What is the answer to the question #19 ?', 'Anwser #19', 1, 4),
(20, 'What is the answer to the question #20 ?', 'Anwser #20', 1, 4),
(21, 'What is the answer to the question #21 ?', 'Anwser #21', 2, 4),
(22, 'What is the answer to the question #22 ?', 'Anwser #22', 3, 4),
(23, 'What is the answer to the question #23 ?', 'Anwser #23', 4, 4),
(24, 'What is the answer to the question #24 ?', 'Anwser #24', 5, 4),
(25, 'What is the answer to the question #25 ?', 'Anwser #25', 1, 5),
(26, 'What is the answer to the question #26 ?', 'Anwser #26', 1, 5),
(27, 'What is the answer to the question #27 ?', 'Anwser #27', 2, 5),
(28, 'What is the answer to the question #28 ?', 'Anwser #28', 3, 5),
(29, 'What is the answer to the question #29 ?', 'Anwser #29', 4, 5),
(30, 'What is the answer to the question #30 ?', 'Anwser #30', 5, 5);

INSERT INTO QUIZZ_THEMES
(theme_id, quizz_id)
VALUES
(1, 1), (2, 1), (3, 1), 
(1, 2), (2, 2), (3, 2), (4, 2), (5, 2);

INSERT INTO GAMES_TEAMS 
(game_id, team_id) 
VALUES
(1, 1), (1, 2),
(2, 2), (2, 3);

INSERT INTO TURNS
(team_id, question_id, game_id)
VALUES
();