# syntax=docker/dockerfile:1
FROM php:8.1.1-apache

# Install required PHP extensions and tools
RUN apt-get update && apt-get install -y \
    libpng-dev \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && docker-php-ext-enable mysqli

# Enable Apache mod_rewrite (optional but useful for PHP apps)
RUN a2enmod rewrite

# Keep This (Very Important)
RUN echo "AddType application/x-httpd-php .html" >> /etc/apache2/apache2.conf

# Copy your source code
COPY . /var/www/html

# Convert any Windows line endings to Linux line endings (prevents bash\r errors)
RUN apt-get install -y dos2unix && \
    find /var/www/html -type f -print0 | xargs -0 dos2unix || true

WORKDIR /var/www/html