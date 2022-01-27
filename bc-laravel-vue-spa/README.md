
## Setup
docker run --rm -v $(pwd):/app composer/composer install --ignore-platform-req=ext-gd  
vendor/bin/sail up  
vendor/bin/sail artisan migrate  
vendor/bin/sail artisan db:seed --class="PocketNameSeeder"  
