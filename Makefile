# GetStream PHP SDK Makefile

.PHONY: help install test test-unit test-integration lint fix-style analyze clean generate

help: ## Show this help message
	@echo 'Usage: make [target]'
	@echo ''
	@echo 'Targets:'
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_-]+:.*?## / {printf "  %-15s %s\n", $$1, $$2}' $(MAKEFILE_LIST)

install: ## Install dependencies
	composer install

test: test-unit test-integration ## Run all tests

test-unit: ## Run unit tests only
	./vendor/bin/phpunit tests --exclude-group integration

test-integration: ## Run integration tests only
	./vendor/bin/phpunit tests/Integration/

test-specific: ## Run a specific test (usage: make test-specific TEST=TestClassName::testMethodName)
	./vendor/bin/phpunit --filter $(TEST)

lint: ## Run code quality checks
	./vendor/bin/phpstan analyse
	./vendor/bin/php-cs-fixer check

fix-style: ## Fix code style issues
	./vendor/bin/php-cs-fixer fix

analyze: ## Run static analysis
	./vendor/bin/phpstan analyse

clean: ## Clean generated files and cache
	rm -rf vendor/
	rm -rf .php-cs-fixer.cache
	rm -f composer.lock

generate: ## Generate code from OpenAPI spec
	./generate.sh

setup-env: ## Copy .env.example to .env (you'll need to fill in your credentials)
	cp .env.example .env
	@echo "Don't forget to update .env with your actual GetStream credentials!"

# Development helpers
dev-setup: install setup-env ## Complete development setup
	@echo "Development environment setup complete!"
	@echo "Next steps:"
	@echo "1. Edit .env with your GetStream API credentials"
	@echo "2. Run 'make test-unit' to verify unit tests pass"
	@echo "3. Run 'make test-integration' to test against the live API"
