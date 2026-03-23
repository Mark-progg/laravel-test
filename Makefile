up:
	cp .env.example .env
	docker compose up -d

down:
	docker compose down

build:
	docker compose build --no-cache

init:
	docker compose run app git config --global --add safe.directory /var/www/html
	docker compose run app composer install
	docker compose run app php artisan key:generate

migrate:
	docker compose run app php artisan migrate --seed
