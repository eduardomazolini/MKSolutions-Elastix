# MKSolutions-Elastix

Esse projeto é simples e tem o intuito de colocar no CallID do PABX Elastix o codigo do cliente e o nome unidos com "_".
Para isso foi necessário instalar no servidor o php5-pgsql com o comando:
apt-get install php5-pgsql 

# Passo a passo
1. Instale o php5-pgsql como root no servidor da MK. Comando:
apt-get install php5-pgsql

2. Copie por ftp ou do github o arquivo cidlookup.php para /var/www do serivdor da MK. Comando:
curl https://raw.githubusercontent.com/eduardomazolini/MKSolutions-Elastix/master/cidlookup.php -o /var/www/cidlookup.php

3. No asterisk crie a consulta a Base em: PBX -> PBX Configuration -> Inbound Call Control -> CallerID Lookup Sources.
Source Description: Constula MK
Source type: HTML
Cache results: Opcional eu deixo marcado
Host: <IP do seu servidor MK>
Port: 80
Username:
Password:
Path: /cidlookup.php
Query: number=[NUMBER]

4. No asterisk modifique a rota de entrada em: PBX -> PBX Configuration -> Inbound Call Control -> Inbound Routes.
CID Lookup Source
Source: Constula MK
