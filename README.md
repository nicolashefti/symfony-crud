# Product

## Start

```bash
docker-compose up
```

Website should be accessible under localhost:1006

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