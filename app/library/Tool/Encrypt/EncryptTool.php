<?php
namespace Tool\Encrypt;

class EncryptTool
{

    private $handle = null;

    private function createHandle()
    {
        return new PasswordHash(8, false);
    }

    public static function getInstance()
    {
        $encryptTool = new EncryptTool();
        $encryptTool->handle = static::createHandle();
        return $encryptTool;
    }

    public function encrypt($content)
    {
        return $this->handle->HashPassword($content);
    }

    public function check($password, $source)
    {
        return $this->handle->CheckPassword($source, $password);
    }

}