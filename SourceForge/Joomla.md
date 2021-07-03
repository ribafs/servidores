# Criar site com Joomla no SourceForge

## Gerenciamento de arquivos remotos

O FileZilla é uma ferramenta que ajuda muito quem gerencia projetos no SF. Para remover grandes quantidades de arquivos e muito mais.

## Observação

Para instalar o Joomla somente consegui usando o usuário admin. Mas pretendo mudar, depois de instalado para o rw e também para o ro. Idealmente ficar com o ro.

## Instalar idioma pt-br

- http://joomlacode.org/gf/project/jtranslation3_x/frs/?action=FrsReleaseBrowse&frs_package_id=6437
- Baixar a versão mais recente. Hoje a 3.9.21.v1
- Descompactar. Acesse a pasta. Verá duas sub pastas: _MACOSX e a pt-BR_joomla_lang_full_3.9.21v1. Abra esta última e envie todos os seus arquivos para o raiz do Joomla no SF. A minha opção preferida para isso é o FileZilla.
- Enviar todo o conteúdo da sub pasta para o raiz do site usando o Filezilla
- Abrir o admin do Joomla - Extensions - Manager - Discover
- Selecionar o idioma para o site e o para o admin e clique acima em Install

Todas as extensões de terceiros precisam ser instaladas assim:
- Se for um modulo para o site, descompactar e enviar toda a pasta para dentro da pasta modules do joomla. Verifique se é módulo do site ou do admin
- Assim para componentes, plugins e templaes

Fiz o download do Joomla para meu desktop

/backup/sf/joomla

Acessei o SF
Loguei
Acessei o projeto joomlar
Admin

No meu desktop criei
/backup/backup_sf/joomlariba

Descompactei o Joomla baixado na pasta acima

Para enviar todo o conteúdo deste pasta para o SF
Usarei o SCP e os enviarei para a pasta

/home/project-web/joomlariba/htdocs

## Habilitar o MySQL

https://sourceforge.net/p/joomlariba/admin/ext/mysql/

MySQL Service
 
Settings

Hostname 	mysql-j (exactly as shown, with no domain suffix)
Database name prefix 	j3280662_ — i.e. "CREATE DATABASE j3280662_myapp" as your ADMIN user.
RO User 	j3280662ro (SELECT)
RW User 	j3280662rw (SELECT, INSERT , DELETE, UPDATE)
ADMIN User 	j3280662admin (has RW account privileges, and CREATE, DROP, ALTER, INDEX, LOCK TABLES))

Web-access URL

https://mysql-j.sourceforge.net 

Passwords

j3280662ro:
j3280662rw:
j3280662admin

Set Password 

Dados

Host - mysql-j
User - j3280662rw
Pass - 
Banco - j3280662_joomlariba
Port - 3306

Testando a existência do PDO

<?php
ini_set('display_errors', 'On');
if (!defined('PDO::ATTR_DRIVER_NAME')) {
    echo 'PDO unavailable';
}else{
    echo 'PDO available';
}

Também podemos testar e muito mais com a função phpinfo()

<?php
phpinfo();

con.php

<?php
ini_set('display_errors', 'On');

$pdo = new PDO("mysql:host=mysql-j;dbname=j3280662_joomlariba", 'j3280662ro', 'zmxn1029ro');

if($pdo){
    print 'Conectado';
}else{
    print 'Não Conectado';
}

Enviar via sftp

sftp ribafs@web.sourceforge.net
cd /home/project-web/joomlariba/htdocs/joomlariba
put /home/ribafs/sf/php.ini

Abrir no navegador
https://joomlariba.sourceforge.io

Conectou, mas com o rw não conectou.

Pasta local
/backup/backup_sf/joomlariba

Pasta no SF
/home/project-web/joomlariba/htdocs

Copiar toda a pasta

Enviar inclusive a pasta
scp -rv /backup/backup_sf/joomlariba ribafs@web.sourceforge.net:/home/project-web/joomlariba/htdocs

Enviar somente o conteúdo
scp -rv /backup/backup_sf/joomlariba/* ribafs@web.sourceforge.net:/home/project-web/joomlariba/htdocs

Criar script ou alias para abrir o sftp no SF

sudo nano /usr/local/bin/sftpsf
sftp ribafs@web.sourceforge.net
sudo chmod +x /usr/local/bin/sftpsf

Chamar o SFTP com

sftpsf

cd /home/project-web/joomlariba/htdocs

put /backup/backup_sf/joomlariba/con.php

Verificar na web

https://joomlariba.sourceforge.io
