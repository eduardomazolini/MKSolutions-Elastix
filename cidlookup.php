<?php
header("Content-Type:text/plain");
//pega apenas os últimos 8 digitos do telefone para comparar se quiserem podem extender para 10 ou 11 
//lembrem que algumas operadoras inciam o bina com 0 + DDD outras não mandam o DDD.
$phone=substr($_GET['number'],-8);

// Connecting, selecting database
$dbconn = pg_connect("host=localhost dbname=mkData user=postgres password=foo")
    or die('Could not connect: ' . pg_last_error());

// Performing SQL query
$query = 'select replace(codpessoa||\'_\'||nome_razaosocial,\' \',\'_\') as callerid from mk_pessoas
where fone01 like \'%'.$phone.'\' or fone02 like \'%'.$phone.'\' or fax like \'%'.$phone.'\'
limit 1';
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

// Printing result
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    foreach ($line as $col_value) {
        header("Content-Type:text/plain");
	echo "$col_value\n";
    }
}
// Free resultset
pg_free_result($result);

// Closing connection
pg_close($dbconn);
?>
