docker exec -it $(docker ps -f name=php --format "{{.ID}}") composer install
