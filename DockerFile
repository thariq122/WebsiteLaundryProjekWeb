# Menggunakan image PHP 8.2 resmi
FROM php:8.2-cli

# Install package yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    zip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    nodejs \
    npm

# Install ekstensi PHP
RUN docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Menentukan folder kerja
WORKDIR /app

# Copy semua project
COPY . .

# Install dependency PHP
RUN composer install --no-dev --optimize-autoloader

# Install dependency Node
RUN npm install

# Build Vite
RUN npm run build

# Generate APP_KEY jika belum ada
RUN php artisan key:generate --force

# Buka port Render
EXPOSE 10000

# Jalankan Laravel
CMD php artisan serve --host=0.0.0.0 --port=10000