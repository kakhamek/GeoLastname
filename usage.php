<?php

require_once("GeoLastname.php");

try {

    $output = new GeoLastname('მექვაბიშვილი');

    $mothkhrobiti = $output->transform('MO');
    echo 'მოთხრობითი ფორმა: ' . $mothkhrobiti . PHP_EOL;
    // მოთხრობითი ფორმა: მექვაბიშვილმა

    $mitsemiti = $output->transform('MI');
    echo 'მიცემითი ფორმა: ' . $mitsemiti . PHP_EOL; 
    // მიცემითი ფორმა: მექვაბიშვილს

    $natesaobiti = $output->transform('NA');
    echo 'ნათესაობითი ფორმა: ' . $natesaobiti . PHP_EOL;
    // მიცემითი ფორმა: მექვაბიშვილის

} catch (InvalidArgumentException $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
}