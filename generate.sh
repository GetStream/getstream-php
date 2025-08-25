#!/usr/bin/env bash

DST_PATH=`pwd`
SOURCE_PATH=../chat

if [ ! -d $SOURCE_PATH ]
then
  echo "cannot find chat path on the parent folder (${SOURCE_PATH}), do you have a copy of the API source?";
  exit 1;
fi

# Check if composer is available
if ! composer --version &> /dev/null
then
  echo "cannot find composer in path, did you setup this repo correctly?";
  exit 1;
fi

set -ex

# cd in API repo, generate new spec and then generate code from it
( cd $SOURCE_PATH ; make openapi ; go run ./cmd/chat-manager openapi generate-client --language php --spec ./releases/v2/serverside-api.yaml --output $DST_PATH )

# Fix any potential issues in generated code
echo "Applying PHP-specific fixes..."

sed -i '' '/public ?string $role = null,/{N;s/public ?string $role = null,\n        public ?string $role = null,/public ?string $role = null,/;}' src/GeneratedModels/CallParticipant.php

# Fix queryUsers method to use proper namespace and required parameter
sed -i '' 's/QueryUsersPayload \$payload/GeneratedModels\\QueryUsersPayload \$payload/' src/Generated/CommonClient.php

# Run PHP CS Fixer to ensure code style compliance
if [ -f ".php-cs-fixer.php" ]; then
    echo "Running PHP CS Fixer..."
    ./vendor/bin/php-cs-fixer fix --config=.php-cs-fixer.php || echo "PHP CS Fixer completed with warnings"
fi

# Run PHPStan to check for any issues
if [ -f "phpstan.neon" ]; then
    echo "Running PHPStan analysis..."
    ./vendor/bin/phpstan analyse --no-progress || echo "PHPStan completed with warnings"
fi

# Update composer autoloader for new classes
echo "Updating composer autoloader..."
composer dump-autoload

echo "Generated PHP SDK for feeds in $DST_PATH"
echo ""
echo "Next steps:"
echo "1. Review generated files in src/Models/, src/Requests/, and src/Generated/"
echo "2. Update your Client.php to include: use GetStream\\Generated\\ClientMethods;"
echo "3. Update your Feed.php to include: use GetStream\\Generated\\FeedMethods;"
echo "4. Run tests: ./vendor/bin/phpunit"
echo ""
echo "See CODEGEN_INTEGRATION.md for detailed integration instructions."

