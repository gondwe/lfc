<div class=""><?=topic('religion data')?></div>
<?php 

$d = new tablo("dataconf");
$d->hide("c,d");
$d->hidden("a","religion");
$d->aliases("b,name of religion");
$d->newform();



?>
<hr>
<?php 
$ds = new tablo("dataconf","religion");
$ds->sqlstring = "select id, ucase(b) as religion from dataconf where a = 'religion'";
$ds->table(0);