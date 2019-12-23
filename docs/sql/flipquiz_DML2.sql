INSERT INTO TEAMS
(team_id, team_name)
VALUES
(1, 'DWWM'),
(2, 'CDA'),
(3, 'Formateurs');

-- 2019-11-28 15:04:00
INSERT INTO GAMES 
(game_id, game_date, quizz_id)
VALUES
(1, '2019-11-28 15:04:54', 1),
(2, '2020-01-03 09:30:01', 2);


INSERT INTO GAMES_TEAMS 
(game_id, team_id) 
VALUES
(1, 1), (1, 2),
(2, 2), (2, 3);

INSERT INTO TURNS
(team_id, question_id, game_id)
VALUES
();