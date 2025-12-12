async function enviarDados(){
    event.preventDefault()
    console.log("Clicou no botão entrar");
    const email = document.querySelector("#imail").value
    const senha = document.querySelector("#isenha").value
    console.log(`email: ${email} | senha: ${senha}`)
    try {
        const enviar = await fetch("./caminho ainda não existe", {
            method: "POST",
            body: JSON.stringify({email, senha})
        });

        //Resposta do servidor

        const respostaServidor = await enviar.json()
        if(respostaServidor.success)
            window.location.href = "dashboard.php"
        else
            alert("Verifique o seu email e senha!")
    } catch (Exception) {
        console.log("Aconteceu um erro genérico: ", Exception)
    }
}