FROM --platform=linux/arm64 dunglas/frankenphp:static-builder AS base

ENV NO_COMPRESS=true

# Copy your app
WORKDIR /go/src/app/dist/app
COPY . .

# Remove the tests and other unneeded files to save space
# Alternatively, add these files to a .dockerignore file
RUN rm -Rf tests/

# Copy .env file
RUN cp .env.example .env
# Change APP_ENV and APP_DEBUG to be production ready
#RUN sed -i'' -e 's/^APP_ENV=.*/APP_ENV=production/' -e 's/^APP_DEBUG=.*/APP_DEBUG=false/' .env

# Make other changes to your .env file if needed

# Install the dependencies
RUN composer install --ignore-platform-reqs --no-dev -a

FROM node:20.15.0-slim AS builder

RUN mkdir build
WORKDIR /build

COPY --from=base /go/src/app/dist/app/package.json .
COPY --from=base /go/src/app/dist/app/package-lock.json .
COPY --from=base /go/src/app/dist/app/vite.config.js .
COPY --from=base /go/src/app/dist/app/tailwind.config.js .
COPY --from=base /go/src/app/dist/app/postcss.config.js .
COPY --from=base /go/src/app/dist/app/resources ./resources

RUN npm ci
RUN npm run build

FROM base

COPY --from=builder /build/node_modules/ ./node_modules
COPY --from=builder /build/public/build ./public/build

# Build the static binary
WORKDIR /go/src/app/
RUN EMBED=dist/app/ \
    FRANKENPHP_VERSION=1.2.1 \
     ./build-static.sh
