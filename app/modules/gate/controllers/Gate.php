<?php
use Yaf\Controller_Abstract;

class GateController extends Controller_Abstract
{
    use \Modules\SSO\Extension\Controllers\UserAuthControllerExtend;

    const ACTION_WHITE_LIST = [
        'test', 'logincheck'
    ];

    public $actions = array(
        'test'          =>  'modules/gate/actions/test/Test.php',
        'logincheck'    =>  'modules/gate/actions/user/Logincheck.php',
    );

}