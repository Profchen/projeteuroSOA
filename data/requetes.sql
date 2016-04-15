-- USERS

-- CONNECTION
SELECT * FROM USERS WHERE us_id = ;

-- INSCRIPTION
INSERT INTO USERS (us_email, us_firstname, us_isAdmin, us_name, us_pseudo, us_pwd) VALUES
('', '', false, '', '', '');

---HISTORIQUE
SELECT be_score1, be_score2, ma.ma_id, us_id, ma_id_tm1, ma_id_tm2,
ma.ma_date, te1.tm_id AS idTeam1, te1.tm_name AS nameTeam1,  te2.tm_id AS idTeam2, te2.tm_name AS nameTeam2
FROM bets be
INNER JOIN matchs ma ON ma.ma_id = be.ma_id
INNER JOIN teams te1 ON te1.tm_id = ma_id_tm1
INNER JOIN teams te2 ON te2.tm_id = ma_id_tm2
WHERE us_id = ;

-- PARIER
INSERT INTO bets(be_score1, be_score2, ma_id, us_id) VALUES
( , , , );

-- VOIR MATCHS
SELECT te1.tm_id as idTeam1, te1.tm_name as nameTeam1, te2.tm_id as idTeam2, te2.tm_name as nameTeam2,
ma_id, ma_date, ma_score1, ma_score2
FROM MATCHS
INNER JOIN TEAMS te1 ON te1.tm_id = ma_id_tm1
INNER JOIN TEAMS te2 ON te2.tm_id = ma_id_tm2

-- VOIR CLASSEMENT
SELECT SUM(be_point) AS TOTAL, us_name FROM bets
INNER JOIN USERS us ON us.us_id = bets.us_id
GROUP BY bets.us_id

-- ADMIN
-- AJOUTER UNE EQUITE
INSERT INTO TEAMS(tm_name) VALUES ('');

-- AJOUTER MATCH
INSERT INTO MATCHS(ma_date, ma_id_tm1, ma_id_tm2) VALUES
('', ,);

-- VALIDER SCORE
UPDATE MATCHS SET ma_score1 = , ma_score2 =  WHERE
ma_id = ;

--/////////////////////// TRIGGER /////////////////// --
/*// ON UPDATE SCORE //*/
CREATE OR REPLACE TRIGGER update_point_win
AFTER UPDATE ON MATCHS
	DECLARE
		score1 INT;
		score2 INT;
		var number:=0;
		var point:=0;
	BEGIN
		SELECT ma_score1 AS score1, ma_score2 AS score2
		FROM MATCHS
		WHERE ma_id = :New.ma_id;

		if (score1 > score2){
			UPDATE bets SET (be_point = be_point + 2)
			WHERE be_score1 > be_score2;
		} else if (score1 < score2){
			UPDATE bets SET (be_point = be_point + 2)
			WHERE be_score1 < be_score2;
		}

		SELECT be_id as ids FROM bets
		WHERE score1 = be_score1 AND score2 = be_score2
		ORDRE BY be_date;

		LOOP
			FETCH ids INTO id;
			EXIT WHEN (id%NOTFOUND);
			var := var + 1;

			CASE id
				WHEN 1 THEN point := 15;
				WHEN 2 THEN point := 12;
				WHEN 3 THEN point := 10;
				WHEN 4 THEN point := 9;
				WHEN 5 THEN point := 8;
				WHEN 6 THEN point := 7;
				WHEN 7 THEN point := 6;
				WHEN 8 THEN point := 5;
				WHEN 9 THEN point := 4;
				WHEN 10 THEN point := 3;
				WHEN 11 THEN point := 2;
				ELSE BEGIN point := 1; END;
			END CASE;

			UPDATE bets SET (be_point = be_point + point)
			WHERE be_id = id;
	END;

