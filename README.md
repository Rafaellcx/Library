## About

Mini Project created to study some items like Contracts, factories, seeders, dependency injection, docker and Swagger in Laravel 8.

## Solution

Made using the Laravel 8 framework, MySQL database, Docker for application containerization and Swagger for APIS visualization and testing.

## How to run the project

After downloading the **library** repository, being in its main folder, go up the structure composed of the following containers:

- **api-library-back:** Composed with Apache and PHP, being exposed to port `8001`;
- **api-library-db:** With the MySql database.

1) Create the .env file from the .env.example file contained in the project root:
```sh
  cp .env.example .env
```
2) Through the following command:
```sh 
docker-compose up --build
```
After finishing the creation of the containers, we must execute the commands below so that the environment is ready to be used:

1. Used to populate the database with the necessary tables of the solution:
   ```sh 
   docker exec -ti api-m2-back php artisan migrate
   ```
   
Now we can use the application through the address "http://127.0.0.1:8001/api/documentation"
If you want to run the application later, check if the `api-library-back` container is active
executing the following command (Remembering that the same can/must be applied to the container
from the database):

```sh
docker container ls -a
```
If you want to start the `api-library-back` container, run the following command:
```sh
docker container start api-library-back
```
If you want to stop the `api-library-back` container, run the following command:
```sh
docker container stop api-library-back
```
