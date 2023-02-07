create database takalo;

use takalo;
-- isAdmin = 1 admin 
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
    FOREIGN KEY(idCategorie) REFERENCES Categories(idCategorie)
);

alter table Objets add photo Varchar(200);

create table proprio(
    idMembre int not null,
    idObjet int not null,
    dateAcquis DATETIME NOT NULL,
    FOREIGN KEY(idMembre) REFERENCES Membres(idMembre),
    FOREIGN KEY(idObjet) REFERENCES Objets(idObjet)
);


create table images(
    idObjet int not null,
    photo Varchar(250) not null,
    FOREIGN KEY(idObjet) REFERENCES Objets(idObjet)
);

-- prix = estimationPrix
create table prixObjet(
    idMembre  int not null,
    idObjet int not null,
    prix float ,
    FOREIGN KEY(idMembre) REFERENCES Membres(idMembre),
    FOREIGN KEY(idObjet) REFERENCES Objets(idObjet)
);

-- menbre1 managataka menbre2 tompony
-- objet1   any membre1 objet2 membre2

create table echanges(
    idEchange int primary key ,
    idMembre1 int not null,
    idMembre2 int not null,
    idObjet1 int not null,
    idObjet2 int not null,
    quantity1 int DEFAULT 1 ,
    quantity2 int DEFAULT 1,
    dateAcceptation DATETIME default null,
    etat int ,
    FOREIGN KEY(idMembre1) REFERENCES Membres(idMembre),
    FOREIGN KEY(idMembre2) REFERENCES Membres(idMembre),
    FOREIGN KEY(idObjet1) REFERENCES Objets(idObjet),
    FOREIGN KEY(idObjet2) REFERENCES Objets(idObjet)
);


-- etat 
    1 : en attente acceptation
    10 : annuler par membre 2
    11 : annuler par membre 1
    20 : accpeter par membre 2


--DATA
insert into membres values(null,'faly@gmail.com',"faly",1);
insert into membres values(null,'ken@gmail.com',"ken",1);
insert into membres values(null,'ravaka@gmail.com',"ravaka",0);
insert into membres values(null,'tovo@gmail.com',"tovo",0);
insert into membres values(null,'aina@gmail.com',"aina",0);

insert into Categories values (null,'vetements');
insert into Categories values (null,'informatique');
insert into Categories values (null,'jouets');
insert into Categories values (null,'chaussures');


insert into objets values (null,1,NOW(),'Tshirt','100% coton','f4.jpg');
insert into objets values (null,1,NOW(),'pull','100% coton','f8.jpg');
insert into objets values (null,2,NOW(),'souris','gamer',null);
insert into objets values (null,3,NOW(),'ribiks cube','gan',null);

insert into objets values (null,2,NOW(),'smartphone','','Image-10.jpg');
insert into objets values (null,2,NOW(),'casque','gamer','Image-25.jpg');
insert into objets values (null,4,NOW(),'nikeairforce1','nike','nikeairforce1.jpg');


update objets set photo = 'f4.jpg' where idObjet = 1;
update objets set photo = 'f8.jpg' where idObjet = 2;
update objets set photo = '' where idObjet = 3;
update objets set photo = '' where idObjet = 4;

