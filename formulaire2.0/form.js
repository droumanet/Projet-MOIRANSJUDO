class resp{
    constructor(_nom, _adresse, _codePostal, _ville, _tel, _mail, _nbadh){
        this.nom=_nom;
        this.adresse=_adresse;
        this.codePostal=_codePostal;
        this.ville=_ville;
        this.tel=_tel;
        this.mail=_mail;
        this.nbadh=_nbadh;
    }
}

class adherent {

    constructor(_majeur, _certif, _nom, _prenom, _sexe, _dn, _etatJudo, _cat, _cours){
        this.majeur = _majeur;
        this.certif = _certif;
        this.nom = _nom;
        this.prenom = _prenom;
        this.sexe = _sexe;
        this.dn= _dn;
        this.etatJudo = _etatJudo;
        this.cat = _cat;
        this.cours = _cours;
    }
}
