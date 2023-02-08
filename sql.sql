
create table Membres(
    idMembre INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    email VARCHAR(30) NOT NULL,
    motDePasse Varchar(20) NOT NULL,
    isAdmin int DEFAULT 0
);

create table Categories(
    idCategorie int primary key AUTO_INCREMENT,
    libele Varchar(60) not null
);

create table Objets(
    idObjet INT primary key AUTO_INCREMENT ,
    idCategorie int ,
    DateHeurePublication DATETIME NOT NULL,
    titre Varchar(50) not null, 
    descri TEXT NOT NULL,
    photo Varchar(200) ,
    prix float,
    FOREIGN KEY(idCategorie) REFERENCES Categories(idCategorie)
);

create table Proprio(
    idMembre int not null,
    idObjet int not null,
    dateAcquis DATETIME NOT NULL,
    FOREIGN KEY(idMembre) REFERENCES Membres(idMembre),
    FOREIGN KEY(idObjet) REFERENCES Objets(idObjet)
);

create table Images(
    idObjet int not null,
    photo Varchar(250) not null,
    FOREIGN KEY(idObjet) REFERENCES Objets(idObjet)
);

create table PrixObjet(
    idObjet int not null,
    prix float ,
    FOREIGN KEY(idObjet) REFERENCES Objets(idObjet)
);

create table Inventaire(
    idMembre int not null,
    idObjet int not null,
    quantite int default 0,
    FOREIGN KEY(idMembre) REFERENCES Membres(idMembre),
    FOREIGN KEY(idObjet) REFERENCES Objets(idObjet)
);

create table Echanges(
    idEchange int primary key AUTO_INCREMENT,
    idMembre1 int not null,
    idMembre2 int not null,
    dateDemande DATETIME default NOW(),
    dateAcceptation DATETIME default null,
    etat int default 1,
    FOREIGN KEY(idMembre1) REFERENCES Membres(idMembre),
    FOREIGN KEY(idMembre2) REFERENCES Membres(idMembre)
);


create table DetailEchange(
    idEchange int not null,
    idObjet1 int not null,
    idObjet2 int not null,
    FOREIGN KEY(idEchange) REFERENCES echanges(idEchange),
    FOREIGN KEY(idObjet1) REFERENCES Objets(idObjet),
    FOREIGN KEY(idObjet2) REFERENCES Objets(idObjet)
);

insert into Membres values(null,'faly@gmail.com',"faly",1);
insert into Membres values(null,'ken@gmail.com',"ken",1);
insert into Membres values(null,'ravaka@gmail.com',"ravaka",0);
insert into Membres values(null,'tovo@gmail.com',"tovo",0);
insert into Membres values(null,'aina@gmail.com',"aina",0);

insert into Categories values (null,'vetements');
insert into Categories values (null,'informatique');
insert into Categories values (null,'jouets');
insert into Categories values (null,'chaussures');


insert into Objets values (null,1,NOW(),'Tshirt','100% coton','f4.jpg',5000);
insert into Objets values (null,1,NOW(),'pull','100% coton','f8.jpg',15000);
insert into Objets values (null,2,NOW(),'souris','gamer',null,8000);
insert into Objets values (null,3,NOW(),'ribiks cube','gan',null,50000);
insert into Objets values (null,2,NOW(),'smartphone','','Image-10.jpg',1030000);
insert into Objets values (null,2,NOW(),'casque','gamer','Image-25.jpg',30000);
insert into Objets values (null,4,NOW(),'nikeairforce1','nike','nikeairforce1.jpg',90000);
insert into Objets values (null,4,NOW(),'nike phamtom GT2 elite','sport','nikephantomgt2elitesg-proac.jpg',110000);

insert into Proprio values (1,1,now());
insert into Proprio values (2,2,now());
insert into Proprio values (3,3,now());
insert into Proprio values (4,4,now());
insert into Proprio values (5,5,now());
insert into Proprio values (6,6,now());
insert into Proprio values (7,7,now());
insert into Proprio values (8,8,now());
insert into Proprio values (9,9,now());


INSERT INTO Echanges VALUES( null , 1 , 2 , NOW() , null , 1 );
INSERT INTO Echanges VALUES( null , 2 , 3 , NOW() , null , 1 );
INSERT INTO Echanges VALUES( null , 3 , 4 , NOW() , null , 1 );
INSERT INTO Echanges VALUES( null , 4 , 5 , NOW() , null , 1 );
INSERT INTO Echanges VALUES( null , 5 , 1 , NOW() , null , 1 );

insert into DetailEchange values(1,1,2);
insert into DetailEchange values(2,2,3);
insert into DetailEchange values(3,3,4);
insert into DetailEchange values(4,4,5);
insert into DetailEchange values(5,5,1);

