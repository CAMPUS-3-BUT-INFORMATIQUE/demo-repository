# Projet SAE6

Ce projet utilise **Laravel**, **Tailwind CSS**, **MySQL**, et **PhpMyAdmin**, **Tailwind CSS**, **DaisyUI** pour le développement web.


## Technologies

- **Backend :** Laravel 8 (avec PHP 7.4.33)
- **Frontend :** Tailwind CSS, DaisyUI
- **Base de données :** MySQL
- **PhpMyAdmin :** 5.0.4

## Déploiement sur le serveur de production

Pour déployer le projet sur le serveur de production, utilisez le script suivant. Assurez-vous de remplacer `<rsa_key>` par votre clé RSA personnelle.

```bash
./script.sh dev-agile8.unicaen.info.fr agile8 -k ~/.ssh/<rsa_key>
# ou
./script.sh prod-agile8.unicaen.info.fr agile8 <password>
```

## Initialisation

Pour lancer le projet en utilisant Docker Compose, exécutez la commande suivante. Cette commande construit les images nécessaires et démarre les conteneurs en mode détaché.

```bash
sudo docker-compose up -d --build
```


## Pour les développeurs

Pour utiliser `artisan` ou `yarn watch` vous devez switch sur le user `appuser` dans le docker !!!!!!!!!!!!!!

### Environnement de développement

L'environnement recommendé pour le développement est **Visual Studio Code** avec les extensions suivantes.

**Obligatoire** :
- **Sonar Lint** (https://marketplace.visualstudio.com/items?itemName=SonarSource.sonarlint-vscode)

**Fortement conseillé** :

- **PHP Intelephense** (https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client)
- **Laravel Blade Snippets** (https://marketplace.visualstudio.com/items?itemName=onecentlin.laravel-blade)
- **Tailwind CSS IntelliSense** (https://marketplace.visualstudio.com/items?itemName=bradlc.vscode-tailwindcss)

### Compilation des assets

https://classic.yarnpkg.com/lang/en/docs/cli/

Pour compiler les assets, exécutez la commande suivante.

```bash
yarn dev
```

pour compiler en boucle les assets, exécutez la commande suivante.

```bash
yarn watch
```


### IDE Helper (https://github.com/barryvdh/laravel-ide-helper)


Pour générer les fichiers d'aide pour l'IDE, exécutez la commande suivante.

```bash
 php artisan ide-helper:models
```

ça permet d'avoir l'autocompletion pour les models.

### Debug bar (https://github.com/barryvdh/laravel-debugbar)

Permet d'avoir une barre de debug en bas de la page pour voir les requêtes SQL, les variables, etc.


## Tuto Laravel

https://laravel.com/docs/8.x

https://www.youtube.com/watch?v=_GeVGCOBF5Q&list=PLjwdMgw5TTLXz1GRhKxSWYyDHwVW-gqrm

https://chat.openai.com/
