<?php require_once './header.php'; ?>

<h2>Relação dos Scripts e alguns detalhes</h2>

Scripts e aliases tornam as nossas vidas melhores, pois economizam tempo evitando tarefas repetitivas que já sabemos fazer.
<br>
Exemplo: para ajustar as permissões numa nova pasta de /var/www/html, eu executava:
<pre>
find /var/www/html/novapasta/ -type d -exec chmod 775 {} \;
find /var/www/html/novapasta/ -type d -exec chmod ug+s {} \;
find /var/www/html/novapasta/ -type f -exec chmod 664 {} \;
chown -R ribafs:www-data /var/www/html/novapasta/
</pre>

Assim os arquivos da novapasta ficam disponíveis pelo navegador e o user ribafs também tem acesso a eles via terminal e gerenciador de arquivos. Para isso, antes preciso adicionar o ribafs ao grupo do www-data:

<pre>
sudo adduser ribafs www-data
</pre>
Sabe como eu faço isso com um script?

Apenas executo:
<pre>
sudo perms novapasta
</pre>
Porque criei um script na pasta /usr/local/bin chamado perms e que recebe um parâmetro, que é a novapasta, que no script fica como $1
E coloquei uma boa quantidade deles. Use, customize-os e torne seu dia mais produtivo e até agradável, por não estar realizando tarefas repetitivas, que você já sabe fazer.
<br>
Na pasta /usr/local/bin
<pre>
    • buscastr 
    • cr 
    • crr 
    • del2 
    • delt 
    • docean 
    • gs 
    • ins28s 
    • l7 
    • l8 
    • l58 
    • m 
    • pa 
    • paclear 
    • perms 
    • permsl 
    • recriardb 
    • search 
    • sftpsf 
    • sr1 
    • sr18s 
    • sshk 
    • ubin 
    • umod 
</pre>
Esperimente abrir o terminal, após instalar esta ISO, mesmo numa VM. Estando no /var/www/html, digitar:
<pre>
l8 blog
</pre>
Tecle enter quando aparecer [no] e aguarde a instalação do laravel 8 com autenticação no diretório blog.
<br>
Veja o arquivo scripts.md para explicação sobre cada um deles.


<h4>Listar maiores arquivos de diretório</h4>
<pre>
du --human-readable * | sort --human-numeric-sort

ou

du -h | egrep -v "\./.+/" | sort -h
</pre>

<?php require_once '../footer.php'; ?>
