<?php require_once './header.php'; ?>

<h2>Virtual Host no Linux Mint 20 com Apache2</h2>
<br>
Adaptado de: https://www.vivaolinux.com.br/topico/Apache-Web-Server/virtualHost
<br>
<b>Criar a pasta</b>
<br>
/home/seuuser/www
<br>
Obs.:Muito útil para quem precisa executar um site no raiz web e que precisa de vários sites, todos no raiz.
<br><br>
<b>Editar o hosts</b>
<br>
sudo nano /etc/hosts
<br>
E adicionar a linha
<br><br>
127.0.0.1	backup
<br><br>
<b>Criar o script</b>
<br>
<pre>
sudo nano /etc/apache2/sites-available/backup.conf

&lt;VirtualHost *:80&gt;
ServerAdmin ribafs@gmail.com
ServerName backup
DirectoryIndex index.php
DocumentRoot /home/seuuser/www
LogLevel warn
ErrorLog ${APACHE_LOG_DIR}/error.log
CustomLog ${APACHE_LOG_DIR}/access.log combined
&lt;Directory /home/seuuser/www/&gt;
    Options Indexes FollowSymLinks
    AllowOverride All
    Require all granted
    DirectoryIndex index.html index.php
&lt;/Directory&gt;
&lt;/VirtualHost&gt;

sudo a2ensite backup
sudo systemctl reload apache2
</pre>

<b>Acessar</b>
<br>
http://backup /home/seuuser/www
<br>
http://localhost /var/www/html

<?php require_once '../footer.php'; ?>
