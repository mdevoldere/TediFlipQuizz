# TediFlipQuizz
 
Un "Flip Quizz" met en concurrence plusieurs  équipes qui s’affrontent dans un jeu de questions/réponses au tour par tour.
L’interface du jeu présente 1 à 6 thèmes différents et chaque thème affiché propose 5 questions de niveaux différents (du plus facile au plus compliqué). 

Au début d’une partie de jeu, une équipe est sélectionnée au hasard pour commencer le 1er tour . A chaque tour, l’équipe courante sélectionne un thème et un niveau. Une question correspondante est alors affichée et un compte à rebours se déclenche. L’équipe peut se concerter et doit proposer une réponse dans un délai maximum de 3 minutes. Si la réponse donnée est correcte, les points correspondant sont attribués à l’équipe. Dans le cas contraire, aucun point n’est attribué. Une équipe ne peut proposer qu’une seule réponse par question.

Le jeu est dirigé par un Maître de jeu qui est responsable de l’interaction avec le logiciel. 
Le maître de jeu a la possibilité d’accéder à une interface de gestion qui permet :
-	De créer, modifier supprimer des équipes,  des quizz, des thèmes et des questions.
-	D’accéder à l’historique des parties jouées.
-	D’exporter l’historique ou les statistiques d’une partie au format Excel.
-	De sauvegarder une partie en cours dans le but de la reprendre lors d’une séance ultérieure.

L'application sera utilisée en mode "projection". Elle n'a pas vocation à mettre en concurrence 2 équipes par écrans interposés. Les participants n'interagissent pas directement avec le logiciel. 
Durant une partie de quizz, c'est le maitre de jeu qui valide ou invalide une réponse à une question.
L'application sera utilisable au travers d'un navigateur web et sera proposée en 2 déclinaisons : 
### Base
-	Administration des quizz, catégories et questions.
-	Lancement d'une partie de quizz paramétrée (choix du quizz, nom des équipes)
-	Interface du jeu
### Évolué
-	Toutes les fonctionnalités de la version de base
-	Gestion d'un historique
 * Persistance des équipes avec cumul des points
 * Historique des parties (chaque tour de jeu est enregistré)
-	Statistiques et Exportation
 *	Statistiques des équipes, parties…
 *	Export des statistiques au format Excel
