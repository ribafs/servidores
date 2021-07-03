# Usando o Git no SF

## Envio dos arquivos Primeira vez

Acesse a áres do seu projeto
https://sourceforge.net/p/joomlar/code/ref/master/
Clique em Code

Aparecem as 3 opções para envio. Prefiro o SSH
git clone ssh://ribafs@git.code.sf.net/p/joomlar/code joomlar

cd /backup/backup_sf

Projeto joomlar

git clone ssh://ribafs@git.code.sf.net/p/joomlar/code joomlasf
cd joomlasf

cd /backup/backup_sf
git clone ssh://ribafs@git.code.sf.net/p/joomlar/code joomlar
cd joomlar
git config --global user.name "Ribamar FS"
git config --global user.email "ribafs@gmail.com"
git init
git add .
git commit -a -m 'Initial commit'
git push -u origin master

## Nas próximas vezes, para enviar arquivos

cd /backup/backup_sf/joomlar
git remote add origin ssh://ribafs@git.code.sf.net/p/joomlar/code
git push -u origin master

## Nas próximas vezes, para receber arquivos

cd /backup/backup_sf/joomlar
git remote add origin ssh://ribafs@git.code.sf.net/p/joomlar/code
git pull

## Nas próximas vezes, para sincronizar os repositórios local e remoto no SF

cd /backup/backup_sf/joomlar
git remote add origin ssh://ribafs@git.code.sf.net/p/joomlar/code
git add .
git commit -m "Mensagemd e commit"
git pull
git push -u origin master


