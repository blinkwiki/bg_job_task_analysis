<?php

$db_hn = 'localhost';
$db_nm = 'bagasoo_simca_itraqs';
$db_un = 'root';
$db_ps = '';

$conDemo = mysql_pconnect($db_hn, $db_un, $db_ps) or trigger_error(mysql_error(),E_USER_ERROR); 

mysql_select_db($db_nm);

?>