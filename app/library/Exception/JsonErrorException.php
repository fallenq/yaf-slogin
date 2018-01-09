<?php
namespace Exception;

class JsonErrorException extends BaseException
{
    public function __construct($message = "", $code = 500, array $data = [], $url = '')
    {
        parent::__construct($message, $code, $data, $url);
    }
}