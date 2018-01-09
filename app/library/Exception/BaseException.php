<?php
namespace Exception;

class BaseException extends \Exception
{
    public $code    = 0;
    public $message = '';
    public $data    = [];
    public $url     = '';

    public function __construct($message = "", $code = 500, $data = [], $url = '')
    {
        $this->code     = $code;
        $this->message  = !empty($message)? $message: '';
        $this->data     = !empty($data)? $data: [];
        $this->url      = !empty($url)? $url: '';
    }
}