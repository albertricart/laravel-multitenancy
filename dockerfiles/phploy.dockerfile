FROM alpine:3.14.6

RUN apk add --update \
    ca-certificates \
    bash \
    git \
    mercurial \
    php-bz2 \
    php-cli \
    php-dom \
    php-gd \
    php-json \
    php-ftp \
    php-mbstring \
    php-fileinfo \
    php-openssl \
    php-pdo \
    php-pear \
    php-phar \
    php-zip \
    php-ctype \
    php-zlib \
    subversion \
    unrar \
    perl \
    && rm -rf /var/cache/apk/*

RUN wget https://github.com/banago/PHPloy/raw/master/dist/phploy.phar && \
    chmod +x phploy.phar && mv phploy.phar /usr/local/bin/phploy

# Set up the application directory
# VOLUME ["/app"]
WORKDIR /var/www/html