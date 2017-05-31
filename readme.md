# Teste-Atividades

- Aplicação feita para teste

## Pré-requisitos

- [MySQL](https://www.mysql.com)
- [PHP](https://secure.php.net/)
- [Node](https://nodejs.org/en/)
- [Gulp](http://gulpjs.com/)
- [Bower](https://bower.io/)

## Passos

- Clone a aplicação com `git clone https://github.com/jjonathan/teste-atividades.git`;
- Realize todas as configurações necessárias de banco de dados no arquivo [database.php](/application/config/database.php);
- Rode o commando `npm install` para instalar todos os pacotes necessários para rodar (para utilização do gulp);
- Acesse a pasta [assets](/asssets) e rode o comando `bower install` para instalar todas as dependências do front (jquery, bootstrap...);
- Acesse a pasta raíz do projeto e rode o commando `gulp` para compilar todos os arquivos necessários;
- O arquivo para geração das tabelas do banco de dados está na pasta [src/create_statement.sql](src/create_statement.sql).