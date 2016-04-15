CREATE DATABASE EURO_SOA;

USE EURO_SOA;

#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Teams
#------------------------------------------------------------

CREATE TABLE Teams(
        tm_id   int (11) Auto_increment  NOT NULL ,
        tm_name Varchar (25) NOT NULL ,
        PRIMARY KEY (tm_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Matchs
#------------------------------------------------------------

CREATE TABLE Matchs(
        ma_id     int (11) Auto_increment  NOT NULL ,
        ma_id_tm1 Int NOT NULL ,
        ma_id_tm2 Int NOT NULL ,
        ma_date   DateTime NOT NULL ,
        ma_score1 Int ,
        ma_score2 Int ,
        PRIMARY KEY (ma_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Users
#------------------------------------------------------------

CREATE TABLE Users(
        us_id        int (11) Auto_increment  NOT NULL ,
        us_name      Varchar (25) NOT NULL ,
        us_firstname Varchar (25) NOT NULL ,
        us_email     Varchar (25) NOT NULL ,
        us_pseudo    Varchar (25) NOT NULL ,
        us_pwd       Varchar (25) NOT NULL ,
        us_isAdmin   Bool NOT NULL ,
        PRIMARY KEY (us_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Bets
#------------------------------------------------------------

CREATE TABLE Bets(
        be_score1 Int ,
        be_score2 Int ,
        be_date   Date ,
        be_point  Int ,
        ma_id     Int NOT NULL ,
        us_id     Int NOT NULL ,
        PRIMARY KEY (ma_id ,us_id )
)ENGINE=InnoDB;

ALTER TABLE Matchs ADD CONSTRAINT FK_Matchs_tm_id1 FOREIGN KEY (ma_id_tm1) REFERENCES Teams(tm_id);
ALTER TABLE Matchs ADD CONSTRAINT FK_Matchs_tm_id2 FOREIGN KEY (ma_id_tm2) REFERENCES Teams(tm_id);
ALTER TABLE Bets ADD CONSTRAINT FK_Bets_ma_id FOREIGN KEY (ma_id) REFERENCES Matchs(ma_id);
ALTER TABLE Bets ADD CONSTRAINT FK_Bets_us_id FOREIGN KEY (us_id) REFERENCES Users(us_id);
