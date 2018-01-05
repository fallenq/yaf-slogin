<?php
namespace Modules\Common\Extension\Actions;

trait BaseActionExtend
{

    protected $_request = null;

    private function getRequestObject()
    {
        if (empty($this->_request)) {
            $this->_request = $this->getController()->getRequest();
        }
        return $this->_request;
    }

    private function isAjaxRequest()
    {
        return $this->getRequestObject()->isXmlHttpRequest();
    }

    private function getPostParam($name, $default = '')
    {
        return $this->getRequestObject()->getPost($name, $default);
    }

    private function getQueryParam($name, $default = '')
    {
        return $this->getRequestObject()->getQuery($name, $default);
    }

    private function getRequestParam($name, $default = '')
    {
        return $this->getRequestObject()->get($name, $default);
    }

    private function getParams()
    {
        return $this->getRequestObject()->getParams();
    }

}