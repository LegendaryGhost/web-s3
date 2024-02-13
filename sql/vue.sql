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

