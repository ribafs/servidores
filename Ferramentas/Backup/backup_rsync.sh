#!/bin/sh

# Backup para servidor remoto
# https://www.aprendendolinux.com/sincronizando-com-o-rsync/
rsync -avz --delete -e 'ssh -p 65522' --delete /backup/0ribamar/Projetos/1Livros/VPS/ ribafs@165.227.227.139:/home/ribafs/backup/VPS/

# Adicionar ao crontab
# crontab -e
# Efetuar o backup incrementar todos os dias as 14:00
# 00 14 * * * /usr/local/bin/backup_rsync.sh

