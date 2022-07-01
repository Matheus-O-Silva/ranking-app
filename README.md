# Ranking de Tempo Assistido

## Requisitos:
-  Docker
-  Git

## Subir a API
Para testar o projeto, siga os passos descritos abaixo

### Clone do Repositório
```sh
git clone https://github.com/Matheus-O-Silva/ranking-app.git
```

acesse o diretório ranking-app
```sh
cd ranking-app
```
### Instale as dependências com o comando:
```sh
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

### Crie o Arquivo .env
```sh
cp .env.example .env
```

### Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_NAME=Laravel
APP_URL=http://localhost:8888

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=ranking_app
DB_USERNAME=sail
DB_PASSWORD=password

CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```
### Subindo os containers do projeto

```sh
./vendor/bin/sail up -d
```

Gerar a key do projeto Laravel
```sh
./vendor/bin/sail artisan key:generate
```

### Rode as migrations abaixo para criar a estrutura do banco
```sh
./vendor/bin/sail artisan migrate
```

### Rode os comandos abaixo para popular as tabelas do banco:
```sh
./vendor/bin/sail artisan db:seed --class=UserSeeder
./vendor/bin/sail artisan db:seed --class=ChannelSeeder
./vendor/bin/sail artisan db:seed --class=WatchedTimeSeeder
```

### Acessando o banco 
Para acessar o banco utilizando algum gerenciador, utilize a configuração abaixo:
```sh
Hostname: localhost
```
```sh
Port: 3388
```
```sh
User: sail
```
```sh
Password: password
```

### Acesse o Ranking Agrupado por canais pelo endpoint:
[http://localhost:8888/channels-ranking](http://localhost:8888/channels-ranking)

### Acesse o Ranking ordenado por Usuários pelo endpoint:
[http://localhost:8888/users-ranking](http://localhost:8888/users-ranking)

### A posição no Ranking de cada usuário está no campo 'place' dos objetos retornados
