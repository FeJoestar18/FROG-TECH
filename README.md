# **Frog Tech - E-commerce de Tecnologias**

## **Visão, Missão e Valores**

### **Visão**
Ser referência no mercado de e-commerce de tecnologias, oferecendo produtos inovadores, com um atendimento de excelência, buscando sempre a melhor experiência para o usuário.

### **Missão**
Proporcionar aos nossos clientes um ambiente online seguro e fácil de usar, onde possam adquirir as melhores soluções tecnológicas, sempre com qualidade, confiabilidade e suporte contínuo.

### **Valores**
- **Qualidade**: Compromisso com a excelência de nossos produtos e serviços.
- **Inovação**: Buscar sempre novas tecnologias e ideias criativas.
- **Segurança**: Garantir a proteção de dados e informações dos nossos clientes.
- **Sustentabilidade**: Trabalhar com práticas que minimizem impactos ambientais.

## **Sobre o Projeto**

O **Frog Tech** é uma plataforma de e-commerce especializada na venda de tecnologias. Nosso objetivo é facilitar a vida de quem busca soluções práticas, acessíveis e de alta performance em dispositivos eletrônicos e componentes. Através de uma interface moderna e intuitiva, buscamos proporcionar a melhor experiência de compra.

## **Tecnologias Utilizadas**

- **PHP 8.2.18**: Linguagem de programação que usamos para o back-end.
- **MySQL / phpMyAdmin**: Banco de dados utilizado para armazenar os dados dos produtos, usuários e transações.
- **CSS**: Para estilização da interface.
- **JavaScript**: Para interatividade na interface.

---

## **Configuração do Ambiente de Desenvolvimento**

### **Requisitos**
- **PHP 8.2** ou superior instalado.
- **XAMPP**, **WAMP** ou **Docker** para configurar o servidor Apache e MySQL.

### **Importe o banco de dados:**

Abra o phpMyAdmin ou MySQL Workbench.
Importe o arquivo SQL presente no repositório para criar a estrutura do banco de dados.
Configure seu ambiente local:

Se estiver usando o XAMPP, mova os arquivos para a pasta htdocs.
Se estiver usando o WAMP, mova para a pasta www.
Inicie o servidor:

No XAMPP/WAMP, inicie os serviços Apache e MySQL.
Acesse o projeto:

Abra o navegador e vá até http://localhost/[nome_do_projeto] para visualizar o site.

---

### **Comandos Git - Passo a Passo**

1. Clonar o Repositório:
Clone o repositório do GitHub ou GitLab para sua máquina local:

git clone <URL_DO_REPOSITORIO>
(O que ele faz: Baixa uma cópia do repositório para o seu diretório local.)

2. Abrir o projeto no seu editor de código:

code .
(O que ele faz: Abre o projeto no Visual Studio Code )(ou qualquer editor configurado).

3. Adicionar Arquivos ao Repositório:

git add .
(O que ele faz: Adiciona todos os arquivos modificados ao índice do Git, ou seja, prepara-os para o próximo commit.)

4. Commit das Alterações:

git commit -m "Mensagem do commit"
(O que ele faz: Registra suas alterações no histórico do repositório com uma mensagem explicativa.)

5. Enviar Alterações para o Repositório Remoto:

git push origin main
(O que ele faz: Envia as alterações locais para o repositório remoto, no branch main.)

6. Atualizar o Repositório Local com as Últimas Alterações:

git pull origin main
(O que ele faz: Baixa e integra as últimas alterações feitas no repositório remoto para o seu repositório local.)

---

### **Gerenciamento de Branches**

7. Criar uma Nova Branch:

**Se você precisar trabalhar em uma nova funcionalidade, crie uma nova branch:**


git checkout -b nome_da_nova_branch
(O que ele faz: Cria uma nova branch e muda para ela.)

8. Listar as Branches:
Para listar todas as branches do repositório:

git branch
(O que ele faz: Exibe todas as branches disponíveis no repositório.)

9. Mudar para Outra Branch:
Se precisar mudar para uma branch existente:

git checkout nome_da_branch
(O que ele faz: Muda para a branch especificada.)

10. Excluir uma Branch:
Para excluir uma branch local:

git branch -d nome_da_branch
(O que ele faz: Exclui a branch local especificada.)

---

### **Desfazendo Alterações e Erros Comuns**

11. Desfazer Mudanças em um Arquivo Modificado:
Caso queira desfazer alterações em um arquivo modificado:

git checkout -- nome_do_arquivo
(O que ele faz: Restaura o arquivo para o último estado confirmado no repositório.)

12. Desfazer o Último Commit:
Se você cometeu algo errado e deseja desfazer o último commit:

git reset --soft HEAD~1
(O que ele faz: Remove o último commit, mas mantém as alterações locais.)

13. Reverter um Commit Específico:
Se você quiser reverter um commit anterior, mas manter o histórico intacto:

git revert <ID_DO_COMMIT>
(O que ele faz: Cria um novo commit que reverte as alterações de um commit anterior.)

---

### Próximos Passos

.Corrigir bugs que surgirem com o tempo.
.Adicionar novos recursos conforme feedback dos usuários.

### Como Contribuir

Se você deseja contribuir com o projeto, siga os passos abaixo:

-Faça um fork do repositório.
-Clone o repositório para sua máquina.
-Crie uma nova branch para suas alterações.
-Faça as modificações necessárias e commit suas mudanças.
-Crie um pull request explicando suas alterações.





