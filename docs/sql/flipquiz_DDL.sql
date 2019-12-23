-- DROP DATABASE IF EXISTS flipquiz;

-- CREATE DATABASE IF NOT EXISTS flipquiz CHARACTER SET UTF8 COLLATE utf8_general_ci;

-- USE flipquiz;


DROP TABLE IF EXISTS fp_questions;
DROP TABLE IF EXISTS fp_categories;
DROP TABLE IF EXISTS fp_quizzes;

-- Partie 1 : Quizz, catégories et questions (!Tedi2020)

CREATE TABLE IF NOT EXISTS fp_quizzes(
   quizz_id INT PRIMARY KEY AUTO_INCREMENT,
   quizz_theme VARCHAR(50) NOT NULL,
   quizz_textcolor CHAR(6) NOT NULL DEFAULT '000000',
   quizz_backcolor CHAR(6) NOT NULL DEFAULT 'FFFFFF'
) ENGINE=InnoDB CHARACTER SET UTF8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS fp_categories(
   category_id INT PRIMARY KEY AUTO_INCREMENT,
   category_name VARCHAR(50) NOT NULL,
   category_description TEXT NULL,
   quizz_id INT NOT NULL
) ENGINE=InnoDB CHARACTER SET UTF8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS fp_questions(
   question_id INT PRIMARY KEY AUTO_INCREMENT,
   question_content VARCHAR(255) NOT NULL,
   question_answer VARCHAR(255) NOT NULL,
   question_level INT NOT NULL DEFAULT 1,
   category_id INT NOT NULL
) ENGINE=InnoDB CHARACTER SET UTF8 COLLATE utf8_general_ci;


ALTER TABLE fp_categories ADD INDEX(`quizz_id`);

ALTER TABLE fp_categories 
   ADD FOREIGN KEY (quizz_id) REFERENCES fp_quizzes(quizz_id) ON UPDATE CASCADE ON DELETE CASCADE;


ALTER TABLE fp_questions ADD INDEX(`category_id`);

ALTER TABLE fp_questions 
   ADD FOREIGN KEY (category_id) REFERENCES fp_categories(category_id) ON UPDATE CASCADE ON DELETE CASCADE;






