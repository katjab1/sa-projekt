window.onload = function() {
let ikona = document.querySelector("#meni > img");
let meni = document.getElementById("glavni_meni");
let header = document.querySelector("header");

function krmilnikMeni(event) {
    if(glavni_meni.style.display =="block") {
        glavni_meni.style.display ="none";
        header.style.padding ="40px 0 0 0";
    }
    else {
    glavni_meni.style.display ="block";
    header.style.padding ="220px 0 0 0";
    }
}

ikona.addEventListener('click', krmilnikMeni);

}
