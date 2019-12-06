-- 1)	Sélectionner un Quizz à partir de son identifiant
SELECT * FROM QUIZZ WHERE quizz_id='1';

-- 2)	Sélectionner tous les Quizz
SELECT * FROM QUIZZ;

-- 3)	Sélectionner une catégorie par son identifiant en intégrant le nom du quizz
SELECT CATEGORIES.category_id, QUIZZ.quizz_theme FROM CATEGORIES
INNER JOIN QUIZZ ON CATEGORIES.quizz_id = QUIZZ.quizz_id 
WHERE category_id='1';

-- 4)	Sélectionner toutes les catégories
SELECT * FROM CATEGORIES;

-- 5)	Sélectionner toutes les catégories d’un Quizz à partir de l’identifiant du Quizz
SELECT * FROM CATEGORIES WHERE quizz_id='1';

-- 6)	Sélectionner toutes les questions
SELECT * FROM QUESTIONS;

-- 7)	Sélectionner toutes les questions d’une catégorie à partir de l’identifiant de la catégorie
SELECT * FROM QUESTIONS WHERE category_id='1',


-- 8)	Sélectionner toutes les questions d’un Quizz à partir de l’identifiant d’un Quizz
SELECT * FROM QUESTIONS 
INNER JOIN CATEGORIES ON QUESTIONS.category_id = CATEGORIES.category_id 
WHERE CATEGORIES.quizz_id = '1';

SELECT * FROM QUESTIONS 
INNER JOIN CATEGORIES ON QUESTIONS.category_id = CATEGORIES.category_id AND CATEGORIES.quizz_id = '1';

-- INSERTIONS
-- 1)	Ajouter un Quizz
INSERT INTO QUIZZ 
(quizz_theme, quizz_textcolor, quizz_backcolor)
VALUES
('Preterit', 'FF0000', '0000FF');

-- 2)	Ajouter une catégorie à un Quizz
INSERT INTO CATEGORIES 
(category_name, category_description, quizz_id) 
VALUES
('Verbs', 'questions about verbs', 1);

-- 3)	Ajouter une question à une catégorie
INSERT INTO QUESTIONS 
(question_content, question_answer, question_level, category_id)
VALUES 
('Who am I ?', 'I am', '1', 1);

-- Mise à jour
-- 1)	Éditer un quizz
UPDATE QUIZZ SET quizz_theme='', quizz_textcolor='', quizz_backcolor='' 
WHERE quizz_id='1';

-- 2)	Éditer une catégorie
UPDATE CATEGORIES SET category_name='', category_description='', quizz_id='' 
WHERE category_id=1;

-- 3)	Éditer une question
UPDATE QUESTIONS SET question_content='', question_answer='', question_level='', category_id='' 
WHERE question_id='1';

-- Suppression
-- 1)	Supprimer un quizz (et toutes les catégories et questions associées)
DELETE FROM QUIZZ WHERE quizz_id='1';

-- 2)	Supprimer une catégorie (et toutes les questions associées)
DELETE FROM CATEGORIES WHERE category_id='';

-- 3)	Supprimer une question
DELETE FROM QUESTIONS WHERE question_id='';


-- Vérification
-- 1)	Un quizz a-t’ il au moins une catégorie associée ?
SELECT COUNT(quizz_id) FROM CATEGORIES WHERE quizz_id = '';

-- 2)	Une catégorie a-t’ elle exactement 5 questions associées (une par niveau)


-- Adrien's first proposal
SELECT COUNT(*) FROM CATEGORIES WHERE CATEGORIES.category_id='' 
AND 
(
    SELECT COUNT(DISTINCT QUESTIONS.question_level) 
    FROM QUESTIONS WHERE QUESTIONS.category_id=CATEGORIES.category_id 
) = 5;

-- Mickael's proposal
SELECT COUNT(DISTINCT QUESTIONS.question_level) = 5 
    FROM QUESTIONS WHERE QUESTIONS.category_id='';
