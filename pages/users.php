<?php 

$users = get("select u.username, u.email, u.names, ut.names as user_type, u.phone from users as u left join user_types as ut on ut.id = u.user_type");


// $d  = new tablo("users");
// $d->sqlstring = "select id, username, email, names, user_type, phone from users";
// $d->table();


?>
<h4>Users</h4>

<?=datatable($users,"users/add")?>

