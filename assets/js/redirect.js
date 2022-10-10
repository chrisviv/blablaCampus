let msg = document.querySelector('.msg');

if (msg.textContent == 'Vous êtes bien connecté !' || msg.textContent == 'Votre compte a bien été créé !' || msg.textContent == 'Vos informations ont bien été mises à jour !' || msg.textContent == 'Votre trajet a bien été créé !' || msg.textContent == 'Votre message a bien été envoyé !') {
    setTimeout(()=>{
        window.location.href='search.php'
    }, 1200);
}else if(msg.textContent == 'Un email vient de vous être envoye pour réinitialiser votre mot de passe.' || msg.textContent == 'Vous venez de recevoir un mail.' || msg.textContent == 'Votre mot de passe a été mis à jour avec succés !'){
    setTimeout(()=>{
        window.location.href='index.php'
    }, 1200);
}else if(msg.textContent == 'Votre trajet a bien été supprimé !' || msg.textContent == 'Votre trajet a bien été modifié !' || msg.textContent == 'Votre réservation a bien été annulée.'){
    setTimeout(()=>{
        window.location.href='trajets.php'
    }, 1200);
}
