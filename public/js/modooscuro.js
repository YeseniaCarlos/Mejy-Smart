var contadorClicks = parseInt(localStorage.getItem('contadorClicks')) || 0;
var body = document.body;
var loginbox = document.querySelector('.login-box-body');
var btnSecondary = document.querySelector('.btn-primary');
// var color1 = document.querySelector('.color1');
// var color2 = document.querySelector('.color2');
const text1 = document.getElementsByClassName('text1');
var modales = document.getElementsByClassName('.modal-dialog');


var button = document.getElementById('colorButton');

actualizarEstilo();

function cambiarColor() {
    contadorClicks++;
    localStorage.setItem('contadorClicks', contadorClicks);
    actualizarEstilo();
}

function actualizarEstilo() {
    if (contadorClicks % 2 === 0) {

        // modales.style.backgroundColor = '#6c757d';
        // modales.style.color ="white"

        //Color letra
        for (let i = 0; i < text1.length; i++) {
            text1[i].style.color = 'white';
        }
        // login.html

        btnSecondary.style.backgroundColor = '#6c757d';

        btnSecondary.style.color = 'white';
        loginbox.style.background = 'linear-gradient(rgb(33, 37, 41), rgb(77 84 99))';
        body.style.backgroundColor = '#212529';
        body.style.color = 'white';

        button.classList.remove('active');
        button.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" style="fill: white;" width="30" height="30" fill="currentColor" class="bi bi-brightness-high-fill" viewBox="0 0 16 16"> <path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/> </svg>';
    } else {

        // login.html

        // modales.style.backgroundColor = 'white';
        // modales.style.color ="black"

         //Color letra
         for (let i = 0; i < text1.length; i++) {
            text1[i].style.color = '#666';
        }

        btnSecondary.style.backgroundColor = '#0d6efd';
        btnSecondary.style.color = 'white';
        loginbox.style.backgroundColor = 'white';
        loginbox.style.background = 'linear-gradient(white, rgb(174 178 185))';


        body.style.backgroundColor = '#d2d6de';
        body.style.color = '#212529';
        button.classList.add('active');
        button.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-moon-fill" viewBox="0 0 16 16"> <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278"/> </svg>';
    }
}
