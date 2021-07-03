<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Mint Prog 1.6</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bootstrap Documentation Template For Software Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="assets/images/favicon.ico"> 
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">
    
    <!-- FontAwesome JS-->
    <script defer src="assets/fontawesome/js/all.min.js"></script>

    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/theme.css">

</head> 
<body>

    <header class="header fixed-top">	    
        <div class="branding docs-branding">
            <div class="container-fluid position-relative py-2">
                <div class="docs-logo-wrapper">
	                <div class="site-logo"><a class="navbar-brand" href="index.html"><img class="logo-icon mr-2" src="assets/images/logo.png" alt="logo"><span class="logo-text">Mint <span class="text-alt">Prog - Docs</span></span></a></div>    
                </div><!--//docs-logo-wrapper-->
	            <div class="docs-top-utilities d-flex justify-content-end align-items-center">
                    <a href="index.html" class="btn btn-primary d-none d-lg-flex">Início</a>&nbsp;	
		            <a href="https://sourceforge.net/projects/mint-prog/" target="_blank" class="btn btn-primary d-none d-lg-flex">Download da ISO</a>
	            </div><!--//docs-top-utilities-->
            </div><!--//container-->
        </div><!--//branding-->
    </header><!--//header-->
    
    
    <div class="page-header theme-bg-dark py-5 text-center position-relative">
	    <div class="theme-bg-shapes-right"></div>
	    <div class="theme-bg-shapes-left"></div>
	    <div class="container">
		    <h1 class="page-heading single-col-max mx-auto">Mint Prog 1.6 - SO com Foco em PHP</h1>
		    <div class="page-intro single-col-max mx-auto">Como usar o Mint Prog para tirar o maior proveito.</div>
	    </div>
    </div><!--//page-header-->
<hr><br>
<div class="container">
    <h1 class="text-center" id="remasteriza-o-do-linux-mint-20-focada-em-php">Tutorial rápido de uso do Mint Prog 1.6</h1>
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
- Usar o mysql/mariadb sem sudo e sem senha
- Usar o adminer
- Abrir o docs em:
    - ícone no desktop Mint Prog 1.6
    - http://localhost
    - https://mint-prog.sourceforge.io/docs/
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
    - ícone no desktop Mint Prog 1.6
    - http://localhost
    - https://mint-prog.sourceforge.io/docs/
</pre>

    <footer class="footer">

	    <div class="footer-bottom text-center py-5">
		    
	        <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
            <small class="copyright">Designed with <i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="theme-link" href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>            	        
	    </div>
	    
    </footer>

</div>
</body>
</html>
