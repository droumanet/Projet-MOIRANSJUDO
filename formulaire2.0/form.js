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

    constructor(_nom, _prenom, _dn, _certif,_cat,_cours,_kimono,_passeport,_cotisationtotal){
        this.nom=_nom;
        this.prenom=_prenom;
        this.dn=_dn;
        this.certif=_certif;
        this.categorie=_cat;
        this.kimono=_kimono;
        this.passeport=_passeport;
        this.cotisationtotal=_cotisationtotal;
    }
}
