var imagenes = document.querySelectorAll(".galleryImg");
var modal = document.querySelector("#modal");
var img = document.querySelector("#modalImg");
var boton = document.querySelector("#modalBoton");

for(var i = 0; i < imagenes.length; i++){
    imagenes[i].addEventListener("click", function(e){
        modal.classList.toggle("modalOpen");
        var src = e.target.src;
        img.setAttribute("src", src);
    });
}
boton.addEventListener("click", function(){
    modal.classList.toggle("modalOpen");
});