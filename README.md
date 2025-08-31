## Prints do Sistema

![Captura de tela](public/prints/Captura%20de%20tela%202025-08-31%20135238.png)

![Captura de tela](public/prints/Captura%20de%20tela%202025-08-31%20135321.png)

![Captura de tela](public/prints/Captura%20de%20tela%202025-08-31%20135357.png)

![Captura de tela](public/prints/Captura%20de%20tela%202025-08-31%20135252.png)

![Captura de tela](public/prints/Captura%20de%20tela%202025-08-31%20135332.png)

![Captura de tela](public/prints/Captura%20de%20tela%202025-08-31%20135414.png)

![Captura de tela](public/prints/Captura%20de%20tela%202025-08-31%20135311.png)

![Captura de tela](public/prints/Captura%20de%20tela%202025-08-31%20135343.png)

![Captura de tela](public/prints/Captura%20de%20tela%202025-08-31%20135428.png)

# Guia Rápido

Manual de Configuração e Execução do Projeto\
Siga os passos abaixo para configurar e executar o projeto:

## Requisitos do Projeto

1.  PHP: 8.4.12 (Certifique-se de que esta versão está instalada na sua
    máquina)
2.  Composer: Certifique-se de que o Composer está instalado na sua
    máquina para gerenciar as dependências do PHP\
3.  PostgreSQL: 17
4.  Laravel: 12
5.  NodeJS: 22.19.0
6.  PNPM: 10.15.0

**Nota:** Este projeto foi desenvolvido para ser executado utilizando
Docker, garantindo que todos os serviços necessários estejam em
containers. Quaisquer alterações na configuração padrão do projeto são
de responsabilidade do usuário, e o autor não se responsabiliza por
problemas decorrentes dessas modificações.

------------------------------------------------------------------------

### 1) Dependências PHP

``` bash
composer install
```

### 2) Containers

``` bash
./vendor/bin/sail up -d
```

### 3) Frontend

``` bash
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
```

### 4) Banco de dados

``` bash
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan db:seed
```

### 5) Testes

``` bash
./vendor/bin/sail test
```

------------------------------------------------------------------------

## Comandos Úteis

### Subir / parar / logs

``` bash
./vendor/bin/sail up -d
./vendor/bin/sail down
./vendor/bin/sail logs -f
```

------------------------------------------------------------------------

## Dicas Rápidas

-   "sail: command not found" → use `./vendor/bin/sail`\
-   Portas em uso (ex.: 5432) → ajuste no `docker-compose.yml` ou pare o
    serviço local.
