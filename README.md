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
