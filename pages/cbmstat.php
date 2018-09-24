
<!-- <div class="" style="margin-top:10%"> -->
    <span class="min-chart" id="chart-sales" data-percent="56"><span class="percent"></span></span>
    <h3><span class="label text-warning">	Others 16 yrs & Above ABCM <i class="fa fa-arrow-circle-up"></i></span></h3>
    <h5><span class="label text-info">Refraction 0-15 yrs OBM <i class="fa fa-arrow-circle-right"></i></span></h5>
<!-- </div> -->
<?php

$f = array_column(getlist("describe cbm_data"),"Field");
unset($f[9]);
array_shift($f);
function c ($a){
    return "sum(".$a.") as `$a` ";
}


$n = implode(",", array_map("c",$f));
// spill($f);
// spill($n);

$sql = " select diag,$n from cbm_data group by diag ";
$d = get($sql);
// spill($d);
echo '<div class="col-md-11 col-sm-12 col-lg-11">';
table($d);
echo "</div>";

?>
<script>
$(function () {
    $('.min-chart#chart-sales').easyPieChart({
        barColor: "#4caf50",
        onStep: function (from, to, percent) {
            $(this.el).find('.percent').text(Math.round(percent));
        }
    });
});
</script>