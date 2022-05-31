# bolsa-empleo-back
Prueba técnica back
## Tecnologías

- Laravel v8.12 (php),

## Pre-Requisitos
- docker
- docker compose

Para realizar pruebas, se debe de correr los siguientes comandos:

- Clonar el repositorio 
- docker-compose up -d

El aplicativo queda expuesto en el 80 y la base de datos externamente escucha en el 5536

## Ejemplos de consultas API

- http://localhost/api/login (POST)
- http://localhost/api/users/registro (POST)
- http://localhost/api/users/index (GET)
- http://localhost/api/users/oferta-laboral/registro (POST)

## Ejemplos de archivo .env
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:1o5L1dEuAg4ltGKZEIx9twuFr0BjWrvJSkgpMtVbkt8=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

# Datos para docker

DB_CONNECTION=pgsql
DB_HOST=psqlbolsaempleo
DB_PORT=5432
DB_DATABASE=bolsa_empleo
DB_USERNAME=bolsaEmpleoUser
DB_PASSWORD=b0ls4Empl30

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

JWT_SECRET=cjg1iHrfPe1Pimgveu5ZCHjfoTPHrjWeK7asbNaPumPAyqMCvikq8ZuCxCnhF3ak
```
