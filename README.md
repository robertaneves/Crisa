# 🛍️ Loja Crisa - E-commerce de Moda Feminina

Este repositório contém o código-fonte do projeto de e-commerce da Loja Crisa, uma plataforma completa para a venda de roupas e acessórios femininos, construída com tecnologias modernas e robustas.

## ✨ Sobre o Projeto

A Loja Crisa é um projeto de e-commerce full-stack que visa oferecer uma experiência de compra online fluida e segura. A plataforma foi desenvolvida utilizando o framework **Laravel** para o back-end e **Node.js** para tarefas assíncronas, com um front-end moderno e responsivo construído com **Tailwind CSS** e **Alpine.js**.

O foco do projeto é criar um sistema completo, desde a autenticação do usuário até a gestão de seu perfil e, futuramente, o gerenciamento de produtos, carrinho de compras e finalização de pedidos.

## 🚀 Tecnologias Utilizadas

- **Back-end:**
  - [Laravel](https://laravel.com/) (PHP)
  - [Node.js](https://nodejs.org/) (para compilação de assets com Vite)
- **Front-end:**
  - [Tailwind CSS](https://tailwindcss.com/)
  - [Alpine.js](https://alpinejs.dev/)
  - Blade Templates
- **Banco de Dados:**
  - MySQL (ou outro de sua preferência, como PostgreSQL)
- **Ferramentas:**
  - [Vite](https://vitejs.dev/)
  - [Composer](https://getcomposer.org/)
  - [NPM](https://www.npmjs.com/)

## ✅ Funcionalidades Implementadas

Atualmente, o projeto conta com as seguintes funcionalidades:

- **Autenticação de Usuário Completa:**
  - **Cadastro de Clientes:** Formulário completo com validação de dados.
  - **Login e Logout:** Sistema de sessão seguro.
  - **Recuperação de Senha:** Fluxo de "Esqueci minha senha" com envio de link por e-mail.
- **Painel do Cliente ("Minha Conta"):**
  - **Visualização de Dados Pessoais:** Página que exibe as informações do usuário.
  - **Edição de Dados Pessoais:** Interface interativa (com modo de visualização e edição) para o cliente atualizar suas informações.
  - **Gerenciamento de Endereço:** Seção dedicada para o cliente visualizar e atualizar seu endereço de entrega.
- **Páginas Institucionais:**
  - Página "Sobre Nós" com a história da marca.
  - Estrutura para "Política de Privacidade" e "Termos de Uso".

## ⚙️ Instalação e Configuração

Siga os passos abaixo para configurar o ambiente de desenvolvimento localmente.

**Pré-requisitos:** PHP, Composer, Node.js, NPM e um servidor de banco de dados (ex: MySQL).

1.  **Clone o repositório:**
    ```bash
    git clone [https://github.com/seu-usuario/loja-crisa.git](https://github.com/seu-usuario/loja-crisa.git)
    cd loja-crisa
    ```

2.  **Instale as dependências do PHP:**
    ```bash
    composer install
    ```

3.  **Instale as dependências do Node.js:**
    ```bash
    npm install
    ```

4.  **Configure o ambiente:**
    - Copie o arquivo de exemplo `.env.example` para `.env`.
      ```bash
      cp .env.example .env
      ```
    - Gere uma chave de aplicação para o Laravel.
      ```bash
      php artisan key:generate
      ```
    - Configure as credenciais do seu banco de dados no arquivo `.env`.
      ```
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=loja_crisa
      DB_USERNAME=root
      DB_PASSWORD=
      ```

5.  **Execute as migrações do banco de dados:**
    ```bash
    php artisan migrate
    ```

6.  **Compile os assets e inicie o servidor de desenvolvimento:**
    - Em um terminal, rode o Vite para compilar o front-end em tempo real.
      ```bash
      npm run dev
      ```
    - Em outro terminal, inicie o servidor do Laravel.
      ```bash
      php artisan serve
      ```

7.  **Acesse a aplicação:**
    Abra seu navegador e acesse [http://127.0.0.1:8000](http://127.0.0.1:8000).

## 🔮 Próximos Passos (Roadmap)

- [ ] Catálogo de Produtos (listagem, filtros e página de detalhes).
- [ ] Carrinho de Compras.
- [ ] Processo de Checkout e Integração com Gateway de Pagamento.
- [ ] Histórico de Pedidos no painel do cliente.
- [ ] Painel Administrativo para gerenciamento de produtos e pedidos.

## ✍️ Autor

**[Seu Nome Completo]**

- GitHub: `[@seu-usuario](https://github.com/seu-usuario)`
- LinkedIn: `[Seu Nome](https://www.linkedin.com/in/seu-perfil)`

---
*Este projeto foi desenvolvido como parte de [descreva o contexto, ex: um projeto pessoal, estudo, etc.].*
