<?php require_once './header.php'; ?>

<hr><br>
<div class="container">
    <h1 class="text-center" id="remasteriza-o-do-linux-mint-20-focada-em-php">Dicas para usar o Mint Prog 1.9</h1>
    <br>

<h2>Conteúdo:</h2>
<pre>
- Teclas de atalho customizadas
- Nemo
    - Atalhos
    - Clique único
- Criar virtualHost no /home/ribafs/www
- Criar scripts para setar permissões 
    - do /home/ribafs/www
    - do /var/www/html
- Importar scripts grandes no mysql
- Usar o adminer
- Abrir o docs em:
    - ícone no desktop Mint Prog 1.9
    - http://localhost
    - https://mint-prog.sourceforge.io/docs/
- Sudo sem senha
- Ajustes no /usr/local/bin/perms
- Configurar o PostgreSQL para uso pelo terminal ou via web
- Configurar phpMyAdmin para uso do mysql sem senha
- Usando o SQLite
</pre>

<h3>Teclas de atalho customizadas</h3>

<b>Para criar teclas de atalho para os programas mais usados</b>
<pre>
- Clique no menu
- Preferências
- Teclado
</pre>

Aparecerá a tela:<br>

<img src="assets/images/teclado1.png">
<br><br>
Clique abaixo em Adicionar atalho personalizado. Então aparecerá<br>
<br>
<img src="assets/images/teclado2.png">

<br><br>
Supondo adicionar tecla de atalho para abrir o Firefox. Usarei Ctrl+Alt+F. Sempre uso o prefixo Ctrl+Alt para todos os programas. Ao final apenas adiciono uma letra do mesmo, geralmente a primeira.<br>
Para isso clique em Adicionar abaixo.
<br>    
<br>
Então aparecerá a tela:<br><br>
<img src="assets/images/teclado3.png">
Clique na primeira linha com "Não atribuído" duas vezes e tecle "Ctrl+Alt+F".
<br><br>
Agora já pode abrir o Firefox com Ctrl+Alt+F.
<br><br>
Proceda de forma semelhante para adicionar teclas de atalho para outros programas.

<h2>Nemo</h2>
<h3>Atalhos</h3>

Veja como é o meu gerenciador de arquivos (nemo):<br><br>
<img src="assets/images/nemo.png">
<hr>
Veja que existem diversos atalhos à esquerda. Estes são meus diretórios mais usados. Além disso também perceba que a tela está dividida em dois paineis. Basta teclar F3 que ele volta a ficar somente um painel. F3 novamente e se divide. Isso é um recurso muito útil, mas precisamos usar com bastante atenção, pois corremos  o risco de excluir algo de um painel pensando que do outro. Fique atento ao foco do painel.
<hr>
<h3>Clique único</h3>
Outro recurso que sempre ativo logo após cada instalação do Mint: efetuar um único clique para abrir arquivos ou pastas no nemo:
<hr>
<pre>
- Abra o nemo
- Editar
- Preferências
- Comportamento
- Usar um clique para abrir itens
</pre>
<hr>
Talvez inicialmente custe um pouco para acostumar mas o que acha de efetuar apenas um clique ao invés de dois para abrir os itens do gerenciador de arquivos?
<br><br>
<h2>Criar virtualHost em</h2>

/home/ribafs/www

<pre>
    <code>
Adaptado de:
https://www.vivaolinux.com.br/topico/Apache-Web-Server/virtualHost

Criando este virtualhost trabalhamos com mais conforto em nosso distrório home que no /var/www/html.
Será chamado de backup então usaremos apra abrir:
http://backup

Troque meu user (ribafs) pelo seu. Abra o terminal para executar os comandos.

mkdir /home/ribafs/www

sudo nano /etc/hosts

127.0.0.1	backup

sudo nano /etc/apache2/sites-available/backup.conf

<VirtualHost *:80>
ServerAdmin ribafs@gmail.com
ServerName backup
DirectoryIndex index.php
DocumentRoot /home/ribafs/www
LogLevel warn
ErrorLog ${APACHE_LOG_DIR}/error.log
CustomLog ${APACHE_LOG_DIR}/access.log combined
<Directory /home/ribafs/www/>
    Options Indexes FollowSymLinks
    AllowOverride All
    Require all granted
    DirectoryIndex index.html index.php
</Directory>
</VirtualHost>

sudo a2ensite backup
sudo systemctl reload apache2

    </code>
</pre>

<h2>Criar dois scripts para ajustar permissões</h2>

<h3>/home/ribafs/www</h3>

O script será criado no /usr/local/bin , que é uma pasta que está no path. Isso indica que podemos executar o script de qualquer pasta.

<pre>
- sudo nano /usr/local/bin/permsh
sudo adduser ribafs www-data

#!/bin/sh
clear;
echo "Aguarde enquanto configuro as permissões do /home/ribafs/www/$1";
echo "";
find /home/ribafs/www/$1/ -type d -exec chmod 775 {} \;
find /home/ribafs/www/$1/ -type d -exec chmod ug+s {} \;
find /home/ribafs/www/$1/ -type f -exec chmod 664 {} \;
chown -R ribafs:www-data /home/ribafs/www/$1/
echo "";
echo "Concluído!";

Exemplo de uso:
Supondo que tenha acabado de descompactar o joomla em /home/ribafs/www/joomla

Então verifique as permissões como estão

cd /home/ribafs/www
ls -la joomla

Pastas e arquivos estão com as seguintes permissões

drwxr-xr-x  2 ribafs ribafs  4096 out  5 18:23 includes
-rw-r--r--  1 ribafs ribafs  1420 out  5 18:23 index.php

Somente o dono (ribafs) tem direito de escrita (w). Para que funcione adequadamente precisamos que o dono (ribafs) e o grupo (www-data), que é o Apache, possam escrever. Então executamos:

sudo permsh joomla

Ou seja, sudo perms e o diretório a ajustar as permissões. Caso digite apenas: sudo permsh ele irá varrer todo o /home/ribafs/www

Veja agora como estão as permissões:

drwsrwsr-x  2 ribafs www-data  4096 out  5 18:23 includes
-rw-rw-r--  1 ribafs www-data  1420 out  5 18:23 index.php

Agora sim, tanto o ribafs quanto o Apache podem gravar nos arquivos.

Experimente.
</pre>


<h3>do /var/www/html</h3>

Vamos fazer o mesmo com o /var/www/html

<pre>
- sudo nano /usr/local/bin/perms

#!/bin/sh
clear;
echo "Aguarde enquanto configuro as permissões do /var/www/html/$1";
echo "";
find /var/www/html/$1/ -type d -exec chmod 775 {} \;
find /var/www/html/$1/ -type d -exec chmod ug+s {} \;
find /var/www/html/$1/ -type f -exec chmod 664 {} \;
chown -R ribafs:www-data /var/www/html/$1/
echo "";
echo "Concluído!";

Exemplo de uso:
Supondo que tenha acabado de descompactar o joomla em /var/www/html/joomla

sudo perms joomla

</pre>

<h2>Importar scripts grandes no MySQL</h2>

<pre>
Como importar banco grande com MySQL

Ao importar um script grande recebia o erro:
Mysql Server has gone away

Uma rápida busca encontrei a resposta neste site:
https://piwik.org/faq/troubleshooting/faq_183/

Apenas editei o arquivo abaixo:
sudo nano /etc/mysql/mysql.conf.d/mysqld.cnf

Aumentei o valor do parâmetro:
max_allowed_packet     para 128

E reiniciei o serviço do mysql e importou assim:

Importei pela linha de comando (baixei o script, criei o banco):

mysql -uroot -p ribafs < portal.sql

Mas fica a recomendação de não armazenar imagens dentro do banco, mas apenas seu caminho.
</pre>

<h2>Usar o mysql/mariadb sem sudo e sem senha</h2>

Atualmente o mysql/mariadb, por padrão, somente podem ser usados com sudo. Em nosso desktop, fica mais confortável usá-lo sem sudo e sem senha.

<pre>
sudo systemctl stop mysql
sudo mkdir -p /var/run/mysqld
sudo chown mysql:mysql /var/run/mysqld
sudo /usr/sbin/mysqld --skip-grant-tables --skip-networking &
exit;
mysql -u root
USE mysql;
update user set plugin="mysql_native_password";
flush privileges;
ALTER USER 'root'@'localhost' IDENTIFIED BY '';
quit
sudo pkill mysqld
sudo systemctl start mysql
mysql -uroot

https://solidfoundationwebdev.com/blog/posts/how-to-fix-mysql-error-1524-hy000-plugin-auth_socket-is-not-loaded-in-mysql-5-7
https://linuxconfig.org/how-to-reset-root-mysql-mariadb-password-on-ubuntu-20-04-focal-fossa-linux

</pre>
<h2>Abrir o docs em:</h2>
<pre>
    - ícone no desktop Mint Prog 1.9
    - http://localhost
    - https://mint-prog.sourceforge.io/docs/
</pre>

<h2>Configurações no php e no apache</h2>

<pre>
sudo nano /etc/php/7.4/apache2/php.ini

display_error = On
error_reporting = E_ALL # comentar o existente
output_buffering = On

sudo nano /etc/apache2/apache2.conf

ServerName localhost

Mudar as ocorrenciasn de 
AllowOverride none
Para
AllowOverride All

<Directory />
    Options Indexes FollowSymLinks Includes ExecCGI
    AllowOverride All
    Order deny,allow
    Allow from all
</Directory>

sudo service apache2 restart
</pre>

<h2>Sudo sem senha</h2>
<pre>
Abra o terminal e digite

sudo bash -c 'echo "$(logname) ALL=(ALL:ALL) NOPASSWD: ALL" | (EDITOR="tee -a" visudo)'

Feche o terminal e abra novamente. Execute, por exemplo:

sudo clear

Agora poderá executar o sudo sem senha.
</pre>

<h2>Ajustes no /usr/local/bin/perms</h2>

Adicione seu user ao grupo do apache

sudo adduser seuuser www-data

Edite o script perms e troque o ribafs pelo seu user

<pre>
sudo nano /usr/local/bin/perms
Mude a linha abaixo
chown -R ribafs:www-data /var/www/html/$1/
Para usar o seu user:
chown -R seuuser:www-data /var/www/html/$1/
Salve com Ctrl+O e Ctrl+X e saia
</pre>
<br>
<h2>Configurar o PostgreSQL para uso pelo terminal ou via web</h2>

<pre>
sudo su
su - postgres
psql

# Digite
alter role postgres password 'postgres';
\q
exit

nano /etc/postgresql/12/main/pg_hba.conf

# Mudar a linha:
local   all             postgres                                peer

Para
local   all             postgres                                md5

sudo service postgresql restart

</pre>

<b>O Mint Prog 1.9 já virá com o PostgreSQL configurado por default como acima</b>

<h2>Configurar phpMyAdmin para uso do mysql sem senha</h2>
<br>

<pre>
Acessar o terminal

sudo nano /etc/phpmyadmin/config.inc.php

Procure a linha:
// $cfg['Servers'][$i]['AllowNoPassword'] = TRUE;

Descomente
$cfg['Servers'][$i]['AllowNoPassword'] = TRUE;

Salve com Ctrl+O e Ctrl+X e saia

Reinicie o apache
sudo service apache2 restart
</pre>

<b>O Mint Prog 1.9 já virá com o phpMyAdmin configurado por default como acima</b>

<h2>Usando o SQLite 3</h2>
<br>
<pre>
- Via terminal/prompt
Criando o banco cad_clients

sqlite3 cad_clients

.help - ajuda
.exit - sair

create table clients(id integerprimary key AUTOINCREMENT, name varchar(50));

insert into clients (name) values('Ribamar FS');

update clients set name='Ribamar Sousa' where id=1;

.exit

- Via web com PDO

Conexão

$PDO = new PDO('sqlite:/var/www/html/cad_clients.db');

As consultas são idênticas para todos os SGBDs, somente a conexão é diferente.

- Via Web com Laravel

config/database.php

...
    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DATABASE_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],
...

.env

...
DB_CONNECTION=sqlite
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=/backup/www/laravel/sqlite/database/database.sqlite
DB_USERNAME=root
DB_PASSWORD=
...

O DB_DATABASE precisa indicar o path completo do arquivo do sqlite. De preferência crie o banco do sqlite vazio em
database/database.sqlite
Assim não precisará alterar nada no config/database.php

</pre>

<?php require_once './footer.php'; ?>
