

var message = {
    id : 545,
    slug : 'telecel-faso-servicefoot',
    content : 'ceci est le contenu du message',
    dtcreated : '2021 07 15',
    
};

// function afficher(message){
//     return message.content;
// }

//console.log(message);

// console.log(message.content);


// function maFonction(monObjet) {
//     monObjet.fabricant="toyota";
// }

// var mavoiture = {
//     fabricant:"honda",
//     modele:"perche",
//     annee:"1998"
// };
// var x, y;

// x = mavoiture.annee; 
// maFonction (mavoiture);
// y= mavoiture.fabricant;
// console.log(y + " de " +x);



// var carre = function (nbr) {
//     return nbr*nbr;
// }
// var x = carre(10);
// console.log(x);

    // function map(res, aff){
    //     var result = [ "je continue"];
    //    for(var i = 0; i != res.length; i++)
    //    {
    //     result[i] = res(aff[i]);
    //     return result;
    //    }
    // }
    // map(result);
    // console.log(map);







    // nb = 5;
    // function maFonction (){
    //     var x = nb *8;
    // }

    // function next(x){
    //     console.log(x);

    // }
    // next();

    var n= 10;

    // console.log(Number.isInteger(n));

    // function isInt(n){
    //    var ints =  [10,0,1,2,3,4,5,6,7,8,9];
    //    if(ints.indexOf(n) === -1){
    //        return false;
    //    }else{
    //        return ints.indexOf(n);
    //    }
    // }


    // function indexOf(quelquechose){
    //     if(typeof quelquechose == 'string'){
    //         quelquechose.split('').map(function(elemnt,int,arr){

    //         })
    //     }
    // }
    // console.log(isInt(n));

    // var nombreAleatoir = function (){
    //     var nbrAlea = Math.floor(Math.random() * 100) +1;
    //     console.log(nbrAlea);
    // };
    // nombreAleatoir();

    // var monScore = 0;
    // function calculerScore(point){
    //     monScore += point;
    //     console.log(monScore);
    // }
    // calculerScore(1);
    // calculerScore(5);
    // calculerScore(100);



    // function calculSuperficieRectangle (longueur, largeur, unite){
    //     var result = longueur*largeur;
    //     unite = "m"
    //     console.log(result + " " + unite);
    // }
    // calculSuperficieRectangle(7, 9);

    // function calculerSomme(a, b){
    //     var somme = 0;
    //     for(var i = 0; i< arguments.length; i++){
    //         somme += arguments[i];
    //     }
    //     console.log(somme);
    // }
    // calculerSomme(2, 5, 6, 10000);



    //test de transfert d'argent
//  var solde = 50000;
//    function PayPal(sender, receiver, amont){
//        this.solde = 50000;
//        this.sender = sender;
//        this.receiver = receiver;
//        this.amont = amont;
//        this.success = function (){
//             solde = solde - this.amont;
//            console.log(`
//            Transfer successfull!
//            You have sent ${this.amont} XOF to ${this.receiver}
         
//            `);
//        };
//        this.failure = function (){
//         console.log(`
//         Transfer failed!
//         Dear ${this.sender} You do not have enough 
//         money for this transaction.
//          Please try later`);
//     }
//     this.send = function (){
//    var nbrAlea = Math.floor(Math.random() * 100) +1;
//         if(nbrAlea % 2 ===0){
//             this.success();
//         }else{
//             this.failure();
//         }
//     }
//    }
//    var transaction = new PayPal('Louis','Alain', 500);
//    var transaction1 = new PayPal('Louis','Chris', 87847);
//    var transaction2 = new PayPal('Louis','Anna', 100);
//    var transaction3 = new PayPal('Louis','Josue', 8866);
//    var transaction4 = new PayPal('Louis','Fatim', 6000);
//    PayPal.prototype.newSolde = function(){
//     console.log(`
//         Your new solde is : ${solde};
//     `);
//    }
// //    transaction.send();
// //    transaction1.send();
// //    transaction2.send();
// //    transaction3.send();
// //    transaction4.send();
// //    transaction.newSolde();
//    console.log(transaction1);
//    console.log(transaction2);
//    console.log(transaction3);
//    console.log(transaction4);

//fin test


// function calculerSomme(val1, val2){
//     var somme = val1 + val2;
//     return somme;
// }
// var result1 = calculerSomme(1, 2);
// var result2 = calculerSomme(7, result1);
// console.log(result1);
// console.log(result2);

// const axios = require('axios');

// axios.get('http://webcode.me').then(resp => {

//     console.log(resp.data);
// });

// const axios = require('axios');

// async function makeGetRequest() {

//   let res = await axios.get('http://webcode.me');

//   let data = res.data;
//   console.log(data);
// }

// makeGetRequest();



// const axios = require('axios');

// async function makeHeadRequest() {

//   let res = await axios.head('http://webcode.me');

//   console.log(`Status: ${res.status}`)
//   console.log(`Server: ${res.headers.server}`)
//   console.log(`Date: ${res.headers.date}`)
// }

// makeHeadRequest();

// const axios = require('axios');

// async function makeRequest() {
//     const config = {
//         method: 'head',
//         url: 'http://webcode.me'
//     }
//     let rest = await axios(config)
//     console.log(rest.status);
// }

// makeRequest();

// const axios = require('axios');

// async function makeRequest() {

//     const config = {
//         method: 'get',
//         url: 'http://webcode.me',
//         headers: { 'User-Agent': 'Axios - console app' }
//     }

//     let res = await axios(config)

//     console.log(res.request._header);
// }

// makeRequest();


// function axiosGet(url, callback){
//     var response = { status : 'Success', message : 'Request  successfull', url : url};

//     callback(response);
// }


// axiosGet('http://google.com/',function(res){
//     if (res)
//         console.log(res);
//     else
//     console.log(err);
// });

// const promise1 = new Promise((resolve, reject) => {
//     setTimeout(() => {
//       resolve('foo');
//     }, 300);
//   });
//   promise1.then((value) => {
//     console.log(value);
//   });

// var x = 10;
// function x(){
//   var x=5;
//   return x;
// }
// function z(x){
//   x = 5;
//   q = 5;
//   console.log(x+q);
// }
// z();

// function moyenne (mesNotes, suivant){
//   var resultat = 0;
//   for(i=0; i< mesNotes.length; i++){
//     resultat += mesNotes[i];
//   }
//   suivant(resultat/mesNotes.length);
// }
// var mesNotes = [12,14,16]; 
// moyenne(mesNotes, function (resultat){
//   console.log(resultat);
// })

// function balise_HTML(balise){function compte_a_rebours(nombre){
//  for (i = nombre; i > 0 ; i--){
//    console.log(i);
//  }
//  console.log("terminé");
// }
// compte_a_rebours(10000);
//     console.log("<"+ balise + ">" + text + "</" + balise +">");
//   }
//   return emballer_text ;
// }
// var afficher_H1 = balise_HTML("h1");
// afficher_H1('ceci est mon premier teste');
// afficher_H1('ceci est mon deuxieme teste');
// var afficher_paragraphe = balise_HTML("p");
// afficher_paragraphe("ceci est mon premier paragraphe");
// afficher_paragraphe("ceci est mon deuxieme paragraphe");
// console.log(afficher_H1) ;
// console.log(afficher_paragraphe) ;

// function compte_a_rebours(nombre){
//  for (i = nombre; i > 0 ; i--){
//    console.log(i);
//  }
//  console.log("terminé");
// }
// compte_a_rebours(10000);

// le modele iife
// (function iife(gobal, $){
//   var i = 0;
//   while(i>0){
//     console.log(i);
//   }
//   var somme = function calculerSomme(val1, val2){
//   return val1 + val2;
//   }
// }) (window, jQuery);


// var personne = {
//   nom: 'Alain',
//   prenom: 'Li',
//   age: 8,
//   administrateur: false
// };
// personne.nom;
// personne.age = 77;
// personne.ville = "Ouaga";
// delete personne.prenom;
// var personne2 = personne;
// personne2.nom = "Guigma";
// personne2.prenom = "Alain";
// console.log(personne);

// function Personne(nom, prenom, age, ville){
//   this.nom = nom;
//   this.prenom = prenom;
//   this.age = age;
//   this.ville = ville;
//   this.afficher = function(){
//     console.log(this);
//   }
// }
// var personne = new Personne('Guigma', 'Alain', 15, 'ville');
// console.log(personne);
//  var today = new Date ();

// var personne = {
//   nom: 'Alain',
//   prenom: 'Li',
//   age: 8,
//   administrateur: false
// };

// for (var perso in personne){
//   console.log(perso, personne[perso]);
// }

// var jour = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"];
// console.log(jour[4]);
// var tableau = [12, 45, "Louis", "Alain", ["milieu", "tableau", ["a"], 50, 47], true, false];
// tableau [7] = "AFG";
// tableau[tableau.length] = "math";
// console.log(tableau);

// var etudiants = ["Isma", "Aimé", "Davy", "Max", "Amara", "Alain"];
// etudiants[2] = "Vicki";
// var etudiants_mise_a_jour = etudiants;
// etudiants_mise_a_jour[5] = "Maxim";
// console.log(etudiants);
// console.log(etudiants_mise_a_jour);



// var mesClients = ["Alain", "tali", "Marie", "Maria"];
// var test = mesClients.join(", ");
// var test1 =  test.split(", ");
// mesClients.push("sara");
// mesClients.pop();
// mesClients.splice(1, 1);
// mesClients.sort();
// mesClients.reverse();
// console.log(mesClients);
//  function insensible_a_la_casse(a, b){
//    if (a.toUpperCase() < b.toUpperCase()) return -1;
//    if (a.toUpperCase() > b.toUpperCase()) return 1;
//    return 0;
//  }
//  console.log(mesClients.sort(insensible_a_la_casse));
//  console.log(test);
//  console.log(test1);
//  console.log(mesClients.includes('Mae'));

// var mesClients = ["Alain", "tali", "Marie", "Maria"];
// for (var i = 0; i<mesClients.length; i++){
//   console.log(mesClients[i]);
// }
// for (var clients in mesClients){
//   console.log( clients + " est "  + mesClients[clients]);
// mesClients.forEach(function(nom){
//   console.log(" Bonjour " + nom + "!");
// });

// var maintenant = new Date (10, 11, 2003);
// var maintenant1 = new Date (10, 11, 2003);
// console.log(maintenant.getTime() == maintenant1.getTime());

// var maChaine = "Bonjour tout le monde";
// var monRegExp = new RegExp("On", "gi");
// var monRegExp = /on/g;
// console.log(monRegExp.exec(maChaine));
// var resultat = monRegExp.exec(maChaine);
// while(resultat){
//   console.log(resultat.input);
//   resultat = monRegExp.exec(maChaine);
// }

// var notesEtudiants = [
//   [20, 19, 18, 17],
//   [17, 15, 20, 20],
//   [20, 20, 20, 19]
// ];
// // console.log(notesEtudiants[0][2]);
// console.log(notesEtudiants[1]);
// console.log(notesEtudiants[2][0]);
// var formation = [
//   ["Laravel", "Alain"],
//   ["total.js", "Louis"],
//   ["Simplon", "Dominic"],
//   ["Messe", "Prêtre"]
// ];
//  for (var i = 0; i < formation.length; i++){
//    console.log(formation[i][0] + " par " + formation[i][1]);
//  }

// le dom
{/* <p id="anchor">Mon contenu</p>
const myAnchor = document.getAnimations("anchor");
console.log('myAnchor');

<div>
  <div class="content">Contenu1</div>
  <div class="content">Contenu2</div>
  <div class="content">Contenu3</div>
</div>

const contents = document.getElementsByClassName("content");
const firstContent = contents[0];


<div>
  <article>Contenu1</article>
  <article>Contenu2</article>
  <article>Contenu3</article>
</div>

const articles = document.getElementsByName('article');
const thirdArticle = articles[2];

<div id="myId">
    <p>
        <span><a href="#">Lien 1</a></span>
        <a href="#">Lien 2</a>
        <span><a href="#">Lien 3</a></span>
    </p>
    <p class="article">
        <span><a href="#">Lien 4</a></span>
        <span><a href="#">Lien 5</a></span>
        <a href="#">Lien 6</a>
    </p>
    <p>
        <a href="#">Lien 7</a>
        <span><a href="#">Lien 8</a></span>
        <span><a href="#">Lien 9</a></span>
    </p>
</div>
const elt = document.querySelector("#myId p.article > a");

<div id="parent">
    <div id="previous">Précédent</div>
    <div id="main">
        <p>Paragraphe 1</p>
        <p>Paragraphe 2</p>
    </div>
    <div id="next">Suivant</div>
</div>
const elts = document.getElementById('main'); */}

