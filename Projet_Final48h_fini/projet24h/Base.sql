-- Base postgresSQL

create database events;

create table Users(
    idUsers serial primary key,
    nom VARCHAR(20),
    prenom VARCHAR(20),
    telephone VARCHAR(20),
    genre varchar(20),
    email VARCHAR(30),
    addresse varchar(20),
    mdp VARCHAR(20)
);

create table Proposition(
    idProposition serial primary key,
    idJour integer references Jour(idJour),
    idKaly integer references Kaly(idKaly),
    idActivites integer references Activites(idActivites),
    idUser_profile integer references User_profile(idUser_profile),
    montant float
);

create table Historique_Proposition(
    isHistorique_Propositon serial primary key,
    idUser_profil integer references User_profil(idUser_profil),
    num integer,
    jour varchar,
    nomacticites varchar,
    duree integer,
    Kalytype varchar,
    quantite integer,
    prix float
);

insert into Proposition(idJour,idKaly,idActivites,idUser_profile)
values (1,1,1,1),(2,2,2,2);
insert into Proposition(idJour,idKaly,idActivites,idUser_profile)
values (1,2,2,1),(1,3,4,1),(1,3,2,1);

create table User_profile(
    idUser_profile serial primary key,
    idUsers integer references Users(idUsers),
    age integer,
    poids float,
    taille float
);

insert into User_profile(idUsers,age,poids,taille)
values (1,20,78,1.80);
insert into User_profile(idUsers,age,poids,taille)
values (2,20,78,1.75);
insert into User_profile(idUsers,age,poids,taille)
values (3,20,78,1.60);
insert into User_profile(idUsers,age,poids,taille)
values (4,20,78,1.48);
insert into User_profile(idUsers,age,poids,taille)
values (5,20,78,1.89);


create view getDetail_Proposition As
select Proposition.idProposition as num , Proposition.idUser_profile as userId,
Jour.nom as jour , User_profile.poids as user_Poids ,
Activites.nom as nomActivites,
Activites.duree as duree , Kaly.types as kalyType ,Kaly.nom as kalyNom ,
Kaly.quantite as quantite , Kaly.prix as prix 
from Proposition join Jour on Jour.idJour=Proposition.idProposition join
Activites on Proposition.idActivites=Activites.idActivites join Kaly on
Proposition.idKaly=Kaly.idKaly join User_profile on
Proposition.idUser_profile=User_profile.idUser_profile;


create table Jour(
    idJour serial primary key,
    nom varchar(20)
);
insert into Jour(nom)values 
('J1'),('J2'),('J3'),('J4'),('J5');

insert into Regime(idKaly,idActivites)
values (1,1),(2,2),(3,3),(4,4);

create table Kaly(
    idKaly serial primary key,
    nom varchar(20),
    types varchar(20),
    quantite float,
    prix float
);
insert into Kaly(nom,types,quantite,prix)
values ('katsaka','vegetale',500,2000),
        ('riz','vegetale',200,1000),
        ('viande rouge','animal',500,5000),
        ('viande blanc','animal',600,5500);


create table suggestion_example(
    idsuggestion_example serial primary key,
    num integer,
    jour varchar,
    user_poids float,
    nomactivites varchar ,
    duree float,
    kaly_type varchar,
    kalynom varchar,
    quantite integer,
    prix float
);

insert into suggestion_example(num,jour,user_poids,nomactivites,duree,kaly_type,kalynom,quantite,prix)values
(1,'J1',55,'basket',30,'animal','poisson',500,20000),
(2,'J2',45,'foot',30,'vegetale','citrouille',100,1000),
(3,'J3',65,'volee',30,'vegetale','legume',500,15000),
(4,'J4',35,'natation',30,'animal','poisson',500,14500),
(5,'J5',78,'trotine',30,'animal','poulet',250,90000),
(6,'J6',45,'andurance',30,'vegetale','legume_sauter',500,50000),
(7,'J7',66,'basket',30,'vegetale','fibre',500,30000),
(8,'J8',80,'basket',30,'fruit','banane',50,40000);

    






insert into Code_credit(nombre,montant)values
('000123456789',1000),('987654321000',2000),('11234589456',5000);

create table Activites(
    idActivites serial primary key,
    nom varchar,
    types varchar(20),
    duree integer
);

insert into Activites(types,nom,duree)
values ('individuel','trotine',15),
        ('collectif','foot soccer',10),
        ('collectif','basket',10),
        ('individuelle','natation',20);

create table Confirmer (
    idConfirmer serial primary key,
    idAdmin_User integer references Admin()
    dateconfirmer DATE
);


-- Ajouter Proposition 
SELECT R.idRegime, K.nom AS kaly_nom, K.types AS kaly_type, K.quantite, K.prix AS kaly_prix,
       A.nom AS activite_nom, A.types AS activite_type, A.duree,
       U.age, U.poids AS profil_poids,
       P.montant AS proposition_montant,
       K.prix * K.quantite AS prix_total_kaly
FROM Regime R
JOIN Kaly K ON R.idKaly = K.idKaly
JOIN Activites A ON R.idActivites = A.idActivites
JOIN User_profil U ON U.idUsers = R.idUsers
JOIN Proposition P ON P.idRegime = R.idRegime;




-- Ajouter Regime 
CREATE VIEW AjouterRegimeView AS
SELECT K.idKaly, K.nom AS kaly_nom, K.types AS kaly_type, K.quantite, K.prix,
        A.nom AS activite_nom, A.types AS activite_type, A.duree
FROM Regime R
JOIN Kaly K ON R.idKaly = K.idKaly
JOIN Activites A ON R.idActivites = A.idActivites;

