.PHONY=dev-up
dev-up:
	docker compose up -d && npm run dev &

.PHONY=dev-stop
dev-stop:
	docker compose stop

.PHONY=dev-restart
dev-restart:
	docker compose stop && make dev-up

.PHONY=build-static
build-static:
	rm -rf build/
	docker build -t filebrowser -f static-build.Dockerfile .
	docker create --name filebrowser-tmp filebrowser
	docker cp filebrowser-tmp:/go/src/app/dist/frankenphp-linux-x86_64 filebrowser
	docker rm filebrowser-tmp
	mkdir build
	mv filebrowser build/
