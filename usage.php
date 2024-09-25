<?php

require_once("GeoLastname.php");

try {

    $output = new GeoLastname('მექვაბიშვილი');

    $narrative = $output->transform('MO');
    echo 'მოთხრობითი ფორმა: ' . $narrative . PHP_EOL;
    // მოთხრობითი ფორმა: მექვაბიშვილმა

    $dative = $output->transform('MI');
    echo 'მიცემითი ფორმა: ' . $dative . PHP_EOL; 
    // მიცემითი ფორმა: მექვაბიშვილს

    $genitive = $output->transform('NA');
    echo 'ნათესაობითი ფორმა: ' . $genitive . PHP_EOL;
    // ნათესაობითი ფორმა: მექვაბიშვილის

} catch (InvalidArgumentException $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
}
