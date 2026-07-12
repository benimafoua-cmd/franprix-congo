panier.js
if (!localStorage.getItem('panier_franprix')) {
    localStorage.setItem('panier_franprix', JSON.stringify([]));
}

function ajouterAuPanier(id, nom, prix, image) {
    let panier = JSON.parse(localStorage.getItem('panier_franprix'));
    let produitExistant = panier.find(item => item.id === id);
    
    if (produitExistant) {
        produitExistant.quantite += 1;
    } else {
        panier.push({ id: id, nom: nom, prix: parseInt(prix), image: image, quantite: 1 });
    }
    
    localStorage.setItem('panier_franprix', JSON.stringify(panier));
    mettreAJourBadgePanier();
    alert(nom + " a été ajouté au panier !");
}

function mettreAJourBadgePanier() {
    let panier = JSON.parse(localStorage.getItem('panier_franprix'));
    let totalArticles = panier.reduce((total, item) => total + item.quantite, 0);
    let badge = document.getElementById('badge-panier');
    if (badge) badge.innerText = totalArticles;
}

function afficherPanierPage() {
    let panier = JSON.parse(localStorage.getItem('panier_franprix'));
    let conteneur = document.getElementById('contenu-panier');
    let totalConteneur = document.getElementById('total-panier');
    
    if (!conteneur) return;
    
    if (panier.length === 0) {
        conteneur.innerHTML = `<tr><td colspan="5" class="text-center py-4">Votre panier est vide.</td></tr>`;
        if (totalConteneur) totalConteneur.innerText = "0 FCFA";
        return;
    }
    
    let html = "";
    let totalGeneral = 0;
    
    panier.forEach((item, index) => {
        let sousTotal = item.prix * item.quantite;
        totalGeneral += sousTotal;
        html += `
            <tr>
                <td>${item.nom}</td>
                <td>${item.prix} FCFA</td>
                <td>
                    <input type="number" class="form-control form-control-sm w-50" value="${item.quantite}" min="1" onchange="modifierQuantite(${index}, this.value)">
                </td>
                <td>${sousTotal} FCFA</td>
                <td><button class="btn btn-danger btn-sm" onclick="supprimerArticle(${index})">Retirer</button></td>
            </tr>`;
    });
    
    conteneur.innerHTML = html;
    if (totalConteneur) totalConteneur.innerText = totalGeneral + " FCFA";
}

function modifierQuantite(index, nouvelleQuantite) {
    let panier = JSON.parse(localStorage.getItem('panier_franprix'));
    panier[index].quantite = parseInt(nouvelleQuantite);
    localStorage.setItem('panier_franprix', JSON.stringify(panier));
    afficherPanierPage();
    mettreAJourBadgePanier();
}

function supprimerArticle(index) {
    let panier = JSON.parse(localStorage.getItem('panier_franprix'));
    panier.splice(index, 1);
    localStorage.setItem('panier_franprix', JSON.stringify(panier));
    afficherPanierPage();
    mettreAJourBadgePanier();
}

document.addEventListener("DOMContentLoaded", () => {
    mettreAJourBadgePanier();
    afficherPanierPage();
    
    // Injecter les données du panier dans le formulaire avant envoi
    let form = document.getElementById('formulaire-commande');
    if(form) {
        form.addEventListener('submit', () => {
            document.getElementById('panier_data').value = localStorage.getItem('panier_franprix');
            localStorage.removeItem('panier_franprix');
        });
    }
});
