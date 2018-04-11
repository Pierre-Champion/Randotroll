DROP DATABASE IF EXISTS MLR1;

CREATE DATABASE IF NOT EXISTS MLR1;
USE MLR1;
# -----------------------------------------------------------------------------
#       TABLE : APPORTEURDESPONSORS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS APPORTEURDESPONSORS
 (
   NOCONTRIBUTEUR INTEGER(2) NOT NULL  
   , PRIMARY KEY (NOCONTRIBUTEUR) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : CONTRIBUTEUR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CONTRIBUTEUR
 (
   NOCONTRIBUTEUR INTEGER(2) NOT NULL AUTO_INCREMENT ,
   NOM VARCHAR(30) NOT NULL  ,
   PRENOM VARCHAR(30) NOT NULL  ,
   EMAIL VARCHAR(50) NULL  ,
   TELPORTABLE CHAR(10) NULL  ,
   TELFIXE CHAR(10) NULL  ,
   ADRESSE VARCHAR(50) NULL  ,
   CODEPOSTAL CHAR(5) NULL  ,
   VILLE VARCHAR(30) NULL  
   , PRIMARY KEY (NOCONTRIBUTEUR) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : ADMINISTRATEUR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ADMINISTRATEUR
 (
   NOCONTRIBUTEUR INTEGER(2) NOT NULL  ,
   MOTDEPASSE VARCHAR(30) NOT NULL  ,
   PROFIL VARCHAR(30) NOT NULL  
   , PRIMARY KEY (NOCONTRIBUTEUR) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : PARTICIPANT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PARTICIPANT
 (
   NOPARTICIPANT INTEGER(2) NOT NULL AUTO_INCREMENT ,
   NOM VARCHAR(30) NULL  ,
   PRENOM VARCHAR(30) NULL  ,
   DATEDENAISSANCE DATE NULL  ,
   SEXE CHAR(1) NULL  
   , PRIMARY KEY (NOPARTICIPANT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : BENEVOLE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS BENEVOLE
 (
   NOCONTRIBUTEUR INTEGER(2) NOT NULL  
   , PRIMARY KEY (NOCONTRIBUTEUR) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : RANDONNEUR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS RANDONNEUR
 (
   NOPARTICIPANT INTEGER(2) NOT NULL  ,
   MAIL VARCHAR(50) NULL  ,
   TELPORTABLE CHAR(10) NULL  
   , PRIMARY KEY (NOPARTICIPANT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : EQUIPE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS EQUIPE
 (
   NOEQUIPE INTEGER(2) NOT NULL AUTO_INCREMENT ,
   NOPARTICIPANT INTEGER(2) NOT NULL  ,
   NOMEQUIPE VARCHAR(30) NOT NULL  
   , PRIMARY KEY (NOEQUIPE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE EQUIPE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_EQUIPE_RESPONSABLE
     ON EQUIPE (NOPARTICIPANT ASC);

# -----------------------------------------------------------------------------
#       TABLE : RESPONSABLE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS RESPONSABLE
 (
   NOPARTICIPANT INTEGER(2) NOT NULL  ,
   MOTDEPASSE VARCHAR(30) NOT NULL  ,
   MAIL VARCHAR(50) NOT NULL  ,
   TELPORTABLE CHAR(10) NOT NULL  
   , PRIMARY KEY (NOPARTICIPANT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : ANNEE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ANNEE
 (
   ANNEE BIGINT(4) NOT NULL  ,
   DATECOURSE DATE NOT NULL  ,
   LIMITEAGE BIGINT(3) NOT NULL  ,
   TARIFINSCRIPTIONADULTE DECIMAL(6,2) NOT NULL  ,
   TARIFINSCRIPTIONENFANT DECIMAL(6,2) NOT NULL  ,
   TARIFREPASADULTE DECIMAL(6,2) NOT NULL  ,
   TARIFREPASENFANT DECIMAL(6,2) NOT NULL  ,
   MAXPARTICIPANTS BIGINT(4) NOT NULL  ,
   MAXPAREQUIPE BIGINT(2) NOT NULL  ,
   DATECLOTUREINSCRIPTION DATE NOT NULL  ,
   MAILORGANISATION VARCHAR(50) NOT NULL  ,
   CHEMINPDFLIVRET AV(80) NULL  ,
   CHEMINIMAGEAFFICHE VARCHAR(80) NULL  ,
   CHEMINIMAGEAFFICHETTE VARCHAR(80) NULL  
   , PRIMARY KEY (ANNEE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : SPONSOR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SPONSOR
 (
   NOSPONSOR INTEGER(2) NOT NULL AUTO_INCREMENT ,
   NOM VARCHAR(30) NOT NULL  ,
   ADRESSE VARCHAR(50) NULL  ,
   CODEPOSTAL CHAR(5) NULL  ,
   VILLE VARCHAR(30) NULL  ,
   TELFIXE CHAR(10) NULL  ,
   TELPORTABLECONTACT CHAR(10) NULL  ,
   MAILCONTACT VARCHAR(50) NULL  ,
   CHEMINIMAGELOGO VARCHAR(80) NULL  
   , PRIMARY KEY (NOSPONSOR) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : COMMISSION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS COMMISSION
 (
   NOCOMMISSION INTEGER(2) NOT NULL AUTO_INCREMENT ,
   LIBELLE VARCHAR(30) NOT NULL  
   , PRIMARY KEY (NOCOMMISSION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : PARCOURS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PARCOURS
 (
   NOPARCOURS INTEGER(2) NOT NULL AUTO_INCREMENT ,
   KILOMETRAGE DECIMAL(5,2) NOT NULL  ,
   NBDEPARTICIPANTSMAXI BIGINT(4) NULL  
   , PRIMARY KEY (NOPARCOURS) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : PARTICIPER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PARTICIPER
 (
   NOCONTRIBUTEUR INTEGER(2) NOT NULL  ,
   ANNEE BIGINT(4) NOT NULL  ,
   NOCOMMISSION INTEGER(2) NOT NULL  
   , PRIMARY KEY (NOCONTRIBUTEUR,ANNEE,NOCOMMISSION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PARTICIPER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PARTICIPER_BENEVOLE
     ON PARTICIPER (NOCONTRIBUTEUR ASC);

CREATE  INDEX I_FK_PARTICIPER_ANNEE
     ON PARTICIPER (ANNEE ASC);

CREATE  INDEX I_FK_PARTICIPER_COMMISSION
     ON PARTICIPER (NOCOMMISSION ASC);

# -----------------------------------------------------------------------------
#       TABLE : SINSCRIRE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SINSCRIRE
 (
   ANNEE BIGINT(4) NOT NULL  ,
   NOEQUIPE INTEGER(2) NOT NULL  ,
   DATEVALIDATION DATE NULL  ,
   MONTANTPAYE DECIMAL(6,2) NULL  ,
   MONTANTREMBOURSE DECIMAL(10,2) NULL  ,
   MODEREGLEMENT VARCHAR(20) NULL  ,
   COMMENTAIRE VARCHAR(128) NULL  
   , PRIMARY KEY (ANNEE,NOEQUIPE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE SINSCRIRE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_SINSCRIRE_ANNEE
     ON SINSCRIRE (ANNEE ASC);

CREATE  INDEX I_FK_SINSCRIRE_EQUIPE
     ON SINSCRIRE (NOEQUIPE ASC);

# -----------------------------------------------------------------------------
#       TABLE : APPORTER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS APPORTER
 (
   NOCONTRIBUTEUR INTEGER(2) NOT NULL  ,
   NOSPONSOR INTEGER(2) NOT NULL  
   , PRIMARY KEY (NOCONTRIBUTEUR,NOSPONSOR) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE APPORTER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_APPORTER_APPORTEURDESPONSORS
     ON APPORTER (NOCONTRIBUTEUR ASC);

CREATE  INDEX I_FK_APPORTER_SPONSOR
     ON APPORTER (NOSPONSOR ASC);

# -----------------------------------------------------------------------------
#       TABLE : CONTRIBUER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CONTRIBUER
 (
   NOSPONSOR INTEGER(2) NOT NULL  ,
   ANNEE BIGINT(4) NOT NULL  ,
   MONTANT DECIMAL(6,2) NULL  
   , PRIMARY KEY (NOSPONSOR,ANNEE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE CONTRIBUER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_CONTRIBUER_SPONSOR
     ON CONTRIBUER (NOSPONSOR ASC);

CREATE  INDEX I_FK_CONTRIBUER_ANNEE
     ON CONTRIBUER (ANNEE ASC);

# -----------------------------------------------------------------------------
#       TABLE : CHOISIR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CHOISIR
 (
   ANNEE BIGINT(4) NOT NULL  ,
   NOEQUIPE INTEGER(2) NOT NULL  ,
   NOPARCOURS INTEGER(2) NOT NULL  ,
   VAGUE CHAR(32) NULL  
   , PRIMARY KEY (ANNEE,NOEQUIPE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE CHOISIR
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_CHOISIR_PARCOURS
     ON CHOISIR (NOPARCOURS ASC);

CREATE  INDEX I_FK_CHOISIR_ANNEE
     ON CHOISIR (ANNEE ASC);

CREATE  INDEX I_FK_CHOISIR_EQUIPE
     ON CHOISIR (NOEQUIPE ASC);

# -----------------------------------------------------------------------------
#       TABLE : MEMBREDE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MEMBREDE
 (
   NOPARTICIPANT INTEGER(2) NOT NULL  ,
   ANNEE BIGINT(4) NOT NULL  ,
   NOEQUIPE INTEGER(2) NOT NULL  ,
   REPASSURPLACE BOOL NULL  
   , PRIMARY KEY (NOPARTICIPANT,ANNEE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE MEMBREDE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_MEMBREDE_PARTICIPANT
     ON MEMBREDE (NOPARTICIPANT ASC);

CREATE  INDEX I_FK_MEMBREDE_EQUIPE
     ON MEMBREDE (NOEQUIPE ASC);

CREATE  INDEX I_FK_MEMBREDE_ANNEE
     ON MEMBREDE (ANNEE ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE APPORTEURDESPONSORS 
  ADD FOREIGN KEY FK_APPORTEURDESPONSORS_CONTRIBUTEUR (NOCONTRIBUTEUR)
      REFERENCES CONTRIBUTEUR (NOCONTRIBUTEUR) ;


ALTER TABLE ADMINISTRATEUR 
  ADD FOREIGN KEY FK_ADMINISTRATEUR_BENEVOLE (NOCONTRIBUTEUR)
      REFERENCES BENEVOLE (NOCONTRIBUTEUR) ;


ALTER TABLE BENEVOLE 
  ADD FOREIGN KEY FK_BENEVOLE_CONTRIBUTEUR (NOCONTRIBUTEUR)
      REFERENCES CONTRIBUTEUR (NOCONTRIBUTEUR) ;


ALTER TABLE RANDONNEUR 
  ADD FOREIGN KEY FK_RANDONNEUR_PARTICIPANT (NOPARTICIPANT)
      REFERENCES PARTICIPANT (NOPARTICIPANT) ;


ALTER TABLE EQUIPE 
  ADD FOREIGN KEY FK_EQUIPE_RESPONSABLE (NOPARTICIPANT)
      REFERENCES RESPONSABLE (NOPARTICIPANT) ;


ALTER TABLE RESPONSABLE 
  ADD FOREIGN KEY FK_RESPONSABLE_PARTICIPANT (NOPARTICIPANT)
      REFERENCES PARTICIPANT (NOPARTICIPANT) ;


ALTER TABLE PARTICIPER 
  ADD FOREIGN KEY FK_PARTICIPER_BENEVOLE (NOCONTRIBUTEUR)
      REFERENCES BENEVOLE (NOCONTRIBUTEUR) ;


ALTER TABLE PARTICIPER 
  ADD FOREIGN KEY FK_PARTICIPER_ANNEE (ANNEE)
      REFERENCES ANNEE (ANNEE) ;


ALTER TABLE PARTICIPER 
  ADD FOREIGN KEY FK_PARTICIPER_COMMISSION (NOCOMMISSION)
      REFERENCES COMMISSION (NOCOMMISSION) ;


ALTER TABLE SINSCRIRE 
  ADD FOREIGN KEY FK_SINSCRIRE_ANNEE (ANNEE)
      REFERENCES ANNEE (ANNEE) ;


ALTER TABLE SINSCRIRE 
  ADD FOREIGN KEY FK_SINSCRIRE_EQUIPE (NOEQUIPE)
      REFERENCES EQUIPE (NOEQUIPE) ;


ALTER TABLE APPORTER 
  ADD FOREIGN KEY FK_APPORTER_APPORTEURDESPONSORS (NOCONTRIBUTEUR)
      REFERENCES APPORTEURDESPONSORS (NOCONTRIBUTEUR) ;


ALTER TABLE APPORTER 
  ADD FOREIGN KEY FK_APPORTER_SPONSOR (NOSPONSOR)
      REFERENCES SPONSOR (NOSPONSOR) ;


ALTER TABLE CONTRIBUER 
  ADD FOREIGN KEY FK_CONTRIBUER_SPONSOR (NOSPONSOR)
      REFERENCES SPONSOR (NOSPONSOR) ;


ALTER TABLE CONTRIBUER 
  ADD FOREIGN KEY FK_CONTRIBUER_ANNEE (ANNEE)
      REFERENCES ANNEE (ANNEE) ;


ALTER TABLE CHOISIR 
  ADD FOREIGN KEY FK_CHOISIR_PARCOURS (NOPARCOURS)
      REFERENCES PARCOURS (NOPARCOURS) ;


ALTER TABLE CHOISIR 
  ADD FOREIGN KEY FK_CHOISIR_ANNEE (ANNEE)
      REFERENCES ANNEE (ANNEE) ;


ALTER TABLE CHOISIR 
  ADD FOREIGN KEY FK_CHOISIR_EQUIPE (NOEQUIPE)
      REFERENCES EQUIPE (NOEQUIPE) ;


ALTER TABLE MEMBREDE 
  ADD FOREIGN KEY FK_MEMBREDE_PARTICIPANT (NOPARTICIPANT)
      REFERENCES PARTICIPANT (NOPARTICIPANT) ;


ALTER TABLE MEMBREDE 
  ADD FOREIGN KEY FK_MEMBREDE_EQUIPE (NOEQUIPE)
      REFERENCES EQUIPE (NOEQUIPE) ;


ALTER TABLE MEMBREDE 
  ADD FOREIGN KEY FK_MEMBREDE_ANNEE (ANNEE)
      REFERENCES ANNEE (ANNEE) ;

