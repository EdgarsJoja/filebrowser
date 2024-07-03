.PHONY=dev-up
dev-up:
	docker compose up -d && npm run dev

.PHONY=dev-stop
dev-stop:
	docker compose stop

.PHONY=dev-restart
dev-restart:
	docker compose stop && make dev-up

.PHONY=dev-ssh
dev-ssh:
	docker exec -it filebrowser.dev bash

.PHONY=build-static
build-static:
	rm -rf build/
	docker buildx build --platform=linux/amd64 -t filebrowser-amd64 -f static-build.Dockerfile .
	docker buildx build --platform=linux/arm64 -t filebrowser-arm64 -f static-build.Dockerfile .
	docker create --name filebrowser-amd64-tmp filebrowser-amd64
	docker create --name filebrowser-arm64-tmp filebrowser-arm64
	docker cp filebrowser-amd64-tmp:/go/src/app/dist/frankenphp-linux-x86_64 filebrowser-x86_64
	docker cp filebrowser-arm64-tmp:/go/src/app/dist/frankenphp-linux-aarch64 filebrowser-aarch64
	docker rm filebrowser-amd64-tmp filebrowser-arm64-tmp
	mkdir build
	mv filebrowser-x86_64 filebrowser-aarch64 build/
