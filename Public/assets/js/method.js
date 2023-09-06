//We store the html elements necessary for the hamburger menu in variables.
let menu = document.getElementById('menu');
let list = document.getElementById('list');
let close = document.getElementById('close');

//We create a function to make the menu appear when we press on the hamburger menu logo.
menu.addEventListener('click', function () {
    list.style.left = "0px";
})
//We create a function to make the menu disappear when we press the cross of it.
close.addEventListener('click', function () {
    list.style.left = "-256px";
})

let password = document.getElementById("password");
let passwordConfirm = document.getElementById("password-repeat");

/**
 * Check the validity between the two user provided passwords.
 */
function checkPassword(){
    if(password.value !== passwordConfirm.value) {
        // Si les deux valeurs sont différentes, alors on envoie pas le formulaire !
        passwordConfirm.setCustomValidity("Les mots de passe ne correspond pas !");
    }
    else {
        // On retire l'avertissement, le formulaire peut à nouveau être envoyé !
        passwordConfirm.setCustomValidity('');
    }
}

password.addEventListener('change', checkPassword);
passwordConfirm.addEventListener('keyup', checkPassword);
