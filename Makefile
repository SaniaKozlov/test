.PHONY: setup build run
.SILENT: ip host

install: set-env setup build run update laravel-setup

setup:
	which docker-compose || sudo curl -L https://github.com/docker/compose/releases/download/1.24.0/docker-compose-`uname -s`-`uname -m` -o /usr/local/bin/docker-compose;
	which docker-compose || sudo chmod +x /usr/local/bin/docker-compose

build:
	docker-compose   build

clean:
	docker-compose   down

stop: clean

logs:
	docker-compose    logs -f;

run: 
	docker-compose   up -d

workspace:
	docker-compose   exec  php-fpm  bash

restart: clean run

laravel-setup:
	docker-compose exec -T php-fpm  php artisan key:generate || echo done
	docker-compose exec -T php-fpm  php artisan storage:link || echo done
	docker-compose exec -T php-fpm  php artisan data:import || echo done

migrate:
	docker-compose exec -T php-fpm  php artisan migrate || echo done

ide-helper:
	docker-compose exec -T php-fpm  composer dev-update || echo done

composer:
	docker-compose exec -T php-fpm  composer install || echo done

ps:
	docker-compose ps

clear-cache:
	docker-compose exec -T php-fpm php artisan clear:cache || echo done


update: composer clear-cache migrate ide-helper

set-env:
	[ -f project/.env ] || cp project/.env.example project/.env

