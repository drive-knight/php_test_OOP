<?php

require_once "Tree.php";
require_once "FruitPicker.php";

$a = new FruitPicker();

$a->addTree('Apple Tree', 10);
$apple_t = 0;
foreach ($a->showGarden() as $tree) {
    if (get_class($tree) === AppleTree::class) {
        $apple_t += 1;
    }
}
echo 'Apple trees:', ' ', $apple_t, PHP_EOL;

$a->addTree('Pear Tree', 15);
$pear_t = 0;
foreach ($a->showGarden() as $tree) {
    if (get_class($tree) === PearTree::class) {
        $pear_t += 1;
    }
}
echo 'Pear trees:', ' ', $pear_t, PHP_EOL;

echo 'All fruits:', ' ', $a->gatherFruits(), PHP_EOL;

foreach ($a->gatherTypeFruits() as $key => $item) {
    echo $key, ': ', $item, PHP_EOL;
}

foreach ($a->countWeight() as $key => $item) {
    echo $key, ': ', $item, ' gr', PHP_EOL;
}