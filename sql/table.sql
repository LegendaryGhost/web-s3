create database tea;
use tea;

CREATE table tea_user(
    iduser int primary key auto_increment,
    username varchar(50),
    mdp varchar(50),
    type_user ENUM('admin', 'user') NOT NULL DEFAULT 'admin'
);
alter table tea_user 
add column type_user ENUM('admin', 'user') NOT NULL DEFAULT 'admin';

insert into tea_user (username,mdp) values ('admin','1234');

CREATE TABLE tea_the (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(125) NOT NULL,
    occupation DECIMAL(10,2) NOT NULL,
    rendement_mensuel DECIMAL(10,2) NOT NULL
);
-- partie 2
alter table tea_the
add COLUMN prix_vente DECIMAL(10,2) NOT NULL;

CREATE TABLE tea_parcelle (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_the INT NOT NULL,
    nom VARCHAR(125) NOT NULL,
    surface DECIMAL(10,2) NOT NULL,
    CONSTRAINT fk_parcelle_the FOREIGN KEY (id_the) REFERENCES tea_the(id)
);

CREATE TABLE tea_cueilleur (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    genre ENUM('homme', 'femme') NOT NULL,
    salaire DECIMAL(10, 2) NOT NULL DEFAULT 0,
    date_naissance DATE NOT NULL
);
-- partie 2
alter table tea_cueilleur
add COLUMN poids_min DECIMAL(10,2) not null;

alter table tea_cueilleur
add COLUMN bonus_montant DECIMAL(10,2) not null;

alter table tea_cueilleur
add COLUMN malus_montant DECIMAL(10,2) not null;

CREATE TABLE tea_categorie_depense (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL
);

CREATE TABLE tea_cueillette (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_cueilleur INT NOT NULL,
    id_parcelle INT NOT NULL,
    date_cueillette DATE NOT NULL,
    poids DECIMAL(10,2) NOT NULL,
    CONSTRAINT fk_cueillette_cueilleur FOREIGN KEY (id_cueilleur) REFERENCES tea_cueilleur(id),
    CONSTRAINT fk_cueillette_parcelle FOREIGN KEY (id_parcelle) REFERENCES tea_parcelle(id)
);

CREATE TABLE tea_depense (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_categorie INT NOT NULL,
    date_depense DATE NOT NULL,
    montant DECIMAL(10,2) NOT NULL,
    CONSTRAINT fk_depense_categorie FOREIGN KEY (id_categorie) REFERENCES tea_categorie_depense (id)
);

-- partie 2, Nouveaux tables


CREATE TABLE tea_mois (
    int_mois INT PRIMARY KEY, -- 1 pour Janvier, 2 pour Février, etc.
    mois varchar(30)
);

CREATE TABLE tea_mois_regenererer (
    int_mois INT, -- 1 pour Janvier, 2 pour Février, etc.
    CONSTRAINT fk_mois FOREIGN KEY (int_mois) REFERENCES tea_mois (int_mois)
);

select sum



