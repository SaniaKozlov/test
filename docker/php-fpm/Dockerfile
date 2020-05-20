FROM  php:7.3-fpm

RUN apt-get update
RUN apt-get install -y zlib1g-dev libicu-dev libzip-dev libzip-dev libpng-dev libfreetype6-dev libjpeg62-turbo-dev g++
RUN apt-get update && apt-get install -y libmagickwand-dev --no-install-recommends && rm -rf /var/lib/apt/lists/*
# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer --version

# Set timezone
RUN rm /etc/localtime
RUN ln -s /usr/share/zoneinfo/Europe/Uzghorod /etc/localtime
RUN "date"
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl

# Type docker-php-ext-install to see available extensions
RUN docker-php-ext-install  mbstring  bcmath zip

RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
RUN docker-php-ext-install -j$(nproc) gd

# install redis
RUN pecl install redis
RUN docker-php-ext-enable redis

# Database module
RUN docker-php-ext-install  pdo pdo_mysql mysqli

ARG INSTALL_OPCACHE=false
RUN if [ ${INSTALL_OPCACHE} = true ]; then \
    docker-php-ext-install opcache \
;fi

# install xdebug
ARG INSTALL_XDEBUG=true
RUN pecl install  xdebug && \
    docker-php-ext-enable xdebug

RUN echo "error_reporting = E_ALL" > /usr/local/etc/php/php.ini \
    && echo "display_startup_errors = On" >> /usr/local/etc/php/php.ini \
    && echo "display_errors = On" >> /usr/local/etc/php/php.ini \
    && echo "upload_max_filesize = 6G" >> /usr/local/etc/php/php.ini \
    && echo "post_max_size = 6G" >> /usr/local/etc/php/php.ini \
    && echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_connect_back=0" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_autostart=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.idekey=\"PHPSTORM\"" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_port=9000" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Install Node
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -
RUN apt install -y nodejs

RUN pecl install imagick
RUN docker-php-ext-enable imagick
RUN docker-php-ext-install exif
RUN docker-php-ext-install  tokenizer xml

ARG UID=1000

RUN useradd -m docker -u ${UID}

USER docker

RUN echo "alias p='vendor/bin/phpunit'" >> ~/.bashrc
RUN echo "alias a='php artisan'" >> ~/.bashrc


WORKDIR /var/www/html
