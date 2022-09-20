/************************** **************************/
/********************* VARIABLES *********************/
/************************** **************************/

const indicatorPassword = document.querySelector('.indicatorPassword');
const password = document.querySelector('#password');

const buttonSubmit = document.querySelector('button');

const minLenghtContainer = document.querySelector('.minLenght');
const upperLetterContainer = document.querySelector('.upperLetter');
const specialCharaContainer = document.querySelector('.specialChara');

const regexLenght = RegExp("[a-zA-Z0-9_@$!%*#?&]{8,}");
const regexSpecial = RegExp("[_@$!%*#?&]");
const regexUppercase = RegExp("[A-Z]");

/************************** **************************/
/********************* FONCTIONS *********************/
/************************** **************************/

const verifyRegex = (regex, value, bigContainer, container) => {
    if (regex.test(value.value)) {
        container.style = 'color: #75DB79';
        bigContainer.style = 'display: flex';
    } else {
        container.style = 'color: #E87D7D';
        bigContainer.style = 'display: flex';
    }
}

/************************** **************************/
/*********************** WORK ************************/
/************************** **************************/

password.addEventListener('input', () => {
    if (!regexLenght.test(password.value) && !regexSpecial.test(password.value) && !regexUppercase.test(password.value)) {
        indicatorPassword.style = 'display: flex';
        buttonSubmit.setAttribute('disabled', true);
    }

    verifyRegex(regexLenght, password, indicatorPassword, minLenghtContainer);
    verifyRegex(regexSpecial, password, indicatorPassword, specialCharaContainer);
    verifyRegex(regexUppercase, password, indicatorPassword, upperLetterContainer);

    if (regexLenght.test(password.value) && regexSpecial.test(password.value) && regexUppercase.test(password.value)) {
        indicatorPassword.style = 'display: none';
        buttonSubmit.removeAttribute('disabled');
    }
});

password.addEventListener('blur', () => {
    indicatorPassword.style = 'display: none';
})