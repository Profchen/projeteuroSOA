INSERT INTO teams(tm_name) VALUES('ESPAGNE'), ('ALLEMAGNE'), ('ANGLETERRE'), ('PORTUGAL')
, ('BELGIQUE'), ('FRANCE'), ('ITALIE'), ('RUSSIE'), ('SUISSE'), ('AUTRICHE'), ('CROATIE')
, ('UKRAINE'), ('REP.  TCHEQUE'), ('SUEDE'), ('POLOGNE'), ('ROUMANIE'), ('SLOVAQUIE')
, ('HONGRIE'), ('TURQUIE'), ('REP. IRLANDE'), ('ISLANDE'), ('PAYS DE GALLES')
, ('ALBANIE'), ('IRLANDE DU NORD');

INSERT INTO matchs(ma_date,ma_id_tm1,ma_id_tm2) VALUES ('2016-06-10 21:00:00', 6, 16),
('2016-06-11 15:00:00', 23, 9), ('2016-06-11 18:00:00', 22, 17),('2016-06-11 21:00:00', 3, 8),
('2016-06-12 15:00:00', 19, 11), ('2016-06-12 18:00:00', 15, 20), ('2016-06-12 21:00:00', 2, 12),
('2016-06-13 15:00:00', 1, 13), ('2016-06-13 18:00:00', 24, 14),('2016-06-13 21:00:00', 5, 7),
('2016-06-14 18:00:00', 10, 18),('2016-06-14 21:00:00', 4, 21), ('2016-06-15 15:00:00', 8, 17),
('2016-06-15 18:00:00', 16, 9), ('2016-06-15 21:00:00', 6, 23);

INSERT INTO users (us_email, us_firstname, us_isAdmin, us_name, us_pseudo, us_pwd) VALUES
('admin@admin.com', 'admin', true, 'admin', 'admin', 'admin'),
('benjamin.gomel@epsi.fr', 'benjamin', false, 'gomel', 'bgomel', 'bgomel'),
('clement.chene@epsi.fr', 'clement', false, 'chene', 'cchene', 'cchene'),
('adrien.mondiere@epsi.fr', 'adrien', false, 'mondiere', 'amondiere', 'amondiere'),
('adrien.stauffer@epsi.fr', 'adrien', false, 'stauffer', 'astauffer', 'astauffer');

INSERT INTO bets(be_point, be_score1, be_score2, ma_id, us_id) VALUES
(0, 2, 1, 1, 2), (0, 2, 3, 1, 3);