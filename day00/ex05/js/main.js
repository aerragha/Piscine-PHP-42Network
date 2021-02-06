avancer = document.getElementById("Avancer");
imgs = ['cluster.jpg', 'image1.jpg', 'image2.jpg', 'image3.jpg', 'image4.jpg', 'image5.jpg'];
mainImg = document.getElementById("cluster");
parler = document.getElementById("parler");


var i = 0;
/// affich chating
parler.addEventListener("click", e => document.getElementById("obj").classList.toggle('shown'));


///// images part

avancer.addEventListener("click", function (){
    i = i + 1 < 6 ? i + 1 : 0;
    mainImg.setAttribute('src', 'resources/' + imgs[i]);
});




/////////////// hand part
hand = document.getElementById("hand");

hand.addEventListener('click', function(){
    play_audio();
})
function play_audio()
{
    myAudio = new Audio('resources/sabon.aac'); 
    myAudio.addEventListener('ended', function() {
    this.currentTime = 0;
    }, false);
    myAudio.play();
    //window.open('https://almraah.net/t380765.html', '_blank');
}

////////////////// loop part

searsh = document.getElementById("search");
clus = document.getElementById("cluster");
searsh.onmouseover = function(){
    mainImg.style.transform = "scale(1.3)";
    mainImg.style.marginTop = "50px";
    mainImg.style.borderRadius = "50px";
    mainImg.style.border = "5px solid red";
};
searsh.onmouseout = function(){
    mainImg.style.transform = "scale(1)";
    mainImg.style.marginTop = "14px";
    mainImg.style.borderRadius = "0px";
    mainImg.style.border = "0";
};

////////////// chating part

window.addEventListener('load', function(){
    document.getElementById("form").addEventListener("submit", chating)
})
var x = 0;
function chating(event)
{
    event.preventDefault();
    var qst = document.querySelector("#form input[type='text']").value;
    var answr = document.getElementById("reponse");
    switch(x)
    {
        case 0:
            if (qst.indexOf("non") > -1 || qst.indexOf("NON") > -1)
            {
                answr.innerHTML = "Donne le nom de votre camarade?";
                x = 1;
            }
            else if (qst.indexOf("oui") > -1 || qst.indexOf("OUI") > -1)
            {
                answr.innerHTML = "Vous ete un visiteur?";
                x = 2;
            }
            else answr.innerHTML = "S'il vous plait Répondre avec Oui/Non";
            break;
        case 1:
            nswr.innerHTML = "Bonjour " + qst + " Vous Avez fait project FDF?"
            x = 11;
            break;
        case 2:
            if (qst.indexOf("non") > -1 || qst.indexOf("NON") > -1)
            {
                answr.innerHTML = "Oooh Donc Tu es un espion!!!";
                alert("Vous ete Capturé!!");
                x = 404;
            }
            else if (qst.indexOf("oui") > -1 || qst.indexOf("OUI") > -1)
            {
                answr.innerHTML = "Es-tu venu de Spoody??";
                x = 22;
            }
            else answr.innerHTML = "S'il vous plait Répondre avec Oui/Non";
            break;
        case 11:
            if (qst.indexOf("non") > -1 || qst.indexOf("NON") > -1)
            {
                answr.innerHTML = "Pourquoi? je pense que vous avez prefere piscine PHP";
                x = 111;
            }
            else if (qst.indexOf("oui") > -1 || qst.indexOf("OUI") > -1)
            {
                answr.innerHTML = "Tres bien vous voulez continuer ans la voix du Graphics";
                x = 112;
            }
            else answr.innerHTML = "S'il vous plait Répondre avec Oui/Non";
            break;
        case 111:
            if (qst.indexOf("non") > -1 || qst.indexOf("NON") > -1)
            {
                answr.innerHTML = "Bon chance mon ami. Vous avez un difficile ex05 dans day00!";
                alert("Aller et descendre au travail et prepare pour piscine.");
                x = 404;
            }
            else if (qst.indexOf("oui") > -1 || qst.indexOf("OUI") > -1)
            {
                answr.innerHTML = "Ohh donc vous ete intereser en AI";
                alert("discussion est fermeé");
                x = 404;
            }
            else answr.innerHTML = "S'il vous plait Répondre avec Oui/Non";
            break;
        case 22:
            if (qst.indexOf("non") > -1 || qst.indexOf("NON") > -1)
            {
                answr.innerHTML = "Bien tu es aujourd'hui mon vrai ami!";
                alert("Bon discussion. Une nouvelle amitié");
                x = 404;
            }
            else if (qst.indexOf("oui") > -1 || qst.indexOf("OUI") > -1)
            {
                answr.innerHTML = "Voulez-vous être dans 12 volontaires pour le check-in de Benguerir??";
                x = 222;
            }
            else answr.innerHTML = "S'il vous plait Répondre avec Oui/Non";
            break;
        case 222:
            if (qst.indexOf("non") > -1 || qst.indexOf("NON") > -1)
            {
                answr.innerHTML = "Bon choix, triik salamaa to Benguerir!";
                alert("Bon discussion. Toujours être Volontaire!");
                x = 404;
            }
            else if (qst.indexOf("oui") > -1 || qst.indexOf("OUI") > -1)
            {
                answr.innerHTML = "Bien tu es aujourd'hui mon vrai ami!";
                alert("Bon discussion. Une nouvelle amitié");
                x = 404;
            }
            else answr.innerHTML = "S'il vous plait Répondre avec Oui/Non";
            break;
    }
    document.querySelector("#form input[type='text']").value = " ";
}

///////////

function close_win()
{
    window.close();
}