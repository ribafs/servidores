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

# GitHub Desktop
wget -qO - https://packagecloud.io/shiftkey/desktop/gpgkey | sudo apt-key add -
sudo sh -c 'echo "deb [arch=amd64] https://packagecloud.io/shiftkey/desktop/any/ any main" > /etc/apt/sources.list.d/packagecloud-shiftky-desktop.list'
sudo apt-get update
sudo apt install -y github-desktop

# Redes
apt install -y htop clamav clamav-daemon clamav-freshclam filezilla kolourpaint vlc gimp inkscape

#Desinstalar alguns pacotes que não uso

apt update;
apt upgrade -y;
apt autoremove -y;;
      0) clear;exit;;
   esac
done
