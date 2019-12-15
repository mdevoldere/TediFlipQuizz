DROP DATABASE IF EXISTS flipquizz;

CREATE DATABASE IF NOT EXISTS flipquizz CHARACTER SET UTF8 COLLATE utf8_general_ci;

USE flipquizz;


DROP TABLE IF EXISTS TURNS;
DROP TABLE IF EXISTS GAMES_TEAMS;
DROP TABLE IF EXISTS GAMES;
DROP TABLE IF EXISTS TEAMS;
DROP TABLE IF EXISTS QUESTIONS;
DROP TABLE IF EXISTS CATEGORIES;
DROP TABLE IF EXISTS QUIZZ;

-- Partie 1 : Quizz, catégories et questions

CREATE TABLE IF NOT EXISTS QUIZZ(
   quizz_id INT PRIMARY KEY AUTO_INCREMENT,
   quizz_theme VARCHAR(50) NOT NULL,
   quizz_textcolor CHAR(8) NOT NULL DEFAULT '000000FF',
   quizz_backcolor CHAR(8) NOT NULL DEFAULT 'FFFFFF33'
) ENGINE=InnoDB CHARACTER SET UTF8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS CATEGORIES(
   category_id INT PRIMARY KEY AUTO_INCREMENT,
   category_name VARCHAR(50) NOT NULL,
   category_description TEXT NULL,
   quizz_id INT NOT NULL
) ENGINE=InnoDB CHARACTER SET UTF8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS QUESTIONS(
   question_id INT PRIMARY KEY AUTO_INCREMENT,
   question_content VARCHAR(255) NOT NULL,
   question_answer VARCHAR(255) NOT NULL,
   question_level INT NOT NULL DEFAULT '1',
   category_id INT NOT NULL
) ENGINE=InnoDB CHARACTER SET UTF8 COLLATE utf8_general_ci;


ALTER TABLE CATEGORIES ADD INDEX(`quizz_id`);

ALTER TABLE CATEGORIES 
   ADD FOREIGN KEY (quizz_id) REFERENCES QUIZZ(quizz_id) ON UPDATE CASCADE ON DELETE CASCADE;


ALTER TABLE QUESTIONS ADD INDEX(`category_id`);

ALTER TABLE QUESTIONS 
   ADD FOREIGN KEY (category_id) REFERENCES CATEGORIES(category_id) ON UPDATE CASCADE ON DELETE CASCADE;






-- PARTIE 2 : Equipes, Historique et statistiques

CREATE TABLE IF NOT EXISTS TEAMS(
   team_id INT PRIMARY KEY AUTO_INCREMENT,
   team_name VARCHAR(50) NOT NULL
) ENGINE=InnoDB CHARACTER SET UTF8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS GAMES(
   game_id INT PRIMARY KEY AUTO_INCREMENT,
   game_date DATETIME NOT NULL,
   quizz_id INT NOT NULL
) ENGINE=InnoDB CHARACTER SET UTF8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS GAMES_TEAMS(
   game_id INT NOT NULL,
   team_id INT NOT NULL,
   PRIMARY KEY(game_id, team_id)
) ENGINE=InnoDB CHARACTER SET UTF8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS TURNS(
   game_id INT NOT NULL,
   team_id INT NOT NULL,
   question_id INT NOT NULL,
   PRIMARY KEY(game_id, team_id, question_id),
   turn_points INT NOT NULL
) ENGINE=InnoDB CHARACTER SET UTF8 COLLATE utf8_general_ci;


ALTER TABLE `GAMES` ADD INDEX(`quizz_id`);
ALTER TABLE `GAMES_TEAMS` ADD INDEX(`game_id`);
ALTER TABLE `GAMES_TEAMS` ADD INDEX(`team_id`);
ALTER TABLE `TURNS` ADD INDEX(`team_id`);
ALTER TABLE `TURNS` ADD INDEX(`game_id`);
ALTER TABLE `TURNS` ADD INDEX(`question_id`);

ALTER TABLE GAMES 
   ADD FOREIGN KEY (quizz_id) REFERENCES QUIZZ(quizz_id) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE GAMES_TEAMS 
   ADD FOREIGN KEY (game_id) REFERENCES GAMES(game_id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE GAMES_TEAMS 
ADD FOREIGN KEY (team_id) REFERENCES TEAMS(team_id) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE TURNS 
   ADD FOREIGN KEY (game_id) REFERENCES GAMES(game_id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE TURNS 
   ADD FOREIGN KEY (team_id) REFERENCES TEAMS(team_id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE TURNS 
   ADD FOREIGN KEY (question_id) REFERENCES QUESTIONS(question_id) ON UPDATE CASCADE ON DELETE CASCADE;
