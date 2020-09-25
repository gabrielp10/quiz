USE `quizdb`;


--  Pegar todas as questoes cadastradas
SELECT *
FROM questionarios q
INNER JOIN questoes qt ON qt.fk_questionarios = q.id

