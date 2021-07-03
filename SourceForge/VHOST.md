# Usando VHOSTs

## Usando nosso domínio no SF

## Acessar a administração do doomínio

Alterarações necessárias

Exemplo de domínio - ribafs.me

Acesso ao PHP 5 - default pool:
- vhost.sourceforge.net com IP 216.105.38.10

Acesso ao PHP 7
- vhost2.sourceforge.net com IP 216.105.38.11

### Configurando para o default (PHP 5)

ribafs.me IN A to 216.105.38.10.
www.ribafs.me CNAME to vhost.sourceforge.net.

### Configurando para o PHP 7

ribafs.me IN A to 216.105.38.11.
www.ribafs.me CNAME to vhost2.sourceforge.net.


## Documentação

https://sourceforge.net/p/forge/documentation/Custom%20VHOSTs/

Podemos ter no máximo 10 VHosts em cada projeto.

Um VHOST deve ser adicionado para cada domínio que adicionamos ao SF. Exemplo: um VHOST para dominio.org e outro para www.dominio.org.

## Criar um VHOST

 Your project currently has 0 VHOSTs out of a maximum 10 permitted for your project.
Add New Virtual Host

Please follow the VHOST Services instructions. This documentation covers the correct way to configure your DNS services to direct traffic to your VHOST at SourceForge.net.

One VHOST should be added for each domain for which you wish for us to answer traffic. For example, separate VHOSTs would need to be added for yourhost.org and www.yourhost.org. Clicking on the "Create" button will schedule your VHOST for creation; the process is typically finished within 5 minutes.

Your VHOST domains will not work with HTTPS.
New virtual host:

Acesse o seu projeto onde deseja adicionar um domínio
- Admin
- Role a ela e clique em VHost DNS

Entre com o nome (Ex: www) e clique em Create
Será agendado para a criação e demora geralmente 5 minutos

https://sourceforge.net/p/joomlar/admin/ext/vhost/

## Configurações do VHOST

https://sourceforge.net/p/forge/documentation/Custom%20VHOSTs/



