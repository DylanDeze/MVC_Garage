drop database if exists garage;
create database garage;
use garage;

create table client (
    idclient int(3) not null auto_increment,
    nom varchar (50),
    prenom varchar(50),
    adresse varchar(50),
    email varchar(50),
    mdp varchar(50),
    primary key (idclient)
);

create table technicien (
    idtechnicien int(3) not null auto_increment,
    nom varchar (50),
    prenom varchar(50),
    qualification varchar(50),
    email varchar(50),
    mdp varchar(50),
    primary key (idtechnicien)
);

create table vehicule (
    idvehicule int(3) not null auto_increment,
    modele varchar(50),
    marque varchar(50),
    plaque varchar(9),
    nbkm int(10),
    couleur varchar(50),  
    idclient int(3) not null,
    primary key (idvehicule),
    foreign key (idclient) references client(idclient) ON DELETE CASCADE ON UPDATE CASCADE 
) ENGINE=INNODB;

create table intervention (
    idintervention int(3) not null auto_increment,
    libelle varchar(50),
    dateintervention date,
    lieu varchar(50), 
    prix float, 
    idtechnicien int(3) not null,
    idvehicule int(3) not null,
    primary key (idintervention),
    foreign key (idtechnicien) references technicien(idtechnicien) ON DELETE CASCADE ON UPDATE CASCADE,
    foreign key (idvehicule) references vehicule(idvehicule) ON DELETE CASCADE ON UPDATE CASCADE 
) ENGINE=INNODB;

create table user (
    iduser int(3) not null auto_increment,
    nom varchar(50),
    prenom varchar(50),
    email varchar(50),
    mdp varchar(50),
    role enum("admin", "user"),
    primary key (iduser)
);

insert into user values 
(null, "Ryad", "Thamila", "a@gmail.com", "123", "admin"),
(null, "Sharif", "Dylan", "b@gmail.com", "456", "user");