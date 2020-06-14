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
CSS Bootstrap Bulma pour l'apparence (code couleur Moirans Judo & police) de la page d'intro et du formulaire </p>

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
                        Nom : 
                    </td>
                    <td>
                        <input type="text">
                    </td>
                </tr>
                <tr>
                    <td>
                        Adresse e-mail : 
                    </td>
                    <td>
                        <input type="mail">
                    </td>
                </tr>
                <tr>
                    <td>
                        Numéro de téléphone : 
                    </td>
                    <td>
                        <input type="tel">
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
                                    Nom
                                </td>
                                <td>
                                    <input type="text" name="nom${i+1}" id="form_nom${i+1}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Prenom
                                </td>
                                <td>
                                    <input type="text" name="prenom${i+1}" id="form_prenom${i+1}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Adresse
                                </td>
                                <td>
                                    <input type="text" name="adresse${i+1}" id="form_adresse${i+1}">
                                </td>
                            </tr>
                                <td>
                                    Code postal
                                </td>
                                <td>
                                    <input type="tel" name="codepostal${i+1}" id="form_cp${i+1}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Ville
                                </td>
                                <td>
                                    <input type="text" name="ville${i+1}" id="form_ville${i+1}">
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
            //xhr.send("Oui")
        }
    </script>
</html>