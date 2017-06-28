Trabalho de faculdade para gerar personagens de modo procedural.

Alunos:
Pedro Toupitzen Specian - nºUSP: 8082640
João Pedro Moura - nºUSP: 7971622

Set-up:

Para instalar o sistema, é necessário:

1-criar um banco de dados MySQL com o nome 'solucoes_web'. O usuário e senha do banco devem ser, respectivamente, 'root' e ''. (Obs.: caso não seja possível alterar esses dados, basta alterar os conteúdos de DB_USERNAME e DB_PASSWORD do arquivo .env)
2-executar os seguintes comandos (na ordem que se segue):
2.1-composer install
2.2-php artisan migrate
2.3-php artisan db:seed