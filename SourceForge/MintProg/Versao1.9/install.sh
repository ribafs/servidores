#!/bin/bash
#
# Criado por Ribamar FS - http://ribafs.me, partindo de tudotiais e exemplos distribuidos generosamente na internet, aos quais sou muito grato
#
apt install -y dialog;
#
while :
 do
    clear
servico=$(dialog --stdout --backtitle 'Instalacao de pacotes no Ubuntu Server 16.04 LTS - 64' \
                --menu 'Selecione a opcao com a seta ou o numero e tecle Enter\n' 0 0 0 \
                1 'Atualizar repositorios' \
                2 'Instalar LAMP e outros' \
                0 'Sair' )
    case $servico in
      1) apt update;;
      2) clear;
# LAMP
apt install -y apache2 libapache2-mod-php7.4 git aptitude composer mc curl phpunit;
apt install -y mariadb-server postgresql sqlite3;
apt install -y php7.4 php7.4-bcmath php7.4-gd php7.4-mysql php7.4-pdo-mysql php7.4-pdo-pgsql php7.4-pdo-sqlite php7.4-curl;
apt install -y php-pear php7.4-xml php7.4-xsl php-xdebug php7.4-intl;
apt install -y php7.4-zip php7.4-mbstring php7.4-fpm phpmyadmin;
phpenmod mbstring;

apt install -y php-apcu;
a2enmod rewrite;
systemctl restart apache2;

# Instalar outros softwares
apt install -y rar unrar zip unzip p7zip-full searchmonkey;
add-apt-repository -y ppa:linuxuprising/shutter && apt update && apt install -y shutter;

#Cubic
apt-add-repository -y ppa:cubic-wizard/release
apt update
apt install -y cubic

# Redes
apt install -y clamav clamav-daemon clamav-freshclam filezilla kolourpaint

#Desinstalar alguns pacotes que não uso

apt remove -y --purge thunderbird
apt remove -y --purge timeshift
apt update;
apt upgrade -y;
apt autoremove -y;;
      0) clear;exit;;
   esac
done
