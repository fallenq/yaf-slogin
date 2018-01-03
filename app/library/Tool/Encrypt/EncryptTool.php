<?php
namespace Tool\Encrypt;

class EncryptTool
{

    private $handle = null;

    private static function createHandle()
    {
        return new PasswordHash(8, false);
    }

    public static function getInstance()
    {
        $encryptTool = new EncryptTool();
        $encryptTool->handle = static::createHandle();
        return $encryptTool;
    }



}