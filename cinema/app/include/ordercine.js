function showButton(a){
    console.log(a);
    //return "<button '>Réserver Séance " + a + "</button>";
    return "<button class='btn-active' onclick='callPHP(" + a + ")'>Réserver</button>";
}

function callPHP(div){
    $.ajax({
        url: 'include/reserver_seance.php',
        type: 'POST',
        data: {movie: idCine, index: div, mode: "cine"},
        success: function(data){
            console.log('Réponse serveur: ' + data);
            if (data == "sucess") {
                alert("Séance Réservée");
            }
            else if (data == "notLogedIn") {
                alert("Veuillez vous connecter pour réserver un film");
            }
            else {
                alert("Réponse serveur inconnue, voir console");
            }
        }
    });
}

const nbSéances = Number(document.getElementById("nbSeances").innerHTML.slice(21, 23)); //nombre de séances disponibles
const idCine = document.getElementsByTagName("span")[0].id; //idCine
console.log("idCine: " + idCine + ", nbSeances: " + nbSéances);

const result = document.querySelector("#result"); //div en bas de page qui contient le bouton "réserver"
const id1 = document.querySelector("#div0");
const id2 = document.querySelector("#div1");
const id3 = document.querySelector("#div2");
const id4 = document.querySelector("#div3");
const id5 = document.querySelector("#div4");
const id6 = document.querySelector("#div5");
const id7 = document.querySelector("#div6");
const id8 = document.querySelector("#div7");
const id9 = document.querySelector("#div8");
const id10 = document.querySelector("#div9");
const id11 = document.querySelector("#div10");
const id12 = document.querySelector("#div11");
const id13 = document.querySelector("#div12");
const id14 = document.querySelector("#div13");
const id15 = document.querySelector("#div14");

id1.addEventListener('click', e => {result.innerHTML = showButton(0);});
id2.addEventListener('click', e => {result.innerHTML = showButton(1);});
id3.addEventListener('click', e => {result.innerHTML = showButton(2);});
id4.addEventListener('click', e => {result.innerHTML = showButton(3);});
id5.addEventListener('click', e => {result.innerHTML = showButton(4);});
id6.addEventListener('click', e => {result.innerHTML = showButton(5);});
id7.addEventListener('click', e => {result.innerHTML = showButton(6);});
id8.addEventListener('click', e => {result.innerHTML = showButton(7);});
id9.addEventListener('click', e => {result.innerHTML = showButton(8);});
id10.addEventListener('click', e => {result.innerHTML = showButton(9);});
id11.addEventListener('click', e => {result.innerHTML = showButton(10);});
id12.addEventListener('click', e => {result.innerHTML = showButton(11);});
id13.addEventListener('click', e => {result.innerHTML = showButton(12);});
id14.addEventListener('click', e => {result.innerHTML = showButton(13);});
id15.addEventListener('click', e => {result.innerHTML = showButton(14);});