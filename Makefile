up:
	cp .env.example .env
	docker-compose up -d

down:
	docker-compose down

build:
	docker-compose build --no-cache

install:
	docker-compose run --rm app composer install
	docker-compose run --rm app php artisan key:generate
	docker-compose run --rm app php artisan migrate --seed
