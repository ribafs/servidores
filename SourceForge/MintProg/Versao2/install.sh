#!/bin/bash
#
# Criado por Ribamar FS - http://ribafs.me, partindo de tudotiais e exemplos distribuidos generosamente na internet, aos quais sou muito grato
#
apt install -y dialog;
#
while :
 do
    clear
servico=$(dialog --stdout --backtitle 'Instalação de pacotes no Ubuntu Server 16.04 LTS - 64' \
                --menu 'Selecione a opção com a seta ou o número e tecle Enter\n' 0 0 0 \
                1 'Atualizar repositórios' \
                2 'Instalar LAMP e outros' \
                0 'Sair' )
    case $servico in
      1) apt update;;
      2) clear;
# LAMP
apt install -y apache2 libapache2-mod-php7.4 git aptitude composer mc curl phpunit;
apt install -y mariadb-server postgresql;
apt install -y php7.4 php7.4-bcmath php7.4-gd php7.4-mysql php7.4-pdo-mysql php7.4-pdo-pgsql php7.4-curl;
apt install -y php-pear php7.4-xml php7.4-xsl php-xdebug php7.4-intl;
apt install -y php7.4-zip php7.4-mbstring php7.4-fpm;
phpenmod mbstring;

apt install -y php-apcu;
wget http://spout.ussg.indiana.edu/linux/ubuntu/pool/main/m/memcached/memcached_1.5.22-2ubuntu0.1_amd64.deb;
dpkg -i memcached_1.5.22-2ubuntu0.1_amd64.deb;
apt install -y php-memcache;
a2enmod rewrite;
systemctl restart apache2;

# Instalar outros softwares
apt install -y rar unrar zip unzip p7zip-full kolourpaint searchmonkey;
add-apt-repository -y ppa:linuxuprising/shutter && apt update && apt install -y shutter;

#Cubic
apt-add-repository -y ppa:cubic-wizard/release
apt update
apt install -y cubic

# Alarme
wget https://go.microsoft.com/fwlink/?LinkID=760868
wget http://launchpadlibrarian.net/206882204/alarm-clock-applet_0.3.4-1_amd64.deb
dpkg -i alarm-clock-applet_0.3.4-1_amd64.deb
apt install -f

#Desinstalar alguns pacotes que não uso

apt remove -y --purge thunderbird
apt remove -y --purge timeshift
apt update;
apt upgrade -y;
apt autoremove;;
      0) clear;exit;;
   esac
done
