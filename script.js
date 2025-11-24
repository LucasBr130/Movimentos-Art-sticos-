// Captura o formulário e o espaço da mensagem
const form = document.getElementById('formCadastro');
const msg = document.getElementById('mensagem');

// Quando o usuário tentar enviar o formulário
form.addEventListener('submit', function(event) {
  event.preventDefault(); // impede o envio tradicional

  // Captura os valores dos campos
  const nome = document.getElementById('nome').value.trim();
  const email = document.getElementById('email').value.trim();
  const senha = document.getElementById('senha').value.trim();

  // Validação antes do envio
  if (nome === "" || email === "" || senha === "") {
    msg.innerHTML = "<span style='color:red'>Preencha todos os campos!</span>";
    return;
  }

  if (!email.includes('@')) {
    msg.innerHTML = "<span style='color:red'>Digite um e-mail válido!</span>";
    return;
  }

  if (senha.length < 6) {
    msg.innerHTML = "<span style='color:red'>A senha deve ter pelo menos 6 caracteres!</span>";
    return;
  }

  // Pega os dados do formulário
  const formData = new FormData(form);

  // Envia pro PHP usando fetch
  fetch('cadastro.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.text())
  .then(data => {
    msg.innerHTML = data; // mostra o retorno do PHP na página
  })
  .catch(error => {
    msg.innerHTML = "<span style='color:red'>Erro de conexão com o servidor.</span>";
  });
});