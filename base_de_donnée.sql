DROP DATABASE IF EXISTS UNIVERSITY;

CREATE DATABASE IF NOT EXISTS UNIVERSITY;
USE UNIVERSITY;
# -----------------------------------------------------------------------------
#       TABLE : EMPLOYER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS EMPLOYER
 (
   ID INTEGER NOT NULL  ,
   ID_CATEGORIE VARCHAR(128) NOT NULL  ,
   NOM VARCHAR(128) NULL  ,
   PRENOM VARCHAR(128) NULL  
   , PRIMARY KEY (ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE EMPLOYER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_EMPLOYER_CATEGORIE
     ON EMPLOYER (ID_CATEGORIE ASC);

# -----------------------------------------------------------------------------
#       TABLE : PIECES
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PIECES
 (
   CODE INTEGER NOT NULL  ,
   LIBELLE CHAR(32) NULL  
   , PRIMARY KEY (CODE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : ETUDIANT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ETUDIANT
 (
   ID INTEGER NOT NULL  ,
   NOM VARCHAR(128) NULL  ,
   PRENOM VARCHAR(128) NULL  ,
   ADRESSE VARCHAR(128) NULL  ,
   TEL VARCHAR(128) NULL  ,
   MAIL VARCHAR(128) NULL  
   , PRIMARY KEY (ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : SERVICE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SERVICE
 (
   ID INTEGER NOT NULL  ,
   LIBELLE CHAR(32) NULL  ,
   PRIX DOUBLE PRECISION(13,2) NULL  
   , PRIMARY KEY (ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : FORMATION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS FORMATION
 (
   CODE INTEGER NOT NULL  ,
   LIBELLE CHAR(32) NULL  ,
   DATE DATE NULL  
   , PRIMARY KEY (CODE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : RENDEZ_VOUS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS RENDEZ_VOUS
 (
   CODE INTEGER NOT NULL  ,
   ID INTEGER NOT NULL  ,
   ID_CRÉER INTEGER NOT NULL  ,
   ID_PRENDRE INTEGER NOT NULL  ,
   DATE DATE NULL  ,
   CONCLUSION VARCHAR(128) NULL  ,
   ETATPAYMENT VARCHAR(128) NULL  
   , PRIMARY KEY (CODE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE RENDEZ_VOUS
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_RENDEZ_VOUS_SERVICE
     ON RENDEZ_VOUS (ID ASC);

CREATE  INDEX I_FK_RENDEZ_VOUS_EMPLOYER
     ON RENDEZ_VOUS (ID_CRÉER ASC);

CREATE  INDEX I_FK_RENDEZ_VOUS_ETUDIANT
     ON RENDEZ_VOUS (ID_PRENDRE ASC);

# -----------------------------------------------------------------------------
#       TABLE : CATEGORIE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CATEGORIE
 (
   ID_CATEGORIE VARCHAR(128) NOT NULL  ,
   NOM_CAT CHAR(32) NULL  ,
   USERNAME VARCHAR(128) NULL  ,
   PASSWORD VARCHAR(255) NULL  
   , PRIMARY KEY (ID_CATEGORIE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : PARTICIPE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PARTICIPE
 (
   ID INTEGER NOT NULL  ,
   CODE INTEGER NOT NULL  
   , PRIMARY KEY (ID,CODE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PARTICIPE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PARTICIPE_EMPLOYER
     ON PARTICIPE (ID ASC);

CREATE  INDEX I_FK_PARTICIPE_FORMATION
     ON PARTICIPE (CODE ASC);

# -----------------------------------------------------------------------------
#       TABLE : NECESSITE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS NECESSITE
 (
   ID INTEGER NOT NULL  ,
   CODE INTEGER NOT NULL  
   , PRIMARY KEY (ID,CODE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE NECESSITE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_NECESSITE_SERVICE
     ON NECESSITE (ID ASC);

CREATE  INDEX I_FK_NECESSITE_PIECES
     ON NECESSITE (CODE ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE EMPLOYER 
  ADD FOREIGN KEY FK_EMPLOYER_CATEGORIE (ID_CATEGORIE)
      REFERENCES CATEGORIE (ID_CATEGORIE) ;


ALTER TABLE RENDEZ_VOUS 
  ADD FOREIGN KEY FK_RENDEZ_VOUS_SERVICE (ID)
      REFERENCES SERVICE (ID) ;


ALTER TABLE RENDEZ_VOUS 
  ADD FOREIGN KEY FK_RENDEZ_VOUS_EMPLOYER (ID_CRÉER)
      REFERENCES EMPLOYER (ID) ;


ALTER TABLE RENDEZ_VOUS 
  ADD FOREIGN KEY FK_RENDEZ_VOUS_ETUDIANT (ID_PRENDRE)
      REFERENCES ETUDIANT (ID) ;


ALTER TABLE PARTICIPE 
  ADD FOREIGN KEY FK_PARTICIPE_EMPLOYER (ID)
      REFERENCES EMPLOYER (ID) ;


ALTER TABLE PARTICIPE 
  ADD FOREIGN KEY FK_PARTICIPE_FORMATION (CODE)
      REFERENCES FORMATION (CODE) ;


ALTER TABLE NECESSITE 
  ADD FOREIGN KEY FK_NECESSITE_SERVICE (ID)
      REFERENCES SERVICE (ID) ;


ALTER TABLE NECESSITE 
  ADD FOREIGN KEY FK_NECESSITE_PIECES (CODE)
      REFERENCES PIECES (CODE) ;

