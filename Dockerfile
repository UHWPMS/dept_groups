FROM ubuntu:22.04

SHELL ["/bin/bash", "-c"]
RUN apt update && apt install -y build-essential openjdk-17-jdk
RUN apt install -y curl


RUN useradd -ms /bin/bash user
WORKDIR /home/user

ENV NODE_VERSION 18.18.0

RUN curl -o-  https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.3/install.sh | bash \
  && export NVM_DIR="$HOME/.nvm" \
  && . $NVM_DIR/nvm.sh \
  && nvm use $NODE_VERSION

ENV DEBIAN_FRONTEND=noninteractive
ENV TZ=America/Hawaii
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt update &&  apt install -y php8.1-fpm php-mbstring php-xml php-bcmath php-curl \
  php-mbstring php-xml php-bcmath php-curl php-mysql 

RUN curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php                         

RUN php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer  

COPY ../ /home/user/

EXPOSE 8000
