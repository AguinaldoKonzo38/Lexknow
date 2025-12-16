async function enviarDados() {
    event.preventDefault()
    console.log("Clicou no botão entrar");
    const email = document.querySelector("#imail").value
    const senha = document.querySelector("#isenha").value
    console.log(`email: ${email} | senha: ${senha}`)
    try {
        const enviar = await fetch("http://localhost/LexKnow/Lexknow/assets/backend/login.php", {
            method: "POST",
            body: JSON.stringify({ email, senha })
        });

        // //Resposta do servidor

        const respostaServidor = await enviar.json()
        if (respostaServidor.success == true)
            window.location.href = "dashboard.php"
        else {
            Toastify({
                text: respostaServidor.message,
                duration: 3000,
                // destination: "https://github.com/apvarun/toastify-js",
                newWindow: true,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                     background: "#e74c3c",
                },
            }).showToast();

        }
    } catch (Exception) {
        console.log("Aconteceu um erro genérico: ", Exception)
    }
}