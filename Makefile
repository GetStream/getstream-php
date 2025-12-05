# GetStream PHP SDK Makefile

.PHONY: help install test test-unit test-integration lint lint-fix phpstan phpstan-baseline phpstan-clear-cache cs-check cs-fix cs-dry-run quality ci clean generate

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

lint: ## Run all available code quality checks
	@echo "🔍 Running PHPStan static analysis..."
	./vendor/bin/phpstan analyse --memory-limit=512M
	@echo "✅ PHPStan analysis complete"
	@if [ -f "./vendor/bin/php-cs-fixer" ]; then \
		echo ""; \
		echo "🎨 Checking code style..."; \
		./vendor/bin/php-cs-fixer check --diff; \
		echo "✅ Code style check complete"; \
	else \
		echo ""; \
		echo "ℹ️  php-cs-fixer not installed. Run 'composer require --dev friendsofphp/php-cs-fixer' to enable code style checks."; \
	fi

lint-fix: ## Run linting and fix issues automatically
	@if [ -f "./vendor/bin/php-cs-fixer" ]; then \
		echo "🔧 Fixing code style issues..."; \
		./vendor/bin/php-cs-fixer fix; \
		echo "✅ Code style fixes applied"; \
		echo ""; \
	fi
	@echo "🔍 Running PHPStan analysis..."
	./vendor/bin/phpstan analyse --memory-limit=512M
	@echo "✅ Linting complete"

phpstan: ## Run PHPStan static analysis only
	./vendor/bin/phpstan analyse --memory-limit=512M

phpstan-baseline: ## Generate PHPStan baseline (ignore current errors)
	./vendor/bin/phpstan analyse --generate-baseline --memory-limit=512M

phpstan-clear-cache: ## Clear PHPStan cache
	./vendor/bin/phpstan clear-result-cache

cs-check: ## Check code style without fixing (requires php-cs-fixer)
	@if [ -f "./vendor/bin/php-cs-fixer" ]; then \
		./vendor/bin/php-cs-fixer check --diff; \
	else \
		echo "❌ php-cs-fixer not installed. Run: composer require --dev friendsofphp/php-cs-fixer"; \
		exit 1; \
	fi

cs-fix: ## Fix code style issues (requires php-cs-fixer)
	@if [ -f "./vendor/bin/php-cs-fixer" ]; then \
		./vendor/bin/php-cs-fixer fix; \
	else \
		echo "❌ php-cs-fixer not installed. Run: composer require --dev friendsofphp/php-cs-fixer"; \
		exit 1; \
	fi

cs-dry-run: ## Preview code style fixes without applying (requires php-cs-fixer)
	@if [ -f "./vendor/bin/php-cs-fixer" ]; then \
		./vendor/bin/php-cs-fixer fix --dry-run --diff; \
	else \
		echo "❌ php-cs-fixer not installed. Run: composer require --dev friendsofphp/php-cs-fixer"; \
		exit 1; \
	fi

quality: ## Run comprehensive quality checks (lint + tests)
	@echo "🚀 Running comprehensive quality checks..."
	@echo ""
	$(MAKE) lint
	@echo ""
	@echo "🧪 Running tests..."
	$(MAKE) test-unit
	@echo ""
	@echo "🎉 All quality checks passed!"

ci: quality ## Alias for quality (CI-friendly)

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

