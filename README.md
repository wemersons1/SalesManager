# Adoorei Teste

## Como instalar

Softwares obrigatórios:
- PHP 8.1
- Composer 2
- Docker
- docker-compose

Apesar do sistema rodar no docker para poder iniciar o sistema é necessário ter o PHP 8.1 e o composer 2 instalados.
Este software é executado com a ajuda do [Laravel Sail](https://laravel.com/docs/10.x/sail#main-content). Depois de ter todo o software necessário instalado, você deve criar um
alias para Laravel Sail, ele pode ser encontrado neste artigo [Configurando um alias de shell](https://laravel.com/docs/10.x/sail#configurando-a-shell-alias).

Dentro da pasta raiz do projeto você deve executar `composer install` seguido de `sail up`. Esses dois comandos irão
instale todas as dependências e crie os contêineres docker.

Você está pronto para rodar agora.

Resumindo:
- Instale o software necessário
- `composer install`
- `sail up`
