"use strict";

const passwordInput = document.querySelector('#password');
const passwordToggle = document.querySelector('#password-visibility-toggle');

const passwordConfirmationInput = document.querySelector('#password_confirmation');
const passwordConfirmationToggle = document.querySelector('#password-confirmation-visibility-toggle');

if (passwordToggle) {
    passwordToggle.addEventListener('mousedown', (e) => {
        e.preventDefault();
        toggleInput(passwordInput, true);
    });

    passwordToggle.addEventListener('click', (e) => {
        e.preventDefault();
        toggleInput(passwordInput, false);
    });
}

if (passwordConfirmationToggle) {
    passwordConfirmationToggle.addEventListener('mousedown', (e) => {
        e.preventDefault();
        toggleInput(passwordConfirmationInput, true);
    });

    passwordConfirmationToggle.addEventListener('click', (e) => {
        e.preventDefault();
        toggleInput(passwordConfirmationInput, false);
    });
}

function toggleInput(inputElement, setVisible) {
    inputElement.type = setVisible ? "text" : "password";
}

console.log("Script loaded");