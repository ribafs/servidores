# Rsync

## O que é Rsync?

Rsync significa "sincronização remota", é uma ferramenta de sincronização remota e local de arquivos. Ele usa um algoritmo que minimiza a quantidade de dados copiados movendo apenas as partes dos arquivos que foram alteradas.

É incluído na maioria das distribuições Linux por padrão.

## Sintaxe Básica

A sintaxe básica do rsync é muito direta e opera de maneira semelhante ao ssh, scp e cp.

## Exemplo

Vamos criar dois diretórios e alguns arquivos dentro deles assim:
```bash
cd ~
mkdir dir1
mkdir dir2
touch dir1/file{1..100}

ls dir1
ls dir2
```
Com isso agora temos o dir1 com 100 arquivos vazios dentro dele e o dir2 ainda vazio.

### Sincronizar o conteúdo de dir1 com dir2 estando no mesmo computador

Execute
```bash
rsync -r dir1/ dir2
ls dir1
ls dir2
```
/ - a barra ao final do dir1 indica que não desejamos copiar o dir1, mas somente seu conteúdo. Caso façamos assim:

rsync -r dir1 dir1, então ficará assim o conteúdo de dir2: (somente o dir1 e dentro de dir1 os 100 arquivos)
```bash
~/dir2/dir1/[files]
```
-r para recursivo, necessário para sincronização de diretórios

## Sincronizar recursivamente e preservando os links simbólicos

-a - (archive) sincronizar recursivamente e preservando os links simbólicos, arquivos especiais e de dispositivo, horários de modificação, grupo, proprietário e permissões. É mais comumente usado do que -r e geralmente é o que você deseja usar.
```bash
n - checar argumentos anes de executar
v - verbose

rsync -anv dir1/ dir2
```
## Usando o rsync com um servidor remoto

É simples quando temos SSH e rsync em ambos os lados
Enviar o dir1 para o servidor, incluindo o diretório

### Operação push
Sincroniza o diretório remoto enviando do local
```bash
rsync -a ~/dir1 username@remote_host:destination_directory
```
Obs.: Como no comando cp e em outras ferramentas similares o source é sempre o primeiro argumento e o destination o segundo.

### Operação pull
Sincroniza o diretório local com o remoto, recebendo do remoto
```bash
rsync -a username@remote_host:/home/username/dir1 place_to_sync_on_local_machine
```
## Adicionando compressão

z - se estamos emviando arquivos não compactados, como txt, php, podemos reduzir o tempo de transferência usando -z para compactar.
```bash
rsync -az source destination
```
## Progesso e continuar envios interrompidos

P - progess e partial, envio incremental, somente se houver alterações
```bash
rsync -azP source destination
```
ending incremental file list

Caso rode o mesmo comando novamente verá nada de progresso, pois como não houve alteração ele não envia nada.

Experimente
```bash
    touch dir1/file{1..10}

    rsync -azP source destination
```
## Delete do destino, se a origem deletou

Por default o rsync não deleta. Para que ambos, origem e destino estejam ealmente sincronizados, é necessário remover os arquivos do destino se na origem foram removidos.

Antes de executar o delete, cheque antes com -n
```bash
rsync -an --delete source destination
```
Somente após confirmar que está tudo ok, execute
```bash
rsync -a --delete source destination
```
## Sincronizar e excluir arquivos ou diretórios do destino
```bash
rsync -a --exclude=pattern_to_exclude source destination
```
## Incluindo arquivos ou diretórios
```bash
rsync -a --exclude=pattern_to_exclude --include=pattern_to_include source destination
```
## Backup de alguns arquivos
```bash
rsync -a --delete --backup --backup-dir=/path/to/backups /path/to/source destination 
```
Crédito
https://www.digitalocean.com/community/tutorials/how-to-use-rsync-to-sync-local-and-remote-directories-on-a-vps
https://www.digitalocean.com/community/tutorials/how-to-use-rsync-to-sync-local-and-remote-directories-pt

## User ribafs enviar o arquivo file.zip para a pasta Rel_1 do seu projeto joomlar:
```bash
rsync -e ssh file.zip ribafs@frs.sourceforge.net:/home/frs/project/joomlar/Rel_1/
```
Recebendo arquivos
```bash
rsync -avP -e ssh jsmith@frs.sourceforge.net:/home/frs/project/mint-prog/ /backup/backup_sf
```
## Dicas
```bash
rsync -av -e 'ssh -p 65522' --progress --delete-after /backup/transp/rsync/ ribafs@178.62.122.149:/home/ribafs/rsync/
```
Com porta diferente da 22
```bash
rsync -arvz -e 'ssh -p <port-number>' --progress --delete user@remote-server:/path/to/remote/folder /path/to/local/folder
```
Do desktop para o server
```bash
rsync -avz -e 'ssh -p 65522' --progress /backup/transp/rsync/ ribafs@178.62.122.149:/home/ribafs/rsync/
```
Passar a senha pelo cron
```bash
ssh-keygen

ssh-copy-id -i ~/.ssh/id_rsa.pub ribafs192.168.200.10 -p 65522

sudo crontab -e

30 12 * * * rsync -aq -e 'ssh -p 65522' /backup/transp/rsync/ ribafs@178.62.122.149:/home/ribafs/rsync/
```


