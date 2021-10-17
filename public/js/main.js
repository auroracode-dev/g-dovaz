const abrir=document.getElementById("open");
const cerrar=document.getElementById("close");
const windowBackground=document.getElementById("window");
const newWindow=document.getElementById("newWindow");

abrir.addEventListener("click", ()=> {
   windowBackground.classList.add('window_background--active'),
   newWindow.classList.add('window--actives')
});
cerrar.addEventListener("click", () => {

   windowBackground.classList.remove('window_background--active'),
   newWindow.classList.remove('window--actives')
});
