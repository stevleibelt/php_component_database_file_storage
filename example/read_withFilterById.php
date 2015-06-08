<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-06-08
 */

require_once __DIR__ . '/../vendor/autoload.php';

$factory    = new \Net\Bazzline\Database\FileStorage\StorageFactory();
$storage    = $factory->create();
$path       = __DIR__ . '/storage';

$storage->injectPath($path);

$collection = $storage->read();
$filterById = null;
$iterator   = 0;

foreach ($collection as $id => $data) {
    //we want to fetch the second id
    if ($iterator < 2) {
        $filterById = $id;
    }
    ++$iterator;
}

if (is_null($filterById)) {
    echo 'no data available in "' . $path . '"' . PHP_EOL;
} else {
    echo 'number of entries: ' . $iterator . PHP_EOL;
    echo 'filterById "' . $filterById . '"' . PHP_EOL;
    echo PHP_EOL;
    $storage->filterById($id);
    $collection = $storage->read();
    foreach ($collection as $id => $data) {
        echo $id . ': ' . var_export($data, true) . PHP_EOL;
    }
}
