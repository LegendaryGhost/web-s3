create table tea;
use tea;

CREATE table tea_user(
    iduser int primary key auto_increment,
    username varchar(50),
    mdp varchar(50),
);


CREATE TABLE tea_the (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(125) NOT NULL,
    occupation DECIMAL(10,2) NOT NULL,
    rendement_mensuel DECIMAL(10,2) NOT NULL
);

CREATE TABLE tea_parcelle (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_the INT NOT NULL,
    nom VARCHAR(125) NOT NULL,
    surface DECIMAL(10,2) NOT NULL,
    CONSTRAINT fk_parcelle_the FOREIGN KEY (id_the) REFERENCES tea_the(id)
);

CREATE TABLE tea_cueilleur (
    id INT PRIMARY KEY AUTOINCREMENT,
    nom VARCHAR(255) NOT NULL,
    genre ENUM('homme','femme') NOT NULL,
    salaire DECIMAL(10, 2) NOT NULL,
    date_naissance DATE NOT
);

CREATE TABLE tea_categorie_depense (
    id INT PRIMARY KEY AUTOINCREMENT,
    nom VARCHAR(255) NOT NULL
);

CREATE TABLE tea_cueillette (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_cueilleur INT NOT NULL,
    id_parcelle INT NOT NULL,
    date_cueillette DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
    poids DECIMAL(10,2) NOT NULL,
    CONSTRAINT fk_cueillette_cueilleur FOREIGN KEY (id_cueilleur) REFERENCES tea_cueilleur(id),
    CONSTRAINT fk_cueillette_parcelle FOREIGN KEY (id_parcelle) REFERENCES tea_parcelle(id)
);

CREATE TABLE tea_depense (
    id INT PRIMARY KEY AUTOINCREMENT,
    id_categorie INT NOT NULL,
    date_depense DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
    montant DECIMAL(10,2) NOT NULL,
    CONSTRAINT fk_depense_categorie FOREIGN KEY (id_categorie) REFERENCES tea_categorie_depense (id)
);
