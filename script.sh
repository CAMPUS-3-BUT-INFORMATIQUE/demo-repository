#!/bin/bash

# Vérification des arguments en ligne de commande
if [ "$#" -lt 3 ]; then
    echo "Usage: $0 <SFTP_HOST> <SFTP_USERNAME> (<SFTP_PASSWORD> | -k <PATH_TO_PRIVATE_KEY_FILE>)"
    exit 1
fi

# Récupération des arguments
SFTP_HOST="$1"
SFTP_USERNAME="$2"
SFTP_PASSWORD=""
SFTP_KEY_FILE=""

mkdir SSHFS_directory

if [ "$3" == "-k" ]; then
    SFTP_KEY_FILE="$4"
    sshfs -o IdentityFile="$SFTP_KEY_FILE" "$SFTP_USERNAME"@"$SFTP_HOST":/ ./SSHFS_directory

else
    SFTP_PASSWORD="$3"
    echo "$SFTP_PASSWORD" | sshfs -o password_stdin "$SFTP_USERNAME"@"$SFTP_HOST":/ ./SSHFS_directory
fi

cd ./SSHFS_directory/private/git-dev || (echo "erreur dossier non trouvé" && exit)

git config --global --add safe.directory "$(pwd)"
git pull

cd src || (echo "erreur dossier non trouvé" && exit)

composer install --no-dev
yarn install --production
yarn run production

rm -rf ../../../www-dev/{*,.*}
cp -Trf ./public ../../../www-dev

cd ../../../../

umount ./SSHFS_directory
rm -rf ./SSHFS_directory
