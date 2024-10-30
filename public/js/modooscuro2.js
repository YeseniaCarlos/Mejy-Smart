var contadorClicks = parseInt(localStorage.getItem('contadorClicks')) || 0;
var colorbody = document.querySelector('.colorbody');
var mainsheader = document.querySelector('.main-header');
var mainsidebar = document.querySelector('.main-sidebar');
var footer = document.querySelector('.main-footer');
var userheaders = document.querySelector('.dropdown-menu');
var contenidowrapper = document.querySelector('.content-wrapper');
// var colorletra = document.querySelector('.colorletra');
const textElements = document.getElementsByClassName('colorletra');
const box = document.getElementsByClassName('box');

var body = document.body;

// var box = document.querySelector('.box');

var button = document.getElementById('colorButton1');
var dropbtn = document.getElementById('dropbtn');

const td = document.getElementsByTagName('td');

actualizarEstilo();

function cambiarColor() {
    contadorClicks++;
    localStorage.setItem('contadorClicks', contadorClicks);
    actualizarEstilo();
}

function actualizarEstilo() {
    if (contadorClicks % 2 === 0) {

        // Itera sobre todas las celdas y aplica estilos
        for (let i = 0; i < td.length; i++) {
            td[i].style.backgroundColor = '#212529';
            td[i].style.color = 'white';
        }
        
        //Color letra
        for (let i = 0; i < textElements.length; i++) {
            textElements[i].style.color = 'white';
        }

        //User header
        userheaders.style.backgroundColor = '#212529';
        userheaders.style.color = 'white';

        //Fondo wrapper
        contenidowrapper.style.backgroundColor = 'black';
        contenidowrapper.style.color = 'white';

        //Cotenido BOX
        for (let i = 0; i < box.length; i++) {
            box[i].style.color = 'white';
            box[i].style.backgroundColor = '#212529';
        }



        //footer
        footer.style.backgroundColor = '#212529';
        footer.style.color = 'white';

        //Barra Lateral
        mainsidebar.style.backgroundColor = '#212529';
        mainsidebar.style.color = 'white';

        //Header
        colorbody.style.backgroundColor = '#212529';
        colorbody.style.color = 'white';

        mainsheader.style.backgroundColor = '#212529';
        mainsheader.style.color = 'white';



        //Body
        body.style.backgroundColor = '#212529';
        body.style.color = 'white';

        button.classList.remove('active');
        button.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-brightness-high-fill" viewBox="0 0 16 16"> <path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/> </svg>';
        dropbtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" style="fill: white;" width="40" height="40" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16"> <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" /> </svg>';
    } else {

        // Itera sobre todas las celdas y aplica estilos
        for (let i = 0; i < td.length; i++) {
            td[i].style.backgroundColor = 'white';
            td[i].style.color = 'black';
        }

        //Color letra
        for (let i = 0; i < textElements.length; i++) {
            textElements[i].style.color = 'black';
        }


        //User header
        userheaders.style.backgroundColor = '#3c8dbc';
        userheaders.style.color = 'black';

        //Fondo wrapper
        contenidowrapper.style.backgroundColor = 'white';
        contenidowrapper.style.color = 'black';

        //Cotenido BOX
        // box.style.backgroundColor = 'white';
        // box.style.color = 'black';
        for (let i = 0; i < box.length; i++) {
            box[i].style.color = 'black';
            box[i].style.backgroundColor = 'white';
        }



        //Footer
        footer.style.backgroundColor = 'white';
        footer.style.color = 'black';

        //Barra Lateral
        mainsidebar.style.backgroundColor = 'white';
        mainsidebar.style.color = 'black';

        //Header
        colorbody.style.backgroundColor = '#3c8dbc';
        colorbody.style.color = 'black';

        mainsheader.style.backgroundColor = '#3c8dbc';
        mainsheader.style.color = 'black';

        //Body
        body.style.backgroundColor = 'white';
        body.style.color = '#212529';

        button.classList.add('active');
        button.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" style="fill: black" class="bi bi-moon-fill" viewBox="0 0 16 16"> <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278"/> </svg>';
        dropbtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" style="fill: white;" width="40" height="40" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16"> <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" /> </svg>';

    }
}
