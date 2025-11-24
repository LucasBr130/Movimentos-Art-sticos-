const form = document.getElementById('formLogin');
const msg = document.getElementById('mensagemLogin');

form.addEventListener('submit', function(e) {
    e.preventDefault();

    const dados = new FormData(form);

    fetch("login.php", {
        method: "POST",
        body: dados
    })
    .then(res => res.text())
    .then(texto => {

        if (texto === "OK") {
            // Redireciona para o conteúdo
            window.location.href = "movimentos.html"; 
        } else {
            msg.innerHTML = `<p style="color: red;">${texto}</p>`;
        }
    })
    .catch(() => {
        msg.innerHTML = "<p style='color:red;'>Erro no servidor.</p>";
    });
});