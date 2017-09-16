CREATE DATABASE Quizes;

CREATE TABLE Questions (
	quizId varchar(50) NOT NULL
,	questionId int NOT NULL
,	question varchar(50) NOT NULL
,	answer varchar(50) NOT NULL
, PRIMARY KEY ( quizId, questionId)
);

CREATE TABLE Options (
	quizId varchar(50) NOT NULL
,	questionId int NOT NULL
,	possibleAnswer varchar(50) NOT NULL
,PRIMARY KEY(quizId, questionId, possibleAnswer)
);

CREATE TABLE Answers (	
	quizId varchar(50)
,	questionId int
,	playerId varchar(50)
,	answer varchar(50)
,       PRIMARY KEY(quizId, questionId,playerId)
);

INSERT INTO Questions (quizId,questionId,question,answer) VALUES ( 'WorldCup',1 ,'Who Won the World Cup in 1970','Brazil');
INSERT INTO Options   (quizId,questionId,possibleAnswer)  VALUES ( 'WorldCup',1,'Brazil');
INSERT INTO Options   (quizId,questionId,possibleAnswer)  VALUES ( 'WorldCup',1,'Italy');
INSERT INTO Options   (quizId,questionId,possibleAnswer)  VALUES ( 'WorldCup',1,'England');

INSERT INTO Answers   (quizId,questionId,playerId,answer) VALUES ( 'WorldCup',1,'Chloe','Brazil');
INSERT INTO Answers   (quizId,questionId,playerId,answer) VALUES ( 'WorldCup',2,'Chloe','Portgual');

CREATE PROCEDURE getQuizes()
BEGIN
	SELECT DISTINCT quizId FROM Questions;
END

DELIMITER //
CREATE PROCEDURE GetOptionsWithAnswer()
BEGIN 
		CREATE TEMPORARY TABLE OptionsWithAnswer (
                              quizId varchar(50) NOT NULL
                       ,       questionId int NOT NULL
                       ,       possibleAnswer varchar(50) NOT NULL
                       ,       playerAnswer varchar(12) NULL);
                 
		 INSERT INTO OptionsWithAnswer ( quizId, questionId,possibleAnswer,playerAnswer)
                 SELECT DISTINCT o.quizId,o.questionId,o.possibleAnswer, NULL 
                 FROM Options o
                 WHERE o.quizId = "WorldCup";
                 
                 UPDATE OptionsWithAnswer o, Answers a
                 SET o.playerAnswer = "checked"
                 WHERE  a.questionId = o.questionId
                 AND a.quizId = o.quizId
                 AND a.playerId = "Colin"
                 AND o.possibleAnswer = a.answer;
                  
                 SELECT questionId,possibleAnswer,playerAnswer 
		 FROM OptionsWithAnswer;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE GetScores()
BEGIN

	 SELECT playerId,count(*) score
         FROM Answers a, Questions q 
         WHERE a.quizId = q.quizId 
         AND  a.questionId = q.questionId 
         AND  q.answer = a.answer 
         GROUP BY playerId;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE GetQuestion()
BEGIN


	CREATE TEMPORARY TABLE OptionsWithAnswer (
                               quizId varchar(50) NOT NULL
                       ,       questionId int NOT NULL
                       ,       possibleAnswer varchar(50) NOT NULL
                       ,       playerAnswer varchar(12) NULL);

	SELECT DISTINCT quizId,questionId,question,answer 
	FROM Questions q
	,    Answers   a
	WHERE q.quizId = 'WorldCup'
	AND   a.questionId = q.questionId
	AND   q.quizId = a.quizId
	AND   q.playerId = 
	
END //
DELIMITER ;
