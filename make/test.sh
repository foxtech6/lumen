docker exec -it $(docker ps -f name=php --format "{{.ID}}") vendor/phpunit/phpunit/phpunit
