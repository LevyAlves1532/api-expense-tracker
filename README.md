![Imagem inicial do projeto](https://github.com/LevyAlves1532/api-expense-tracker/blob/master/readme/register.jpg)

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
    - Copie e cole na raiz do projeto o arquivo `.env.example` e renomeie a cópia para `.env`
    - Instale as dependencias do projeto com o seguinte comando: `composer install`
    - Execute o comando `./vendor/bin/sail up -d` para iniciar o projeto com o docker<br/>
    *Observação caso você queira mudar as portas em que os containers vão iniciar entre no arquivo `.env`*
    - Logo após rode o comando o `./vendor/bin/sail composer install`, após o `./vendor/bin/sail composer update` para atualizar as depêndencias e após o `./vendor/bin/sail composer du` para limpar o cache do composer
    - Gere uma chave para o seu projeto Laravel com o seguinte comando: `./vendor/bin/sail art key:generate`
    - Logo após roda o comando: `./vendor/bin/sail art migrate`, ele vai criar todas as tabelas do projeto no banco de dados
    - Gere um token jwt com o seguinte comando: `./vendor/bin/sail art jwt:secret` caso ele faça alguma pergunta digite/selecione `yes`
    - A partir desse ponto seu projeto Laravel já estará funcionando, caso não tenha mudado a porta esse será o link:<br />
    [*Localhost*](http://localhost/)

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

[Download Postman Collection](https://github.com/LevyAlves1532/api-expense-tracker/blob/master/readme/expense_tracker_api.postman_collection)
[Repositório do Frontend](https://github.com/LevyAlves1532/expense-tracker)

# Imagens do Projeto
![Rota de cadastro](https://github.com/LevyAlves1532/api-expense-tracker/blob/master/readme/register.jpg)
![Rota para consultar meus dados](https://github.com/LevyAlves1532/api-expense-tracker/blob/master/readme/me.jpg)
![Rota de visualização das rendas](https://github.com/LevyAlves1532/api-expense-tracker/blob/master/readme/get_all_income.jpg)
![Rota de visualização das despesas](https://github.com/LevyAlves1532/api-expense-tracker/blob/master/readme/get_all_expense.jpg)
![Rota de visualização de dados gerais](https://github.com/LevyAlves1532/api-expense-tracker/blob/master/readme/get_dashboard_data.jpg)

## Links

  * Repositorio: https://github.com/LevyAlves1532/api-expense-tracker
    - Caso você encontre algum bug, ou tenha dúvidas sobre o projeto, entre em contato levy.pereiraA1532@gmail.com, desde já agradeço pela atenção!

  ## Versão do Projeto

  1.0.0

  ## Autor do Projeto

  * **Lêvy Pereira Alves**

  Siga o github e junte-se a nós!
  Obrigado por me visitar e boa codificação!
