### Como rodar o Projeto 

### Passo 1°- Clonar o Repositorio

```bash
# Inicializar um repositório Git
git init

# Adicionar todos os arquivos ao staging
git add .

# Fazer o primeiro commit
git commit -m "Initial commit"

# Configurar o repositório remoto
git remote add origin https://github.com/FeJoestar18/FROG-TECH.git

# Enviar os arquivos para o repositório remoto
git push -u origin main

# Puxar os arquivos do Repositorio
git pull origin main

Use o comando `git status` para verificar o estado do repositório.

```
---

# Como rodar um projeto PHP com WAMP, XAMPP e Docker

## 1. Rodando o Projeto PHP com WAMP

### Passo 1: Baixar e Instalar o WAMP
1. Acesse o site do [WAMP](http://www.wampserver.com/en/).
2. Baixe a versão apropriada para o seu sistema operacional (Windows).
3. Instale o WAMP no seu computador, seguindo as instruções do instalador.

### Passo 2: Iniciar o WAMP
1. Abra o WAMP no seu computador.
2. Você verá um ícone verde no tray, indicando que o servidor está funcionando corretamente.

### Passo 3: Colocar o Projeto no Diretório `www`
1. Localize o diretório de instalação do WAMP (geralmente `C:\wamp\www`).
2. Coloque os arquivos do seu projeto PHP dentro dessa pasta.

### Passo 4: Acessar o Projeto
1. No navegador, acesse `http://localhost/nomedoprojeto`.
2. Se tudo estiver correto, seu projeto será carregado.

## 2. Rodando o Projeto PHP com XAMPP

### Passo 1: Baixar e Instalar o XAMPP
1. Acesse o site do [XAMPP](https://www.apachefriends.org/pt_br/index.html).
2. Baixe a versão apropriada para o seu sistema operacional.
3. Instale o XAMPP seguindo as instruções fornecidas.

### Passo 2: Iniciar o XAMPP
1. Abra o XAMPP e inicie os módulos Apache e MySQL (caso seu projeto precise de banco de dados).
2. O ícone do XAMPP no tray se tornará verde quando os serviços estiverem funcionando.

### Passo 3: Colocar o Projeto no Diretório `htdocs`
1. Navegue até o diretório de instalação do XAMPP (geralmente `C:\xampp\htdocs`).
2. Coloque os arquivos do seu projeto PHP dentro dessa pasta.

### Passo 4: Acessar o Projeto
1. No navegador, acesse `http://localhost/nomedoprojeto`.
2. O seu projeto será exibido.

## 3. Rodando o Projeto PHP com Docker

### Passo 1: Baixar e Instalar o Docker
1. Acesse o site do [Docker](https://www.docker.com/get-started) e baixe a versão do Docker para o seu sistema operacional.
2. Siga as instruções de instalação.

### Passo 2: Criar um `Dockerfile` para o Projeto PHP
1. Crie um arquivo chamado `Dockerfile` no diretório raiz do seu projeto.
2. O conteúdo do `Dockerfile` pode ser algo como:

```Dockerfile
# Usar a imagem do PHP com Apache
FROM php:8.0-apache

# Copiar os arquivos do projeto para o diretório raiz do Apache
COPY . /var/www/html/

# Habilitar mod_rewrite se necessário
RUN a2enmod rewrite
``` 

---

### Passo 3: Criar o Arquivo docker-compose.yml (opcional)

Para facilitar a configuração do Docker, crie um arquivo chamado docker-compose.yml no diretório do projeto:

```yaml
Copiar código
version: '3.8'
services:
  web:
    build: .
    ports:
      - "8080:80"
    volumes:
      - .:/var/www/html
    networks:
      - app_network

networks:
  app_network:
    driver: bridge
```
---
### Passo 4: Rodar o Projeto com Docker
Abra o terminal ou prompt de comando e navegue até o diretório do seu projeto.
Execute o comando para criar e rodar os containers:

```bash
Copiar código

docker-compose up --build

Passo 5: Acessar o Projeto

Abra o navegador e acesse http://localhost:8080.

O seu projeto PHP será exibido.
```

Conclusão
Agora você tem três formas diferentes de rodar um projeto PHP no seu computador: WAMP, XAMPP ou Docker.



