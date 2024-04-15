FROM php:7.4-apache

# Remplacez ces valeurs par votre propre UID et GID
ARG USER_ID=1000
ARG GROUP_ID=1000






# Installer les dépendances nécessaires pour Laravel et Yarn
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libfreetype6-dev \
    zip \
    curl \
    && docker-php-ext-install gd pdo pdo_mysql \
    && a2enmod rewrite



# Télécharger et installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Installer Node.js et Yarn
# NodeSource est un fournisseur tiers qui fournit des installations plus récentes de Node.js
RUN curl -sL https://deb.nodesource.com/setup_21.x | bash - \
    && apt-get install -y nodejs \
    && npm install --global yarn

# Création d'un groupe et utilisateur correspondant à votre UID/GID hôte
RUN groupadd -g ${GROUP_ID} appuser && \
    useradd -u ${USER_ID} -g appuser -m appuser && \
    usermod -aG root appuser && \
    usermod -aG www-data appuser

WORKDIR /var/www/private/git-dev/src


# Définir le répertoire de travail dans le conteneur

# Exposer le port 80 pour le serveur web Apache
EXPOSE 80

# Installer les dépendances PHP de l'application Laravel
# Définir les permissions correctes sur les fichiers de l'application Laravel
# Commande par défaut pour démarrer Apache dans le conteneur
CMD composer install; yarn install; yarn dev ; chown -R appuser:appuser /var/www/private/git-dev/src; chown -R www-data:www-data /var/www/private/git-dev/src/storage /var/www/private/git-dev/src/bootstrap/cache ; apache2-foreground;



