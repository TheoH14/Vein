"use strict";

document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector(".form-profil");

    form.addEventListener("submit", function(event) {

        const firstname = document.getElementById("firstname").value;
        const lastname = document.getElementById("lastname").value;
        const gender = document.getElementById("gender").value;
        const email = document.getElementById("email").value;

        document.getElementById("userFirstname").textContent = firstname || "";
        document.getElementById("userLastname").textContent = lastname || "";
        document.getElementById("userGender").textContent = gender || "";
        document.getElementById("userEmail").textContent = email || "";

    });
});

// Exemple de données récupérées après la connexion
const userData = {
    firstname: "",
    lastname: "",
    gender: "",
    email: ""
};

// Fonction pour afficher les données dans les spans
function displayUserData() {
    document.getElementById("userFirstname").textContent = userData.firstname;
    document.getElementById("userLastname").textContent = userData.lastname;
    document.getElementById("userEmail").textContent = userData.email;
    document.getElementById("userGender").textContent = userData.gender === "Homme" || "Femme";
    
    document.getElementById("firstname").value = userData.firstname;
    document.getElementById("lastname").value = userData.lastname;
    document.getElementById("email").value = userData.email;
    document.getElementById("gender").value = userData.gender;
}

// Lorsque l'utilisateur clique sur "EDIT", les champs de saisie deviennent modifiables
document.getElementById("modifyProfil").addEventListener("click", function() {
    // Active les champs de saisie pour modification
    document.getElementById("firstname").disabled = false;
    document.getElementById("lastname").disabled = false;
    document.getElementById("gender").disabled = false;
    document.getElementById("email").disabled = false;
});

document.getElementById("addEmailBtn").addEventListener("click", function() {
    const updatedEmail = document.getElementById("email").value;

    // Met à jour l'email dans les spans et dans les données utilisateur
    document.getElementById("userEmail").textContent = updatedEmail;
    userData.email = updatedEmail; // Mise à jour dans les données utilisateur


});


