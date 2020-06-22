// CATEGORIES
// si l'écart entre la date de naissance et la date courante est plus petit que écart...

let tableCategorie = [
    { cat: "Pré-judo", ecart: 5, passeport: 0 },
    { cat: "Mini Poussin", ecart: 7, passeport: 0 },
    { cat: "Poussin", ecart: 9, passeport: 0 },
    { cat: "Benjamin", ecart: 11, passeport: 0 },
    { cat: "Minime", ecart: 13, passeport: 0 },
    { cat: "Cadet", ecart: 16, passeport: 2 },
    { cat: "Junior", ecart: 19, passeport: 2 },
    { cat: "Sénior", ecart: 39, passeport: 2 },
    { cat: "Vétéran", ecart: 10000, passeport: 2 }
];

// Fonctions
function getCategorie(ec) {
    for (element of tableCategorie) {
        console.log(element.cat + " Ecart=" + ec + " EcartTable=" + element.ecart);
        if (ec < element.ecart) {
            console.log("Damned " + element.cat);
            return element.cat;
        }
    }
    return "Introuvable";
}
// exemple d'usage : 
console.log("test catégorie " + getCategorie(12) + " est Minime")
