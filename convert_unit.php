<?php
$input = floatval($_GET['input']);
$unit_from = intval($_GET['unit_from']);
$unit_to = intval($_GET['unit_to']);

$dist = $unit_from - $unit_to;
if ($dist > 0) {
    for ($i = 1; $i <= $dist; $i++) {
        $input *= 10;
    }
} else if ($dist < 0) {
    for ($i = 1; $i <= abs($dist); $i++) {
        $input /= 10;
    }
}

echo 'Result = ' . $input;
