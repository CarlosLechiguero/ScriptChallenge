start: ## Start containers
	docker-compose up -d

stop: ## Stop containers
	docker-compose stop

shell: ## Enter to php container
	docker-compose exec php /bin/sh

clean-docker: ## Remove containers, network, images and volumes
	docker-compose down --rmi all --volumes --remove-orphans

log: container=php
log: ## Docker log
	docker-compose logs $(container)

install: ## Install dependencies
	docker-compose run --rm composer install

dump-autoload: ## Dump autoload from Composer
	docker-compose run --rm composer dump-autoload

cc: env=dev
cc: ## Clear cache
	docker-compose exec php bin/console c:c -e $(env)

u-tests: ## Pass unitary tests
	docker-compose exec php vendor/bin/phpunit $(args)
