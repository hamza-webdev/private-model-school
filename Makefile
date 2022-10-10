start:
	docker-compose down
	printf "\033[1;34m === docker compose down ==== \033[0m"
	docker-compose up -d
	printf "\033[1;34m === docker compose start creation containes ==== \033[0m"
	symfony server:start -d
	printf "\033[1;34m === Server symfony is starting ==== \033[0m"
	symfony open:local
	printf "\033[1;34m === browser opening ==== \033[0m"
	symfony console doctrine:database:create --if-not-exists -n
	symfony console make:migration -n
	symfony console doctrine:migrations:migrate -n
	printf "\033[1;34m === doctrine migrations migrate ==== \033[0m"
	symfony console doctrine:fixture:load -n
	printf "\033[1;34m === ajout des datas ds database fixture ==== \033[0m"
	printf "\033[1;32mThe Application MPS is running successfully to \033[0m"


.PHONY: start


exp:
	printf "\033[1;34m ===Success==== \033[0m"

.PHONY: exp
