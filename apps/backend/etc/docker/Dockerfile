FROM php:7.4-fpm

WORKDIR /var/www/xperales

RUN apt-get update -qq \
    && apt-get install -y --no-install-recommends \
    build-essential  \
    apt-transport-https \
    ca-certificates \
    gnupg2 \
    apt-utils \
    nodejs \
    git \
    vim \
    wget \
    zip \
    unzip \
    libzip-dev \
    libpq-dev \
    && docker-php-ext-install zip pdo pdo_pgsql opcache

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_autostart=on" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_port=9001" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_handler=dbgp" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_connect_back=0" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.idekey=xperales" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_host=172.17.0.1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN curl -sL https://deb.nodesource.com/setup_10.x | bash - \
 && apt-get install -y nodejs

RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - \
    && echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list

RUN apt-get update -qq \
    && apt-get install \
    yarn

# Install composer
RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
   mv composer.phar /usr/local/bin/composer
# Install symfony
RUN wget https://get.symfony.com/cli/installer -O - | bash
RUN echo 'export PATH="$HOME/.symfony/bin:$PATH"' >> /root/.bashrc

RUN cp  /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini
