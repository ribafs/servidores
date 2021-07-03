<?php require_once './header.php'; ?>

<h3>Gerenciador de downloads para o modo texto</h3>
<br>
<b>Para baixar um arquivo grande, que pode cair, então continuar o download</b>
<br>
wget -c https://URL/arquivo.iso
<br><br>
<b>Caso caia a conexão e seja interrompido o download basta executar novamente, que será continuado</b>
<br>
wget -c https://URL/arquivo.iso
<br><br>
<b>Pode ser usado para fazer o download de um site completo</b>
<br>
Crie um script com nome wget.sh com o conteúdo abaixo
<br><br>
<pre>
wget \
     --recursive \
     --no-clobber \
     --page-requisites \
     --html-extension \
     --convert-links \
     --restrict-file-names=windows \
     --no-parent \
$1

# Exemplo: Baixar a documentação do Laravel 8
# Execute: 
# sh wget.sh https://laravel.com/docs/8.x
</pre>

<?php require_once '../footer.php'; ?>
