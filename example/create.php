<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-06-07 
 */

require_once __DIR__ . '/../vendor/autoload.php';

$factory    = new \Net\Bazzline\Database\FileStorage\StorageFactory();
$storage    = $factory->create();
$path       = __DIR__ . '/storage';

$storage->injectPath($path);

$data = array(
    'foo'   => 'bar',
    'bar'   => 'foo',
    'baz'   => 'foobar'
);

$id = $storage->create($data);

echo 'content "' . var_export($data, true) . '" written in "' . $path . '" with id "' . $id . '"' . PHP_EOL;