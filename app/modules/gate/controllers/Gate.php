<?php
use Yaf\Controller_Abstract;

class TestController extends Controller_Abstract
{

    public $actions = array(
        "test" => "modules/gate/actions/test/Test.php",
    );

}