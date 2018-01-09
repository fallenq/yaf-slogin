<?php
namespace Exception;

use Throwable;

class BaseException implements Throwable
{
    public $code    = 0;
    public $message = '';
    public $data    = [];
    public $url     = '';

//    public function __construct($message = "", $code = 500, $data = [], $url = '')
//    {
//        $this->code     = $code;
//        $this->message  = !empty($message)? $message: '';
//        $this->data     = !empty($data)? $data: [];
//        $this->url      = !empty($url)? $url: '';
//    }

    public function __construct($message = "", $code = 0, Throwable $previous = null) { }

    public function getMessage(){}

    public function getCode(){}

    public function getFile(){}

    public  function getLine(){}

    public function getTrace(){}

    public function getTraceAsString(){}

    public function getPrevious(){}

    public function __toString(){}
}