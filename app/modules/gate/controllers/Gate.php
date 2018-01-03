<?php
use Yaf\Controller_Abstract;

class GateController extends Controller_Abstract
{

    public $actions = array(
        "test" => "modules/gate/actions/test/Test.php",
    );

}