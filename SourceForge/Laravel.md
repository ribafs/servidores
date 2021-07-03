# Usando o laravel no SourceForge

Não temos aacesso ao SSH então o trabalho com o Laravel fica bem restrito.

Primeira limitação

Somente poderemos usar a versão 5.8, que requer php 7.1.3

O sf oferece a versão 7.1.28

Lembre de mudar o tamanho do campo email em users para 191

  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,

Ou não importará.

## Envio do aplicativo.

Como não podemos criar lá, usando o composer, não tenho como descompactar arquivos no sftp e não tenho acesso via ssh, então criarei o aplicativo com laravel 5.8 e enviarei todos os arquivos através do Filezilla.


