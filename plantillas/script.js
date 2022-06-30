
function enviarIdioma (idioma){
      location.href = "grabarCookie.php?idiomaUsuario=" + idioma;
    }




const setTheme = theme => document.documentElement.className = theme;



/* Cuando se clickea el botón, aparece el menú lateral */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Cuando se toca a afuera del menú desplegable, se cierra este
window.onclick = function(event) {
  if (!event.target.matches('.botonlateral')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}