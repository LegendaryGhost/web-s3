Create or replace view v_infoparcelle as
SELECT
    tea_parcelle.id,
    tea_parcelle.nom as nomParcelle,
    tea_parcelle.id_the,
    tea_parcelle.surface AS surface_hectare,
    (tea_parcelle.surface * 10000) AS surface_m2, 
    dite.nom as nomthe,
    dite.occupation,
    dite.rendement_mensuel,
    FLOOR((tea_parcelle.surface * 10000)/dite.occupation) AS nbpied,
    (FLOOR((tea_parcelle.surface * 10000)/dite.occupation) * dite.rendement_mensuel) as total_kg_mois
FROM 
    tea_parcelle
JOIN 
    tea_the AS dite
ON
    tea_parcelle.id_the = dite.id;

Create or replace view v_poidsparcelle as
SELECT 
    vp.id AS idparcelle,
    vp.nomparcelle,
    vp.surface_m2,
    vp.nomthe,
    vp.nbpied,
    vp.total_kg_mois,
    SUM(tc.poids) AS total_poids_cueilli,
    (vp.total_kg_mois - SUM(tc.poids)) AS reste_a_cueillir,
    tc.date_cueillette,
    MONTH(tc.date_cueillette) AS mois,
    YEAR(tc.date_cueillette) AS annee
FROM 
    v_infoparcelle AS vp
JOIN 
    tea_cueillette AS tc ON vp.id = tc.id_parcelle
GROUP BY 
    vp.id, vp.nomParcelle, vp.surface_m2, vp.nomthe, vp.nbpied, vp.total_kg_mois, MONTH(tc.date_cueillette), YEAR(tc.date_cueillette);

CREATE OR REPLACE VIEW v_tea_resteAcueillir AS
SELECT 
  vpp.idparcelle,
  vpp.nomparcelle,
  vpp.reste_a_cueillir,
  vpp.date_cueillette
FROM 
  v_poidsparcelle vpp
INNER JOIN (
    SELECT 
      idparcelle, 
      MAX(date_cueillette) AS MaxDate
    FROM 
      v_poidsparcelle
    WHERE 
      date_cueillette <= '2024-02-28' -- Date de fin spécifiée ici
    GROUP BY 
      idparcelle
) vm ON vpp.idparcelle = vm.idparcelle AND vpp.date_cueillette = vm.MaxDate;

select sum(reste_a_cueillir) as reste_cueilletteTotal from v_tea_resteAcueillir;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
SELECT
    id_parcelle,
    SUM(poids) AS totalPoidsCueilli
FROM
    tea_cueillette
WHERE
    date_cueillette >= '2023-03-01' AND
    date_cueillette <= '2023-06-30'
GROUP BY
    id_parcelle;


SELECT
    id_parcelle,
    SUM(poids) AS totalPoidsCueilli
FROM
    tea_cueillette
WHERE
    date_cueillette >= '2024-01-01' AND
    date_cueillette <= '2024-06-15'
GROUP BY
    id_parcelle;


CREATE or REPLACE view v_regenerer as
SELECT 
    tea_mois.int_mois,
    tea_mois.mois,
    CASE 
        WHEN tea_mois_regenererer.int_mois IS NULL THEN 0 
        ELSE 1 
    END AS regeneration
FROM 
    tea_mois 
LEFT JOIN 
    tea_mois_regenererer ON tea_mois.int_mois = tea_mois_regenererer.int_mois
ORDER BY 
    tea_mois.int_mois;

CREATE OR REPLACE view v_depenses as
Select 
  td.id_categorie,
  tcd.nom,
  td.date_depense,
  td.montant
  from tea_depense as td
  join tea_categorie_depense as tcd
  on td.id_categorie = tcd.id;


  Create or replace view v_cueillete as
    select 
      tc.id_cueilleur,
      tceur.nom as nomCueilleur,
      tc.id_parcelle,
      tp.nom as nomParcelle,
      tc.date_cueillette,
      tc.poids
    from tea_cueillette as tc
    join tea_cueilleur as tceur
    on tc.id_cueilleur = tceur.id
    join tea_parcelle as tp
    on tc.id_parcelle = tp.id;

