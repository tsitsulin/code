targets = src example

.PHONY: psalm
psalm:
	docker exec -it github-code bash -c "php vendor/bin/psalm"

.PHONY: cs
cs:
	docker exec -it github-enum bash -c "php tools/php-cs-fixer/vendor/bin/php-cs-fixer --rules=@PSR12 --dry-run fix src" \
	docker exec -it github-enum bash -c "php tools/php-cs-fixer/vendor/bin/php-cs-fixer --rules=@PSR12 --dry-run fix tests/unit"

.PHONY: lint
lintStandard = 'PSR1,PSR2,PSR12,tools/phpcs/custom_rules.xml'
lint:
	docker exec -it github-enum bash -c "php vendor/bin/phpcs --standard=$(lintStandard) -s $(targets)"

.PHONY: fix
fix:
	docker exec -it github-enum bash -c "php vendor/bin/phpcbf --standard=$(lintStandard) $(targets)"

.PHONY: stan
stan:
	docker exec -it github-code bash -c "php vendor/bin/phpstan analyse --level 9 $(targets)"

.PHONY: test
test:
	docker exec -it github-enum bash -c "php vendor/bin/codecept run"

.PHONY: up
up:
	docker-compose up -d --force-recreate

.PHONY: down
down:
	docker-compose down
