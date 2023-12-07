let imagesURL = null;
let provenanceAppel = null;
let listeArticles = null;
let listeCategories = null;
let rep = '<link rel="stylesheet" href="client\public\css\style.css">'

let remplirCard = unArticle => {
    let rep = ' <div class="col-sm-3 maCard">'
    rep += '<div class="card">'
    rep +=
        ' <img src="' + imagesURL +
        unArticle.imageart +
        '"  class="card-img-top img-fluid" alt="...">'
    rep += ' <div class="card-body">'
    rep += ' <h5 class="card-title">' + unArticle.nomarticle + '</h5>'
    rep +=
        ' <p class="card-text">' +
        unArticle.description
        '...</p>'
    rep += ' <p class="card-text">' + unArticle.prix + '$</p>'
    if (provenanceAppel == 'M') {
        rep +=
            ' <a href="#" onClick="ajouterPanier(' + unArticle.ida + ');"><i class="bi bi-cart-plus panierPlus"></i></a>'
    }
    rep += ' </div>'
    rep += ' </div>'
    rep += ' </div>'
    return rep
}

let listerArticles = () => {
    let contenu = `<div class="row">`
    for (let unArticle of listeArticles) {
        contenu += remplirCard(unArticle)
    }
    contenu += `</div>`
    $('#contenu').html(contenu) //document.getElementById('contenu').innerHTML=contenu;
}

let listerCategories = () => {
  let leSel = document.getElementById('selCategs');
  let rep="";
  for(let uneCateg of listeCategories){
     rep+=`<li><a class="dropdown-item" href="javascript:obtenirXML('${uneCateg.substring(0,3)}');">${uneCateg}</a></li>`;
  }
  leSel.innerHTML=rep;
}

let listerCategoriesForm = () => {
  let leSel = document.getElementById('categ');
  for(let uneCateg of listeCategories){
      if(uneCateg !== "Toutes"){
        leSel.options[leSel.options.length] = new Option(uneCateg, uneCateg.substring(0,3).toLowerCase());
      }
  }
}

//allerURL contient le url où se trouve le fichier liste.php
//Provenance si l'Appel provient de index.php ou membres.php
//imagesURL selon la provenance contiendra le bon chemin où se trouve les images des articles
let chargerArticles = (provenance, allerURL) => {
    provenanceAppel = provenance;
    imagesURL = (provenance == 'I') ? "serveur/images_articles/" : "../../images_articles/";
    $.ajax({
        type: 'POST',
        url: allerURL,
        dataType: 'json',
        success: reponse => {
            if (reponse.OK) {
                listeArticles = reponse.listeArticles;
                listeCategories = reponse.categories;
                if(provenance == "I" || provenance == "M"){
                    listerCategories();
                    listerArticles();
                }else {// A-Admmin
                    listerCategories();
                    listerCategoriesForm();
                    genererPagination(); //À partir de listeArticles
                }
            }
        },
        fail: e => {
            alert('Problème avec votre requête')
        }
    })
}