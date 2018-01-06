<?php
namespace Modules\SSO\Extension\Controllers;

trait UserAuthControllerExtend
{

    public function init()
    {
        $actionWhiteList = defined('static::ACTION_WHITE_LIST')? static::ACTION_WHITE_LIST: [];
        if (!empty($actionWhiteList)) {
            $request = $this->getRequest();
            $actionName = $request->getActionName();
            if (!in_array($actionName, $actionWhiteList)) {
                dd('No right!');
            }
        }
    }

}