FROM php:5.6-apache

RUN a2enmod rewrite expires

# install the PHP extensions we need
RUN curl -sL https://deb.nodesource.com/setup_6.x | bash - \
    && apt-get update && apt-get install -y libpng12-dev libjpeg-dev nodejs git && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-configure gd --with-png-dir=/usr --with-jpeg-dir=/usr \
    && docker-php-ext-install gd mysqli opcache

# set recommended PHP.ini settings
# see https://secure.php.net/manual/en/opcache.installation.php

#RUN { \
#        echo 'opcache.memory_consumption=128'; \
#        echo 'opcache.interned_strings_buffer=8'; \
#        echo 'opcache.max_accelerated_files=4000'; \
#        echo 'opcache.revalidate_freq=60'; \
#        echo 'opcache.fast_shutdown=1'; \
#        echo 'opcache.enable_cli=1'; \
#    } > /usr/local/etc/php/conf.d/opcache-recommended.ini

ADD . /var/www/html

ENV WORDPRESS_VERSION 4.5.2
ENV WORDPRESS_SHA1 bab94003a5d2285f6ae76407e7b1bbb75382c36e

# upstream tarballs include ./wordpress/ so this gives us /usr/src/wordpress
RUN curl -o wordpress.tar.gz -SL https://wordpress.org/wordpress-${WORDPRESS_VERSION}.tar.gz \
    && echo "$WORDPRESS_SHA1 *wordpress.tar.gz" | sha1sum -c - \
    && tar -xzf wordpress.tar.gz -C /usr/src/ \
    && rm wordpress.tar.gz \
    && chown -R www-data:www-data /usr/src/wordpress

COPY docker/start-project.sh /bin/start-project
RUN chmod 777 /bin/start-project

CMD ["start-project"]