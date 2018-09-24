
<?php

$q = get("Select ucase(pname) as patient, cnumber as card, receipt, ebase as base,collected, opdate, ckrm, sod, sos, cod, cos from optical_orders order by opdate desc");
echo "<h5>Optical Orders</h5>";
echo '<div class="btn btn-primary pull-right m-2">Optical Items List</div>';

datatable($q,"optical/orders");