# Usando o MySQL/MariaDB no SF

## Habilitar MySQL no Projeto

- Faça login no SF
- Acesse o projeto
- Clique em Admim
- Role a ela e clique em MySQL Database

https://sourceforge.net/p/joomlar/admin/ext/mysql/

## Site de acesso ao phpmyadmin para gerenciamento dos bancos pela web

Algo assim, o j depende do nome do projeto

https://mysql-j.sourceforge.net

## Documentação

https://p.sf.net/sourceforge/mysql

MySQL Database

Ele mostra as informações abaixo, a serem usadas para acesso local e via PHP

Hostname 	mysql-u (exactly as shown, with no domain suffix)
Database name prefix 	u3328074_ — i.e. "CREATE DATABASE u3328074_myapp" as your ADMIN user.
RO User 	u3328074ro (SELECT)
RW User 	u3328074rw (SELECT, INSERT , DELETE, UPDATE)
ADMIN User 	u3328074admin (has RW account privileges, and CREATE, DROP, ALTER, INDEX, LOCK TABLES))
Web-access URL 	https://mysql-u.sourceforge.net

Senhas xxxxxxro, rw,admin

Usamos a senha admin para criar bancos pelo phpmyadmin

E os outros dois para acessarem o mysql por um site/aplicativo

Host - mysql-j (o j é por conta de ser a primeira letra do nome do projeto)

Acesso web usando o phpmyadmin

https://mysql-j.sourceforge.net

Logo abaixo da página aparecem

Passwords

j3280038ro:
j3280038rw:
j3280038admin

Entre com as senhas acima e clique em Set Password

Agora o uso do MySQL está liberado.

Criar um banco usando o phpmyadmin acessando

https://mysql-j.sourceforge.net

Usar o collation utf8mb4_unicode_ci

user - j3280038admin
senha -

Podemos acessar o phpmyadmin usando os outros dois usuários mas com suas respectivas restrições.

## Criar banco pela linha de comando

mysqladmin -h mysql-o -u l3278826admin -p create l3278826_laravel

## Importar o dump
mysql -h mysql-o -u l3278826admin -p l3278826_laravel < ~/ribafs_laravel_mysqldump.sql

Usar user e senha da página abaixo
https://sourceforge.net/p/joomlar/admin/ext/mysql/


