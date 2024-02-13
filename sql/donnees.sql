
INSERT INTO tea_user (username, mdp, type_user) VALUES
    ('admin', '1234', 'admin'),
    ('user', '1234', 'user');

INSERT INTO tea_the (nom, occupation, rendement_mensuel, prix_vente) VALUES
('Thé Vert', 1.00, 40.00, 5000.00),
('Thé Noir', 1.50, 25.00, 6000.00),
('Thé Oolong', 1.25, 12.00, 7000.00);

INSERT INTO tea_parcelle (id_the, nom, surface) VALUES
(1, 'Parcelle A', 10),
(2, 'Parcelle B', 15),
(3, 'Parcelle C', 12.5);

INSERT INTO tea_cueilleur (nom, genre, salaire, date_naissance, poids_min, bonus_montant, malus_montant) VALUES
('Alice Dupont', 'femme', 1200.00, '1985-04-12', 50.00, 200.00, 100.00),
('Bob Martin', 'homme', 1300.00, '1980-08-25', 50.00, 250.00, 150.00);

INSERT INTO tea_categorie_depense (nom) VALUES
('Fertilisants'),
('Equipement'),
('Carburants');

INSERT INTO tea_cueillette (id_cueilleur, id_parcelle, date_cueillette, poids) VALUES
(1, 4, '2023-03-15', 60.00),
(2, 5, '2023-03-16', 55.00);

INSERT INTO tea_depense (id_categorie, date_depense, montant) VALUES
(1, '2023-03-10', 300.00),
(2, '2023-03-11', 150.00),
(3, '2023-03-12', 1200.00);

INSERT INTO tea_mois (int_mois, mois) VALUES
(1, 'Janvier'),
(2, 'Février'),
(3, 'Mars'),
(4, 'Avril'),
(5, 'Mai'),
(6, 'Juin'),
(7, 'Juillet'),
(8, 'Août'),
(9, 'Septembre'),
(10, 'Octobre'),
(11, 'Novembre'),
(12, 'Décembre');

-- Insérez ici les mois de régénération si spécifiques,
-- sinon cette table peut rester vide si la logique de régénération est gérée autrement.
INSERT INTO tea_mois_regenererer (int_mois) VALUES
(1),
(5),
(9);





