"use strict";

// Declarations

const passwordInput = document.querySelector('#password');
const passwordToggle = document.querySelector('#password-visibility-toggle');

const passwordVerifyInput = document.querySelector('#password-verify');
const passwordVerifyToggle = document.querySelector('#password-verify-visibility-toggle');

// Functions
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

if (passwordVerifyToggle) {
    passwordVerifyToggle.addEventListener('mousedown', (e) => {
        e.preventDefault();
        toggleInput(passwordInput, true);
    });

    passwordVerifyToggle.addEventListener('click', (e) => {
        e.preventDefault();
        toggleInput(passwordInput, false);
    });
}

function toggleInput(inputElement, setVisible) {
    inputElement.type = setVisible ? "text" : "password";
}