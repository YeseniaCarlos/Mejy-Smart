// Recupera el tamaño actual del texto almacenado en localStorage o usa 20 como valor predeterminado
let currentSize = localStorage.getItem('fontSize') || 20;

function zoomText(zoomIn) {
    if (zoomIn) {
        currentSize = parseInt(currentSize) + 5;
    } else {
        currentSize = parseInt(currentSize) - 5;
    }

    // Actualiza el tamaño del texto y almacena el nuevo valor en localStorage
    const textElements = document.getElementsByClassName('text1');
    for (let i = 0; i < textElements.length; i++) {
        textElements[i].style.fontSize = currentSize + 'px';
    }

    localStorage.setItem('fontSize', currentSize);
}

// Establece el tamaño del texto al cargar la página
window.onload = function () {
    const textElements = document.getElementsByClassName('text1');
    for (let i = 0; i < textElements.length; i++) {
        textElements[i].style.fontSize = currentSize + 'px';
    }
};