FROM php:8.4-cli-bookworm

WORKDIR /var/www/html

ENV APP_ENV=production
ENV APP_DEBUG=false
ENV PORT=10000

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    nodejs \
    npm \
    libicu-dev \
    libonig-dev \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    pkg-config \
    zlib1g-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        gd \
        bcmath \
        exif \
        intl \
        mbstring \
        zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar TODO el proyecto
COPY . .

# Crear .env si no existe
RUN if [ ! -f .env ]; then cp .env.example .env; fi

# Instalar dependencias PHP
RUN composer install \
    --no-dev \
    --prefer-dist \
    --optimize-autoloader \
    --no-interaction

# Instalar dependencias Node
RUN npm ci

# Compilar Vite
RUN npm run build

# Generar APP_KEY
RUN php artisan key:generate --force

# Optimizar Laravel
RUN php artisan storage:link || true
RUN php artisan config:clear
RUN php artisan route:clear
RUN php artisan view:clear
RUN php artisan cache:clear
RUN php artisan config:cache
RUN php artisan route:cache

EXPOSE 10000

CMD ["sh","-c","php artisan serve --host=0.0.0.0 --port=${PORT}"]