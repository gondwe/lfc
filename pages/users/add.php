<?php 

$d = new tablo("users");
$d->sqlstring = "select u.username, u.email, u.names, ut.names as user_type, u.phone from users as u left join user_types as ut on ut.id = u.user_type";
$d->combos("user_type","select id, names from user_types");
echo "<h5 class='pull-left text-info'>Users/Add</h5>";
$d->newform();