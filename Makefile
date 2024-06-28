.PHONY=dev-up
dev-up:
	docker compose up -d && npm run dev &

.PHONY=dev-stop
dev-stop:
	docker compose stop
