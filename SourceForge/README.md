# Projeto mint-prog no Sourceforge.net

Algumas informações de como criar projetos no Sourceforge. Tentando suavizar sua experiência, para que não passe pelos problemas que passei para criar projetos web, para grandes arquivos e Git.

## SSH

### Gerar e Enviar chave pública do SSH para o SF

https://sourceforge.net/auth/shell_services

### Gerando a chave no desktop
```bash
ssh-keygen -t ed25519 -C "ribafs@shell.sf.net"
```
### Exibir
```bash
cat ~/.ssh/id_rsa.pub
```
### Copiar

### Colar na caixa SSH Public Keys da página abaixo

https://sourceforge.net/auth/shell_services

No caso do Ubuntu, usa bash, como muitos


## Enviar uma ISO para o SF via rsync
```bash
rsync -avz /backup/transp/0ProjetosAtuais/MintProg/Versao1.9/docs/* ribafsweb.sourceforge.net:/home/project-web/mint-prog/htdocs/docs/
```
ou via SCP
```bash
scp -r /backup/transp/0ProjetosAtuais/MintProg/Versao1.8/docs/* ribafsweb.sourceforge.net:/home/project-web/mint-prog/htdocs/docs/
```
Agradecimento ao colega Kenio Farias do grupo PHP Brasil no Facebook pelas sugestões. :)

Após testar o live

Enviar o README, o MD5 e a ISO para o SF.

Copiar para a pasta Realease1.9 do SF
```bash
rsync -avz /backup/Linux/Distros/mint-20-cin64-prog-1.9.md5 ribafs@frs.sourceforge.net:/home/frs/project/mint-prog/Release1.9/
rsync -avz /backup/Linux/Distros/mint-20-cin64-prog-1.9.iso ribafs@frs.sourceforge.net:/home/frs/project/mint-prog/Release1.9/
```

## Transferência de arquivos

Via web

https://sourceforge.net/projects/joomlar/upload/

Via sftp

Caso sejam apenas arquivos, sem pastas. Quando for uma pasta com outras dentro, acho melhor usar o SCP.
```bash
sftp ribafs@web.sourceforge.net
cd /home/project-web/mint-prog/htdocs
```
Enviar os arquivos da pasta local /backup/sf/mint-prog/ para o htdocs no SF
```bash
put /backup/sf/mint-prog/*
```
Então poderemos acessar no site abaixo

https://mint-prog.sourceforge.io

Dicas
```bash
get     Copy a file from the remote host to the local computer. -r para enviar recursivamente
put     Copy a file from the local computer to the remote host. -r para receber recursivamente 
lcd     Change the directory on the local computer.
lls     List the contents of the current directory on the local computer.
lmkdir  Create a directory on the local computer. 
mkdir
lpwd    Show the present working directory on the local computer. 
pwd     Show the present working directory on the remote host. 
cd
ls
chmod
```
Copiar pastas e recursivamente no sftp

Tenho uma pasta no desktop "teste" e dentro dela a pasta "tein".

/home/ribafs/sf/teste

Acesso o servidor com sftp

Preciso criar a pasta teste com o sftp

mkdir teste

Então

put -r /home/ribafs/sf/teste

Ok

## Removendo diretórios com SFTP

Tenho o diretório teste no servidor, com alguns arquivos dentro.

rm teste/*

rmdir teste

Prontinho. Com a ajuda dos amigos do StackOverflow e SuperUser.com

## Configurações para o FileZilla

- Arquivo
- Gerenciador de sites
- New site - SF
- Protocolo - SFTP
- Host - web.sourceforge.net
- Porta - 2
- Usuário - ribafs
- Avançado
- Pasta remota padrão - /home/project-web/mint-prog/htdocs
- Conectar

Via SCP

Enviar uma pasta com subpastas para o htdocs em projeto web
```bash
scp /home/ribafs/mint-prog/* ribafs@web.sourceforge.net:/home/project-web/mint-prog/htdocs/portal
```
Enviar uma ISO para um projeto tipo
```bash
scp /home/ribafs/mint20-cin64-prog3.iso ribafs@frs.sourceforge.net:/cd /home/frs/project/mint-prog/Release1
```
Referência:

https://linuxize.com/post/how-to-use-scp-command-to-securely-transfer-files/

Via rsync

Enviar

ribafs enviar o arquivo local file.zip para a pasta Release1 do seu projeto mint-prog no SF:
```bash
rsync -e ssh file.zip ribafs@frs.sourceforge.net:/home/frs/project/mint-prog/Release1/
```
Receber

User ribafs trazer de frs.sourceforge.net:/home/frs/project/mint-prog para /backup/sf/mint-prog
```bash
rsync -avP -e ssh ribafs@frs.sourceforge.net:/home/frs/project/mint-prog/ /backup/sf/mint-prog
```
Referência

https://www.digitalocean.com/community/tutorials/how-to-use-rsync-to-sync-local-and-remote-directories-on-a-vps

Via Git

O Git é usado principalmente por projetos que trabalham com código fonte, como no GitHub, não para hospedar arquivos binários, nem para projeto web.

Usando pela Primeira vez

## Clonando o projeto do SF

Acesse a áres do seu projeto. Exemplo como se o mint-ptog fosse um projeto assim.

https://sourceforge.net/p/mint-prog/code/ref/master/

Aparecem as 3 opções para envio. Prefiro o SSH
```bash
git clone ssh://ribafs@git.code.sf.net/p/joomlar/code joomlar
```
No desktop
```bash
cd /backup/sf
```
Projeto mint-prog
```bash
git clone ssh://ribafs@git.code.sf.net/p/mint-prog/code mint-prog
cd mint-prog
git config --global user.name "Ribamar FS"
git config --global user.email "ribafs@gmail.com"
git init
git add .
git commit -a -m 'Initial commit'
git push -u origin master
```
Nas próximas vezes, para enviar arquivos

No desktop
```bash
cd /backup/sf/mint-prog
git remote add origin ssh://ribafs@git.code.sf.net/p/mint-prog/code
git push -u origin master
```
Nas próximas vezes, para receber arquivos
```bash
cd /backup/sf/mint-prog
git remote add origin ssh://ribafs@git.code.sf.net/p/joomlar/code
git pull
```
## Nas próximas vezes, para sincronizar os repositórios local e remoto no SF
```bash
cd /backup/backup_sf/joomlar
git remote add origin ssh://ribafs@git.code.sf.net/p/mint-prog/code
git add .
git commit -m "Mensagem de commit"
git pull
git push -u origin master
```

## Hosts do SF

Projeto Web - web.sourceforge.net

Projetos FRS - frs.sourceforge.net (envio de arquivos grandes, ISO, zip, etc)

```bash
ssh -t ribafs@shell.sourceforge.net create
```
Acesso para alguns projetos não tenho. Talvez por caracterizar um projeto de desenvolvimento, pois importei para ele um repositório do GitHub.

Mas pelo projeto joomlar
```bash
ssh -t ribafs,joomlar@shell.sourceforge.net create
```

Eu tenho acesso.

Depois de conectado podemos navegar por qualquer dos nossos projetos:
```bash
cd /home/project-web/mint-prog/htdocs
```
Quero enviar o composer.phar para o SF. Como não permite baixar com o wget, baixo para meu desktop e envio pelo SCP. Mas não consigo executar, pois o composer precisa de acesso a outros sites e isso é bloqueado.


## Minha forma preferida de gerenciar projetos no SourceForge

Como existem muitas ferramentas para a transferência de arquivos, então precisamos conhecer as características de cada uma para jum uso racional.

Envio pelo site

Este permite o envio de arquivos de até 1 GB, mas somente envio. Depois de enviar poderemos renomear, excluir, etc.

https://sourceforge.net/projects/joomlar/upload/

Via SCP

A melhor ferramenta para cópia de arquivos. Tanto enviar, quanto receber. Tanto arquivos, quanto pastas recursivamente. Mas sem interatividade, sem shell.

Bom para arquivos zipados, ISO, etc.

Via SFTP

Este tem recursos que o SCP não tem. Pode remover arquivos, visto que ele tem um shell que abre lá no SF. Enviar e receber, mas somente para arquivos, quando envolve pastas fica muito trabalhoso com ele.

Via rsync

O recomendado pelo SourceForge para o envio de arquivos grandes, como ISOs. Também envia e recebe. Recomendado também para backup do projeto, pois pode criar backup incremental.

Via Git

O mais adequado para arquivos pequenos, mas não somente. Usando o git foi a forma mais produtiva para remover diretórios com recursividade. O mais indicado para trabalhar com projetos de desenvolvimento.

Resumindo

    Enviar ou receber poucos arquivos, criar uma pasta e remover uma pasta com poucos arquivos - SFTP.

    Enviar e receber arquivos grandes, enviar e receber pastas com recursividade - SCP. Existe também o rsyns.

    Excluir pastas com recursividade, enviar e receber muitos arquivos pequenos, inclusive pastas com recursividade - Git.

Veja os outros arquivos deste repositório, com informações sobre PHP, MySQL, SSH, etc.

## Licença

MIT

