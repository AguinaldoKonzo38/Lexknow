const botaoMenu = document.querySelector(".navegacao-botao")
const links = document.querySelector(".navegacao-links")

botaoMenu.addEventListener("click", (evt) => {
    links.classList.toggle("mostrar-link")
    console.log("clico no botao menu")
})