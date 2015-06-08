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
$iterator   = 1;
$collection = $storage->read();

foreach ($collection as $id => $data) {
    ++$iterator;
}

$filters = array(
    'bar' => 'foo',
    'baz' => 'foo',
    'foobar' => 'barfoo'
);

echo 'Number of entries: ' . $iterator . PHP_EOL;

foreach ($filters as $key => $value) {
    echo 'filter by key "' . $key . '" with value "' . $value . '"' . PHP_EOL;
    echo PHP_EOL;
    $storage->filterBy($key, $value);
    $collection = $storage->read();
    foreach ($collection as $id => $data) {
        echo $id . ': ' . var_export($data, true) . PHP_EOL;
    }
}
