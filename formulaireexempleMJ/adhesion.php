<?php

// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'Obituary', '33445148');
}
catch(Exception $e)
{
    die('Erreur PDO : '.$e->getMessage());
}

// Insertion du message à l'aide d'une requête préparée
$requete = $bdd->prepare('INSERT INTO adhesion (nomRespLegal, adresse, cp, ville, tel, mail, nom, prenom, dn, certif, 
certificat, licence, ouiLicence, categorie, cours, essai, locKimono, photoPasseport,
chequePreJudo, photo, cotisations, reducPass, moisPaiement, montant, nomPayeur, paiementChq, 
paiementEsp, total, remarques, ASQ1, ASQ2) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
$requete->execute(
array(
    $_POST['nomRespLegal'], 
    $_POST['adresse'], 
    $_POST['cp'], 
    $_POST['ville'], 
    $_POST['tel'], 
    $_POST['mail'], 
    $_POST['nomAdh'],
    $_POST['prenomAdh'],
    $_POST['dn'], 
    $_POST['cert'], 
    $_POST['certificat'], 
    $_POST['licence'], 
    $_POST['ouiLicence'], 
    $_POST['categorie'], 
    $_POST['cours'],
    $_POST['essai'], 
    $_POST['locKimono'], 
    $_POST['photoPasseport'], 
    $_POST['chequePreJudo'], 
    $_POST['photo'], 
    $_POST['cotisations'], 
    $_POST['reducPass'],
    $_POST['montantDu'], 
    $_POST['pass'], 
    $_POST['numeroPass'], 
    $_POST['moisPaiement'], 
    $_POST['montant'], 
    $_POST['nomPayeur'], 
    $_POST['paiementChq'], 
    $_POST['paiementEsp'], 
    $_POST['total'], 
    $_POST['remarques'], 
    $_POST['ASQ1'], 
    $_POST['ASQ2']
));

?>
