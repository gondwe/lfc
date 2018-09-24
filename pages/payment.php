<?php

$sql = "select arname, pos, receiptno, amount, paid, changee, tax, staff, arcode as mode, pname as patient, cardno, pdoc as doctor, posdate as date_ from pos_header order by posdate limit 300 ";
$q = get($sql);
spill($q);