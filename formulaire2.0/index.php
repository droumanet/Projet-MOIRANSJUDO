<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Test</title>
</head>

<body>
<h2>Adhésion</h2>
<p>Remplir pas à pas les diverses sections</p>

<p>Récupérer les données : afficher le récapitulatif (+stocker ?)<br>
Bouton valider à paufiner : il doit permettre d'accéder au récapitulatif à partir du dernier adhérent <br>
Mettre les champs adaptés pour chaque catégorie<br>
Insertion du logo dans le formulaire<br>
CSS Bootstrap Bulma pour l'apparence (code couleur Moirans Judo & police) de la page d'intro et du formulaire 

    adh : 

Nom, Prénom, sexe, date de naissance.
o    Réinscription ou nouveau judoka
o    Couleur de ceinture de la saison précédente.
o    Certificat médical, pour ce point, se référer au §2.3
o    Le choix du cours, se référer au §2.4
o    Pour les mineurs uniquement, il faut faire apparaitre l’autorisation parentale et faire en sorte que 
l’utilisateur clique sur OUI.
Le texte est : « Je soussigné représentant légal de l’enfant dont le nom est inscrit ci-dessus autorise mon 
enfant à participer aux activités de Moirans Judo pour la saison 2020/2021. En cas d’urgence, j'autorise, 
pour mon enfant, toute intervention médicale qui pourrait s'avérer nécessaire ».
Pour faire simple, ce doit être la même chose que la célèbre « accepter les conditions générales de vente » 
que l’on trouve sur les sites marchands.</p>

<div class="tab">
  <button class="tablinks" onclick="openSection(event, 'Resp')" id="defaultOpen">Responsable Légal</button>
  <div id="ongletsAdh"></div>
  <button class="tablinks" onclick="openSection(event, 'Recap')">Récapitulatif</button>
</div>

<div id="Resp" class="tabcontent">
    <form id="formulaire">
        <fieldset>
            <legend>Responsable Légal</legend>
            <table>
                <tr>
                    <td>
                        Nom du responsable légal :
                    </td>
                    <td>
                        <input type="text" name="nomRespLegal" placeholder="Robert Dupont" maxlength="70" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Adresse :
                    </td>
                    <td>
                        <input type="text" name="adresse" placeholder="Exemple : 6 rue des Champs Elysées"
                            maxlength="256" style="width:300px;" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Code postal :
                    </td>
                    <td>
                        <input type="text" name="cp" placeholder="Exemple : 75000" maxlength="5" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Ville :
                    </td>
                    <td>
                        <input type="text" name="ville" placeholder="PARIS" maxlength="30" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Numéro de téléphone :
                    </td>
                    <td>
                        <input type="tel" name="tel" placeholder="Exemple : 0123456789" maxlength="10" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        E-mail :
                    </td>
                    <td>
                        <input type="email" name="mail" placeholder="email@exemple.fr" maxlength="100" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Combien d'adhérent(s) souhaitez vous inscrire ?
                    </td>
                    <td>
                        <select name="adherents" id="input_adherents" onchange="generateAdh(this)">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <input type="button" onclick="parseForms()" value="bouton mdr"/>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>
<div id="contenuAdh">
</div>
<div id="Recap" class="tabcontent">
    <h3>Récapitulatif</h3>
    <p>SAISIE ...</p>
</div>
</body>

<script> 
        //Collection des adhérents
        let adhList = []
        //fichier à part pour la classe
        class adherent {
            
            constructor(_nom, _prenom, _dn, _certif,_cat,_cours,_kimono,_passeport,_cotisationtotal){
                this.nom=_nom;
                this.prenom=_prenom;
                this.dn=_dn;
                this.certif=_certif;
                this.categorie=_cat;
            }
        }
//===================================================================== affichage des divers onglets =====================================================================
    // Récupérer l'élément avec l'id "defaultOpen"/ la première étape du formulaire : le responsable légal et clique dessus
    document.getElementById("defaultOpen").click();

    function openSection(evt, ongletSelection) {
            // L'id de ce qui doit être affiché doit correspondre à ongletSelection dans les div
            var i, tabcontent, tablinks;  
            // tablinks : les onglets à cliquer pour l'affichage 
            // tabcontent : le contenu de l'affichage après le clic
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none"; 
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(ongletSelection).style.display = "block";
            evt.currentTarget.className += " active";
    }
// =========================================================== génération des sections pour les adhérents ========================================================================
    // Récupère la valeur du select dans la section responsable légal et en fonction créée en HTML les onglets, et les formulaires en nombre adaptés
    // Les id sont récupérables grâce à l'incrémentation ${i+1} dans les boucles for
    function generateAdh(select){
        let div_adh = document.getElementById("ongletsAdh")
        div_adh.innerHTML = ""
        let div_aff = document.getElementById("contenuAdh")
        div_aff.innerHTML = ""
        let value = select.options[select.selectedIndex].value 
        for (let i = 0; i < value; i++) {
            // onglets
            div_adh.innerHTML += `
            <button class="tablinks" onclick="openSection(event, 'Adh${i+1}')">Adhérent ${i+1}</button>
            `
            // formulaires
            div_aff.innerHTML +=`
            <div id="Adh${i+1}" class="tabcontent" style="display : none;">
                <form id="form${i+1}" action="parseForms()"  id="formAdh">
                    <fieldset>
                        <legend>Adhérent ${i+1}</legend>
                        <table>
                            <tr>
                                <td>
                                    L'adhérent est majeur :
                                </td>
                                <td>
                                    Oui <input type="radio" name="majeur${i+1}" id="form_adresse${i+1}" onclick="generateAttest(this, ${i+1})" value="1">
                                </td>
                                <td>
                                    Non <input type="radio" name="majeur${i+1}" id="form_adresse${i+1}" onclick="generateAttest(this, ${i+1})" value="0">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div id="attestMineur${i+1}"></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Certificat médical : 
                                </td>
                                <td>
                                    De moins d'1 an : <input type="radio" name="certif${i+1}" id="form_certif${i+1}" value="Moins1an">
                                </td>
                                <td>
                                    Entre 1 et 2 ans : <input type="radio" name="certif${i+1}" id="form_certif${i+1}" onclick="generateCertif(this, ${i+1})" value="Entre1et2ans">
                                </td>
                                <td>
                                    Entre 2 et 3 ans : <input type="radio" name="certif${i+1}" id="form_certif${i+1}" onclick="generateCertif(this, ${i+1})" value="Entre2et3ans">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Vous devrez amener votre certificat médical au site physique du club, sans quoi votre inscription ne pourra être finalisée.<p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div id="certificat${i+1}"></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Nom :
                                </td>
                                <td>
                                    <input type="text" name="nom${i+1}" id="form_nom${i+1}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Prenom :
                                </td>
                                <td>
                                    <input type="text" name="prenom${i+1}" id="form_prenom${i+1}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Femme :
                                </td>
                                <td>
                                    <input type="radio" name="sexe${i+1}" id="form_adresse${i+1}" value="0">
                                </td>
                                <td>
                                    Homme :
                                </td>
                                <td>
                                    <input type="radio" name="sexe${i+1}" id="form_adresse${i+1}" value="1">
                                </td>
                            <tr>
                                <td>
                                    Date de naissance :
                                </td>
                                <td>
                                    <input type="date" name="dn" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Nouveau Judoka :
                                </td>
                                <td>
                                    <input type="radio" name="reinoujudo${i+1}" id="form_reinoujudo${i+1}" onclick="generateCeinture(this, ${i+1})" value="1">
                                </td>
                                <td>
                                    Réinscription : 
                                </td>
                                <td>
                                    <input type="radio" name="reinoujudo${i+1}" id="form_reinoujudo${i+1}" onclick="generateCeinture(this, ${i+1})" value="0">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div id="ceinturePrec${i+1}"></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Catégorie : 
                                </td>
                                <td>
                                    <select name="categorie${i+1}" id="categorie${i+1}" onchange="generateCours(this, ${i+1})">
                                        <option value="Prejudo">Pré Judo</option>
                                        <option value="MiniPoussin">Mini Poussin</option>
                                        <option value="Poussin">Poussin</option>
                                        <option value="Benjamin">Benjamin</option>
                                        <option value="MinimeCadetCompetition">Minime, Cadet, compétition</option>
                                        <option value="AdulteJudoLoisir">Adulte Judo Loisir</option>
                                        <option value="CompetitionKata">compétition, Kata</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Cours : 
                                </td>
                                <td>
                                    <div id="contenuCours${i+1}"></div>
                                </td>
                            </tr>
                        </table>
                        <input type="button" onclick="openSection(event,'Adh${i+2}')" value="Valider l'Adhérent ${i+1}">
                    </fieldset>
                </form>
            </div>
            `
        }
    }
    function generateCours(select, ic){
        let div_cours = document.getElementById(`contenuCours${ic}`)
        div_cours.innerHTML = ""
        let value = select.options[select.selectedIndex].value 
        if (value == "Prejudo") {
            div_cours.innerHTML=`
            <select name="coursSelect" id="coursSelect">
                <option value="Sam10h30a11h15">Le samedi de 10h30 à 11h15</option>
                <option value="Sam11h15a12h">Le samedi de 11h15 à 12h00 </option>
                <option value="Ven16h30à17h15">Le vendredi de 16h30 à 17h15</option>
            </select>
            `
        }else if (value == "MiniPoussin"){
            div_cours.innerHTML=`
            <select name="coursSelect" id="coursSelect">
                <option value="MarJeu16h45a17h45">Le mardi et jeudi 16h45-17h45</option>
                <option value="Mer17h30a18h30Ven17h15a18h15">Le mercredi 17h30-18h30 et vendredi 17h15-18h15</option>
            </select>
            `
        }else if (value == "Poussin"){
            div_cours.innerHTML=`
            <select name="coursSelect" id="coursSelect">
                <option value="MarJeu17h45a18h45">Le mardi et jeudi 17h45-18h45</option>
                <option value="Mer17h30a18h30Ven17h15a18h15">Le mercredi 17h30-18h30 et vendredi 17h15-18h15</option>
            </select>
            `
        }else if (value == "Benjamin"){
            div_cours.innerHTML=`
            <select name="coursSelect" id="coursSelect">
                <option value="Mer18h30a19h30Ven18h15a19h15">Le mercredi 18h30-19h30 et vendredi 18h15-19h15</option>
            </select>
            `
        }else if (value == "MinimeCadetCompetition"){
            div_cours.innerHTML=`
            <select name="coursSelect" id="coursSelect">
                <option value="MarJeu18h45a20h15">Le mardi et jeudi 18h45-20h15</option>
            </select>
            `
        }else if (value == "AdulteJudoLoisir"){
            div_cours.innerHTML=`
            <select name="coursSelect" id="coursSelect">
                <option value="Ven19h15a19h45">Le vendredi 19h15-19h45 accès tapis libre</option>
                <option value="Ven19h45a21h">Le vendredi 19h45-21h cours</option>
            </select>
            `
        }else {
            div_cours.innerHTML=`
            <select name="coursSelect" id="coursSelect">
                <option value="Mer19h30a21h">Le mercredi 19h30-21h</option>
            </select>
            `
        }
    }
    function generateCeinture(radio, val){
        let div_ceint = document.getElementById(`ceinturePrec${val}`)
        div_ceint.innerHTML = ""
        let value = radio.value 
        if (value == 0){
            div_ceint.innerHTML = `
            <tr>
                <td>
                    Ceinture précédente : 
                </td>
                <td>
                    <select name="ceinturePrecedente" id="ceinturePrecedente">
                        <option value="Blanche">Blanche</option>
                        <option value="BlancheJaune">Blanche/Jaune</option>
                        <option value="Jaune">Jaune</option>
                        <option value="JauneOrange">Jaune/Orange</option>
                        <option value="Orange">Orange</option>
                        <option value="OrangeVerte">Orange/Verte</option>
                        <option value="Verte">Verte</option>
                        <option value="Bleue">Bleue</option>
                        <option value="Marron">Marron</option>
                        <option value="Noire">Noire</option>
                        <option value="RougeBlanche">Rouge/Blanche</option>
                        <option value="Rouge">Rouge</option>
                    </select>
                </td>
            </tr>
            `
        }
    }
    function generateAttest(radio, val){
        let div_attest=document.getElementById(`attestMineur${val}`)
        div_attest.innerHTML = ""
        let value = radio.value 
        if (value == 0){
            div_attest.innerHTML = `
            <tr>
                <td>
                    Je soussigné représentant légal de l’enfant dont le nom est inscrit ci-dessus autorise mon 
                    enfant à participer aux activités de Moirans Judo pour la saison 2020/2021. En cas d’urgence, j'autorise, 
                    pour mon enfant, toute intervention médicale qui pourrait s'avérer nécessaire.<br>
                   J'accepte <input type="checkbox" name="accepte" id="form_accepte">
                </td>
            </tr>
            `
        }
    }
    function generateCertif(radio, val){
        let div_cert = document.getElementById(`certificat${val}`)
        div_cert.innerHTML = ""
        let value = radio.value 
        if (value == "Entre1et2ans" || value == "Entre2et3ans") {
            alert(`test<br>test1`)
            div_cert.innerHTML=`
                J'atteste avoir répondu par la négative à toutes les questions du questionnaire de santé : <input type="checkbox" name="questionnairesanténeg">
            `
        }
    }
// =========================================================================================== stockage des éléments du formulaire =========================================

        function parseForms(){
            //Réinitialisation de la liste 
            let adhList = []
            console.log("test")
            //Récupération de tous les objets <Form> dans une liste
            let forms = document.getElementById("formulaire").children
            console.log(forms)
            for (let i = 0; i < forms.length; i++) {
                //Récupération des balises input dans le form
                let form = forms[i].getElementsByTagName("input");
                // Récupération des données contenues dans les input
                let nom = form[0].value
                //let prenom = form[1].value
                //let adresse = form[2].value
                //let codepostal = form[3].value
                //let ville = form[4].value
                //-
                //Création d'un objet adhérent et ajout dans la liste
                //,prenom,adresse,ville,codepostal
                adhList.push(new adherent(nom))
                console.log("la liste : ")
                console.log( adhList)
            }
            let url = "getData.php";
            let xhr = new XMLHttpRequest();
            xhr.open("POST",url,true)
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.send(JSON.stringify({
                adherents : adhList
            }));
            xhr.send("Oui")
        }
    </script>
</html>