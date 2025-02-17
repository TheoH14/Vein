"use strict";

document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector(".form-profil");

    form.addEventListener("submit", function(event) {
        event.preventDefault(); 

        const firstname = document.getElementById("firstname").value;
        const lastname = document.getElementById("lastname").value;
        const gender = document.getElementById("gender").value;
        const email = document.getElementById("email").value;
        const country = document.getElementById("country").value;

        document.getElementById("userFirstname").textContent = firstname || "";
        document.getElementById("userLastname").textContent = lastname || "";
        document.getElementById("userGender").textContent = gender || "";
        document.getElementById("userEmail").textContent = email || "";
        document.getElementById("userCountry").textContent = country || "";

    });
});

// Exemple de données récupérées après la connexion
const userData = {
    firstname: "",
    lastname: "",
    gender: "",
    country : "",
    email: ""
};

// Fonction pour afficher les données dans les spans
function displayUserData() {
    document.getElementById("userFirstname").textContent = userData.firstname;
    document.getElementById("userLastname").textContent = userData.lastname;
    document.getElementById("userEmail").textContent = userData.email;
    document.getElementById("userGender").textContent = userData.gender === "Homme" || "Femme";
    document.getElementById("userCountry").textContent = userData.country;
    
    document.getElementById("firstname").value = userData.firstname;
    document.getElementById("lastname").value = userData.lastname;
    document.getElementById("email").value = userData.email;
    document.getElementById("gender").value = userData.gender;
    document.getElementById("country").value = userData.country;
}

// Lorsque l'utilisateur clique 2 fois sur "EDIT", les champs de saisie sont modifiables
document.getElementById("modifyProfil").addEventListener("dblclick", function() {
    // Active les champs de saisie pour modification
    document.getElementById("firstname").disabled = false;
    document.getElementById("lastname").disabled = false;
    document.getElementById("gender").disabled = false;
    document.getElementById("email").disabled = false;
    document.getElementById("country").disabled = false;
});

// Lorsque l'utilisateur clique 1 fois sur "EDIT", les champs de saisie sont non modifiables
document.getElementById("modifyProfil").addEventListener("click", function() {
    // Désactive les champs de saisie pour modification
    document.getElementById("firstname").disabled = true;
    document.getElementById("lastname").disabled = true;
    document.getElementById("email").disabled = true;
    document.getElementById("gender").disabled = true;
    document.getElementById("country").disabled = true;
    
});


// Ajoute un email à la liste d'emails
document.getElementById("addEmailBtn").addEventListener("click", function() {
    const updatedEmail = document.getElementById("email").value;

    document.getElementById("userEmail").textContent = updatedEmail;
    userData.email = updatedEmail; 
});



