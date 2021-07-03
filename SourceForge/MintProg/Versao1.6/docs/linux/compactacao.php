<?php require_once './header.php'; ?>

<h2>Compactar e Descompactar no Terminal</h2>

Dica

No gerenciador de arquivos do modo gráfico, nemo, basta clicar com o botão direito sobre um arquivo para descompactar, ou selecionar vários e clicar em compactar. Basta então selecionar o formato.

<h4>Instalar compactadores para Linux</h4>

sudo apt-get install unace zip unzip p7zip-full p7zip-rar sharutils uudeview mpack arj unrar rar lzma lha lzma-dev rar unrar-free ark ncompress

<h4>Compactação zip</h4>

zip pacote.zip arquivoa.txt arquivob.txt arquivoc.odt

zip pacote.zip *.txt

zip -r documentos.zip /usr/*.txt

<h5>Opções:</h5>
<pre>
-r recursivo
-1 rápido
-9 maior compactação
-D compactar somente arquivos, nada de diretório
-x arquivos - excluir da compactação alguns arquivos
</pre>

<h4>Descompactação</h4>

unzip nome.zip

Em diretório específico

unzip nome.zip -d /tmp

<h4>Compactar arj</h4>

arj a pacote.arj arquivo.odt

Descompactar

arj x pacote.arj


<h4>Compactar tar</h4>

tar -czpvf pacote.tar arquivo1.gif memorando.htm carta.doc

tar -czpvf pacote.tar pasta

Descompactar:

tar -zxpvf nomedoarq.tar


<h4>Compactar tar.gz</h4>

tar -czpvf pacote.tar.gz arquivo1.gif memorando.htm carta.doc

tar -czpvf pacote.tar.gz pasta

<h4>Descompactar no diretório atual</h4>

tar -zxpvf pacote.tar.gz -C /tmp

<h4>tar.bz2</h4>

tar -jxpvf pacote.tar.bz2

Descompactar apenas um arquivo de dentro do pacote

tar -xvf pacote.tar.gz foto1.png

<h5>Lista de parâmetros do tar:</h5>
<pre>
-c – cria um novo arquivo tar;
-M – cria, lista ou extrai um arquivo multivolume;
-p – mantém as permissões originais do(s) arquivo(s);
-r – acrescenta arquivos a um arquivo tar;
-t – exibe o conteúdo de um arquivo tar;
-v – exibe detalhes da operação;
-w – pede confirmação antes de cada ação;
-x – extrai arquivos de um arquivo tar;
-z – comprime ou extrai arquivos tar resultante com o gzip;
-j – comprime ou extrai arquivos tar resultante com o bz2;
-f – especifica o arquivo tar a ser usado;
-C – especifica o diretório dos arquivos a serem armazenados.
</pre>


<h4>Compactar gzip</h4>

gzip documentos.odt

Descompactar

gunzip documentos.odt.gz


<h4>Compactar bzip2</h4>

bzip2 pacote.gz

Descompactar

bunzip2 pacote.bz2

bunzip2 pacote.tar.bz2


<h4>Compactar rar</h4>

rar a pacote.rar arquivoa arquivob

rar a pacote.rar /pasta

Descompactar

unrar x pacote.rar


<h4>Compactar 7z</h4>

7za a pacote.7z arquivoa arquivob

Descompactar

7za x pacote.7z


<h4>Compactar lha</h4>

lha a pacote.lha arquivoa arquivob

Descompactar

lha x pacote.lha


<h4>Compactar zoo</h4>

zoo a pacote.zoo arquivoa arquivob

Descompactar

zoo x pacote.zoo

Ajuda sobre um dos compactadores acima:

man nome_compactador

Ex:

man arj

<h5>Referências</h5>

http://blog.kolaborativa.com/2011/10/compactar-e-descompactar-arquivos-zip-rar-tar-gz-bz2-tar-tar-bz2-pelo-terminal/
<br>
https://linuxdicasesuporte.blogspot.com.br/2015/03/compactacao-de-arquivos-para-debian.html


<?php require_once '../footer.php'; ?>
