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