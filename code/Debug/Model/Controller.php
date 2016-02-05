<?php

/**
 * Class Sheep_Debug_Model_Controller
 *
 * @category Sheep
 * @package  Sheep_Debug
 * @license  Copyright: Pirate Sheep, 2016, All Rights reserved.
 * @link     https://piratesheep.com
 */
class Sheep_Debug_Model_Controller
{
    protected $httpMethod;
    // request url path
    protected $requestOriginalPath;
    // request url path after rewrite (internal url path)
    protected $requestPath;

    protected $routeName;
    protected $module;
    protected $class;
    protected $action;

    protected $sessionId;
    protected $cookies;
    protected $session;
    protected $getParameters;
    protected $postParameters;

    protected $responseCode;
    protected $responseHeaders;


    public function __construct(Mage_Core_Controller_Varien_Action $action)
    {
        /** @var Mage_Core_Controller_Request_Http $request */
        $request = $action->getRequest();

        $this->httpMethod = $request->getMethod();
        $this->requestOriginalPath = $request->getOriginalPathInfo();
        $this->requestPath = $request->getPathInfo();
        $this->routeName = $request->getRouteName();
        $this->module = $request->getControllerModule();
        $this->class = get_class($action);
        $this->action = $action->getActionMethodName($request->getActionName());
        $this->cookies = $_COOKIE;
        $this->session = $_SESSION;
        $this->sessionId  = Mage::getSingleton('core/session')->getEncryptedSessionId();
        $this->getParameters = $_GET;
        $this->postParameters = $_POST;
    }


    /**
     * Initialize response properties
     *
     * @param Mage_Core_Controller_Response_Http $httpResponse
     */
    public function addResponseInfo(Mage_Core_Controller_Response_Http $httpResponse)
    {
        $this->responseCode = $httpResponse->getHttpResponseCode();
        $this->responseHeaders = $httpResponse->getHeaders();
    }


    /**
     * @return string
     */
    public function getRequestPath()
    {
        return $this->requestPath;
    }


    /**
     * @return mixed
     */
    public function getRouteName()
    {
        return $this->routeName;
    }


    /**
     * @return string
     */
    public function getModule()
    {
        return $this->module;
    }


    /**
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }


    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }


    /**
     * @return string
     */
    public function getReference()
    {
        return $this->getClass() . '::' . $this->getAction();
    }

    /**
     * @return mixed
     */
    public function getCookies()
    {
        return $this->cookies;
    }

    /**
     * @return mixed
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * @return mixed
     */
    public function getGetParameters()
    {
        return $this->getParameters;
    }

    /**
     * @return mixed
     */
    public function getPostParameters()
    {
        return $this->postParameters;
    }

    /**
     * @return mixed
     */
    public function getResponseCode()
    {
        return $this->responseCode;
    }

    /**
     * @return string
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * @return mixed
     */
    public function getHttpMethod()
    {
        return $this->httpMethod;
    }

    /**
     * @return string
     */
    public function getRequestOriginalPath()
    {
        return $this->requestOriginalPath;
    }


}
