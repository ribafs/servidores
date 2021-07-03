<?php require_once './header.php'; ?>

<h2>Usando o clamav</h2>

<b>Checando</b>
<br>
clamscan -r /home/ribafs
<br>
clamscan -r /
<br><br>
<b>Checar em todo o computador</b>
<br>
clamscan -r --bell -i /
<br><br>
<b>Criar lista de arquivos infectados</b>
<br>
clamscan -r /home/ribafs/ | grep FOUND >> report.txt
<br><br>
<b>Checar Versão</b>
<br>
clamdscan -V
<br><br>
<b>Adicionando ao cron</b>
<br>
crontab -e
<br>
00 00 * * * clamscan -r /home
<br><br>
<b>Instalar gui</b>
<br>
apt-get install ClamTK
<br><br><br>
<a href="https://www.unixmen.com/installing-scanning-clamav-ubuntu-14-04-linux/">Referência</a>


<?php require_once '../footer.php'; ?>
