# MKSolutions-Elastix

Esse projeto é simples e tem o intuito de colocar no CallID do PABX Elastix o codigo do cliente e o nome unidos com "_".
Para isso foi necessário instalar no servidor o php5-pgsql com o comando:
apt-get install php5-pgsql 

# Passo a passo
1. Instale o php5-pgsql como root no servidor da MK. Comando:</br>
apt-get install php5-pgsql

2. Copie por ftp ou do github o arquivo cidlookup.php para /var/www do serivdor da MK. Comando:</br>
curl https://raw.githubusercontent.com/eduardomazolini/MKSolutions-Elastix/master/cidlookup.php -o /var/www/cidlookup.php

3. No asterisk crie a consulta a Base em: PBX -> PBX Configuration -> Inbound Call Control -> CallerID Lookup Sources.
*Source Description:* Constula MK </br>
*Source type:* HTML</br>
*Cache results:* **Opcional eu deixo marcado**</br>
*Host:* **IP do seu servidor MK**</br>
*Port:* 80</br>
*Username:*</br>
*Password:*</br>
*Path:* /cidlookup.php</br>
*Query:* number=[NUMBER]</br>

4. No asterisk modifique a rota de entrada em: PBX -> PBX Configuration -> Inbound Call Control -> Inbound Routes.</br>
CID Lookup Source</br>
Source: Constula MK
