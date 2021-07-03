## Criando um ambiente de programação local com Vagrant

Uma boa alternativa para criar um ambiente de programação isolado do seu desktop e similar ao servidor.

O Vagrant é uma ferramenta de criação e gerenciamento de ambientes de máquinas virtuais.
Ele nos entrega uma box/máquina virtual para ser administrada através do terminal/prompt como ser fosse um servidor.

Com ele criamos uma box/vm contendo o sistema operacional desejado e então instalar tudo que desejarmos: apache, php, mysql, etc. Podemos adicionar IP e/ou porta para a comunicação da box com o nosso desktop.

## Pré-requisitos

- Git - https://git-scm.com/ 
- Virtualbox e extensões - https://www.virtualbox.org/ 
- Vagrant - https://www.vagrantup.com/
- Conhecimento mínimo de Linux ou coragem para seguir o tutorial.
- Funciona em Linux, Windows e Mac

## Máquina de testes

Este material foi criado em um Notebook com 8GB de RAM e com LinuxMint 9.3.

## Alternativas para o prompt do Windows
https://cmder.net/  e https://conemu.github.io/ 
Como iremos trabalhar muito com o terminal/prompt então seguem alternativas para maior conforto no windows.

## Instalações
- Instale o Git para seu sistema
- Instale o  Virtualbox para o seu sistema e também as extensões (extension pack). Na versão atual do Linuxmint, que é a 9.3, instalei o virtualbox pelo apt, pois o Vagrant não reconheceu o 6.1 do site.
- Instale o Vagrant para seu sistema.

## Criando uma box com Debian 10
Esta box atende à maioria dos projetos, pois traz o PHP 7.3.

## Baixando a Box
https://app.vagrantup.com/boxes/search - Digite “debian 10” na caixa de busca e tecle Enter.

Como estou usando o Virtualbox vou baixar a versão para ele.

Vou baixar a box:
```bash
vagrant init generic/debian10
vagrant up
Criar o diretório

mkdir /home/ribafs/vagrant
mkdir /home/ribafs/vagrant/debian10
Acessar
cd /home/ribafs/vagrant/debian10
```

Colar a primeira linha

vagrant init generic/debian10

## Integração entre o terminal/prompt e a box

Linux/Mac - box = Selecionar no terminal e Shift+Insert na box 

## Adicionando um novo IP e redicionar a porta 80 para a 8080
Editar o arquivo /home/ribafs/vagrant/debian10/Vagrantfile

E descomentar a linha:

 config.vm.network "forwarded_port", guest: 80, host: 8080
 config.vm.network "private_network", ip: "192.168.33.10"

Removendo a cerquilha do início e salvar

Quando concluir colar a segunda linha e aguardar

vagrant plugin install vagrant-vbguest
vagrant up

Se tudo correr bem execute:

vagrant ssh

Com isso já estamos no Debian 10.

## Instalar apache, mysql, php e cia

Colar todas as linhas abaixo na box:
```bash
sudo su
apt install -y apache2 libapache2-mod-php7.3 git mcrypt curl phpunit composer
a2enmod rewrite

apt install -y mariadb-server
apt install -y php7.3 php7.3-bcmath php7.3-mysql php7.3-sqlite3 php7.3-pgsql php7.3-mongodb;
apt install -y php7.3-xml php7.3-xsl php7.3-curl php7.3-xdebug php7.3-intl;
apt install -y php7.3-zip php7.3-mbstring php7.3-gettext php7.3-gd php-curl php-pear;

apt install -y php-apcu;

wget http://ftp.ussg.iu.edu/linux/debian/pool/main/m/memcached/memcached_1.5.6-1.1_amd64.deb;
dpkg -i memcached_1.5.6-1.1_amd64.deb;
apt install -y php-memcache php-memcached;

systemctl restart apache2
```

## Configurações básicas

```bash
sudo nano /etc/php/7.3/apache2/php.ini
display_error = On
error_reporting = E_ALL # comentar o existente
output_buffering = On
```

sudo nano /etc/apache2/apache2.conf

Adicionar

ServerName localhost

Mudar as ocorrencias de 
```
AllowOverride none
Para
AllowOverride All

sudo service apache2 restart
```

## Configurar mysql resetando senha root. Mas antes testar se já funciona normalmente. User root e senha root
```bash
sudo mysql -uroot
USE mysql;
UPDATE user SET plugin='mysql_native_password' WHERE User='root';
UPDATE user SET authentication_string=PASSWORD("root") WHERE User='root';
FLUSH PRIVILEGES;
exit;

sudo service mysql restart
mysql -uroot -proot
```

## Instalar nodejs 12
```bash
curl -sL https://deb.nodesource.com/setup_12.x | sudo -E bash -
sudo apt install -y nodejs
```

### Versões
- php -v
- node -v
- npm -v

## Baixar e instalar o adminer.php
Você pode usar o phpmyadmin se preferir

Download de https://www.adminer.org/ 

Copiar para /var/www/html e renomear para adminer.php

Abrindo o adminer no desktop
http://192.168.33.10/adminer.php

## Criando um alias para agilizar a ida ao /var/www/html
```bash
cd /home/vagrant
nano .bashrc
alias cw='cd /var/www/html'
```
Fechar o terminal e abrir novamente

Agora para acessar o /var/www/html basta executar:
cw

## Dando permissão ao usuário comum ‘vagrant’ no /var/www/html
```bash
sudo nano /usr/local/bin/perms

#!/bin/sh
clear;
echo "Aguarde enquanto configuro as permissões do /var/www/html/$1";
echo "";
chown -R vagrant:www-data /var/www/html/$1;
find /var/www/html/$1 -type d -exec chmod 775 {} \;
find /var/www/html/$1 -type f -exec chmod 664 {} \;
echo "";
echo "Concluído!";

sudo chmod +x /usr/local/bin/perms
```

Sempre que precisar ajustar as permissões do /var/www/html/ basta executar

sudo perms

Para ajustar apenas de um subdiretório ‘/var/www/html/joomla’ use:

sudo perms joomla

## Dica Extra

Podemos usar, para facilitar, um software de SSH, como o WinSCP ou mesmo uma conexão através do gerenciador de arquivos nemo entre o desktop e a box:

- Servidor - 192.168.33.10
- Porta - 22
- Usuário - vagrant
- Senha - vagrant

## Exportar uma box

No terminal do desktop, acesse o diretório da box
```bash
vagrant box update
vagrant halt
vagrant package --output deb10.box
```

Agora podemos levar para outro computador, basta antes mudar a linha abaixo no Vabrangfile:

  config.vm.box = "deb10.box" e copiar a box para o mesmo diretório do Vagrantfile.

## Importando uma box

Criar o diretório para a box em /home/ribafs/vagrant, ex: debian10

Copiar o deb10.box e Vagrantfile para o diretório acima.

Acessar o diretório /home/ribafs/vagrant/debian10

E executar:

vagrant up

vagrant ssh


Importante - Aqui trago apenas os recursos básicos que utilizo, mas existe muito mais recursos úteis no Vagrant, explore e veja outros tutoriais.
Sugestão - https://github.com/ribafs/cake-vagrant 

## Dicas extras

vagrant plugin repair

vagrant plugin expunge --reinstall

vagrant reload

Caso esteja em um computador com bloqueio de SSL, use no Vagrantfile:
config.vm.box_download_insecure = true


