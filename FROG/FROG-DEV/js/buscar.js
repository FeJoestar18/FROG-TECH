
        function buscarCEP() {
            const cep = document.getElementById('cep').value;
            if (cep.length === 8) {
                fetch(`https://viacep.com.br/ws/${cep}/json/`)
                    .then(response => response.json())
                    .then(data => {
                        if (!data.erro) {
                            document.getElementById('endereco').value = data.logradouro || '';
                            document.getElementById('cidade').value = data.localidade || '';
                            document.getElementById('pais').value = 'Brasil'; // ViaCEP só retorna dados do Brasil
                        } else {
                            alert("CEP não encontrado!");
                        }
                    })
                    .catch(err => console.error("Erro ao buscar CEP:", err));
            } else {
                alert("Digite um CEP válido (8 dígitos).");
            }
        }
  