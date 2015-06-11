<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-04-12 
 */

namespace Net\Bazzline\Component\Database\FileStorage;

interface IdGeneratorInterface
{
    /**
     * @return mixed
     */
    public function generate();
}