console.log("Bonjour les B2")

let liste_valeurs = ['7','8','9','10','V','D','R','A'];
let couleurs = ['trèfle', 'coeur', 'carré', 'pic'];

let jeu_de_cartes = [];

for(let valeur of liste_valeurs){
    for (let couleur of couleurs){
    jeu_de_cartes.push(valeur + ' ' + couleur) 
    }
}
console.log(jeu_de_cartes);