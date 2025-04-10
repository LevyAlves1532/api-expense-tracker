![Logo do projeto](https://github.com/LevyAlves1532/model-portfolio/blob/master/readme/hero.jpg)

## API Expense Tracker
A API do Expense Tracker foi inspirada em um projeto de controle financeiro originalmente desenvolvido em Node.js pelo canal Time To Program. Esta versão em Laravel foi construída com foco na aprendizagem pessoal, proporcionando uma transição valiosa para o desenvolvimento de APIs com Laravel. O Expense Tracker permite gerenciar receitas e despesas de forma eficiente, oferecendo insights detalhados sobre os gastos mensais. É uma ferramenta poderosa para controle financeiro pessoal, adaptada com as funcionalidades e estrutura robusta do framework Laravel.

## Referência
[Aula que assistir - Build a Full-Stack MERN Expense Tracker | React, Node.js, MongoDB, Express | MERN Project - Canal Time To Program](https://www.youtube.com/watch?v=PQnbtnsYUho)

## Tecnologias

Tecnologias usadas no projeto:

  * PHP 8.2.12
  * Laravel 12.0.0
  * Composer 2.8.4

## Serviços Usados

É necessário haver um banco de dados MySQL, para pode ter um armazenamento de dados da API.

## Para Iniciar

  * Ambiente:
    - Ter o PHP na versão 8.2.12 ou superior
    - Ter o Composer na versão 2 ou superior
  
  * Executar Projeto:
    - Instale as dependencias do projeto com o seguinte comando: `composer install`
    - Copie e cole na raiz do projeto o arquivo `.env.example` e renomeie a cópia para `.env`
    - Gere uma chave para o seu projeto Laravel com o seguinte comando: `php artisan key:generate`
    - Gere um token jwt com o seguinte comando: `php artisan jwt:secret` caso ele faça alguma pergunta digite/selecione `yes`
    - Conectar-se a um banco de dados MySQl:
      ```
        DB_CONNECTION=mysql
        DB_HOST=localhost
        DB_PORT=3306
        DB_DATABASE=laravel_expense_tracker
        DB_USERNAME=root
        DB_PASSWORD=root
      ```
    - Logo após roda o comando: `php artisan migrate`, ele vai criar todas as tabelas do projeto no banco de dados
    - Para iniciar o projeto: `php artisan serve`
    - Depois só abrir a URL do site e cole no `APP_URL` do `.env`

## Como usar?

Rotas

* `/auth/login` (POST) => Login de usuário
* `/auth/register` (POST) => Registra um novo usuário
* `/auth/me` (GET) => Pega informação do usuário logado
* `/dashboard/data` (GET) => Pega informações gerais sobre as transações da conta
* `/income/` (GET) => Mostra todas as rendas do usuário logado
* `/income/` (POST) => Adiciona um nova renda
* `/income/{id}` (DELETE) => Deleta uma renda
* `/income/{user_id}/download` (GET) => Baixa um relatório de renda referente ao usuário
* `/expense/` (GET) => Mostra todas as despesas do usuário logado
* `/expense/` (POST) => Adiciona um nova despesa
* `/expense/{id}` (DELETE) => Deleta uma despesa
* `/expense/{user_id}/download` (GET) => Baixa um relatório de despesas referente ao usuário

## Links

  * Repositorio: https://github.com/LevyAlves1532/api-expense-tracker
    - Caso você encontre algum bug, ou tenha dúvidas sobre o projeto, entre em contato levy.pereiraA1532@gmail.com, desde já agradeço pela atenção!

  ## Versão do Projeto

  1.0.0

  ## Autor do Projeto

  * **Lêvy Pereira Alves**

  Siga o github e junte-se a nós!
  Obrigado por me visitar e boa codificação!
