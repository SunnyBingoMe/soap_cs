<?php

class ServerController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        try {
            $server = new Application_Model_SoapServer();
            $server->server->handle();
            
            $this->view->layout()->disableLayout();
	        $this->_helper->viewRenderer->setNoRender(true);
        }catch (Exception $e){
            $this->view->message = $e->getCode().$e->getMessage();
        }
        
    }


}

