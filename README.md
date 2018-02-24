# Symfony 4 - CRUD

[![Build Status](https://travis-ci.org/nicolashefti/symfony4-crud.svg?branch=master)](https://travis-ci.org/nicolashefti/symfony4-crud)

## Setup

- Clone the repo
- Copy .env.dist to .env
- Install vendors (recommanded inside Docker image)
  - Start Docker container: ```docker-compose up```
  - Jump into the container: ```./bin/bash```
  - Install vendors: ```composer install```
  - Create database: ```php bin/console doctrine:database:create```
  - Launch migrations: ```php bin/console doctrine:migrations:migrate

## Start

```bash
docker-compose up
```

The application should be accessible under localhost:1006

## Dev

### Tools

The project include a few useful commands:

Jump into Docker container:

```bash
./bin/bash
```

Code style check:

```bash
./bin/phpcs
```

Code style fix:

```bash
./bin/phpcbf
```

Symfony console (recommended inside Docker)

```bash
./bin/console
```

### Migration

```bash
# Create the migration
php bin/console doctrine:migrations:diff

# Migrate
php bin/console doctrine:migrations:migrate
```

## Devops

### Docker

```bash
# In ./config/docker
docker build -t nicolashefti/symfony-crud .
```
