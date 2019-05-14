# IPlog para Magento2

Este modulo é responsável por adicionar o ip de um vistante ao debug log.

## Como funciona

O modulo utiliza um event listener para verificar quando uma requisição é feita no
frontend. Quando um visitante entra em alguma pagina o evento "controller_action_predispatch" é disparado e então o Observer do modulo IpLog realiza a ação de adicioanr o IP do visitante ao debug log.

## Pré-Requisitos

* Magento 2.3
* Distribuição linux baseada em Ubuntu (distro utilizada no projeto: Linux Mint 19.1)

### Instalação e ativação do mudulo.

Utilizando um usuário com permissões para realizar mudanças no magento copie a pasta "Teste" para a pasta `/<raiz-magento>/app/code/` utilizando um file manager ou os comandos abaixo. 
Crie a pasta code caso ela não exista.

```
mkdir <raiz-magento>/app/code #Caso a pasta não exista
cp -r Teste/ <raiz-magento>/app/code/
```

Altere o dono da pasta "Teste" para o usuário do web-server. Neste projeto a o web-server utilizado é o apache2, nas distro baseadas em ubuntu seu user e group normalmente é "www-data"

```
sudo chown www-data:www-data Teste/
```
Para ter acesso ao debug log é necessário mudar para o modo developer do magento. utilize o comando abaixo dentro da pasta `/<raiz-magento>/`.
```
php bin/magento deploy:mode:set developer
```
Agora liste o mudule status para verificar que o magento 2 reconheceu o modulo. O moudulo "Teste_IpLog" deverá aparecer abaixo do titulo "List of disabled modules:". utilize o comando abaixo para listar o module status.
```
php bin/magento module:status
```
Habilite o modulo "Teste_IpLog" com o comando abaixo.
```
php bin/magento module:enable Teste_IpLog
```
**Pronto,  agora  o modulo já está instalado e habilitado.**


## Testando o mudulo

Para testar o modulo basta entrar na pagina do Magento e abrir o debug log (locazilado na pasta `/<raiz-magento>/var/log/debug.log` )
![Alt text](/../<master>/pic1.png?raw=true "Optional Title")
