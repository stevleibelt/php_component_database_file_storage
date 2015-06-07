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

$line   = $storage->readOne();
if (!is_null($line)) {
    $id     = key($line);
    $data   = current($line);

    echo $id . ': ' . var_export($data, true) . PHP_EOL;
}