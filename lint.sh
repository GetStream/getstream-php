#!/bin/bash

set -e

echo "Running PHP linting and formatting..."

# Run PHP CS Fixer for code formatting
if [ -f ".php-cs-fixer.php" ]; then
    echo "Running PHP CS Fixer..."
    ./vendor/bin/php-cs-fixer fix --config=.php-cs-fixer.php
else
    echo "Warning: .php-cs-fixer.php not found, skipping code formatting"
fi

# Run PHPStan for static analysis
if [ -f "phpstan.neon" ]; then
    echo "Running PHPStan static analysis..."
    ./vendor/bin/phpstan analyse --no-progress
else
    echo "Warning: phpstan.neon not found, skipping static analysis"
fi

# Check for syntax errors
echo "Checking PHP syntax..."
find src/ tests/ -name "*.php" -type f -exec php -l {} \; | grep -v "No syntax errors detected" || true

echo "Linting completed successfully!"

