<?php

$link = mysql_connect('localhost', 'root', 'Bissada');
if (!$link) {
    die('Not connected : ' . mysql_error());
}

// make foo the current db
$db_selected = mysql_select_db('customers', $link);
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}

?>