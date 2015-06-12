<?php

class ErrorController extends Zend_Controller_Action
{
    public function errorAction()
    {
	$errors = $this->_getParams('error_handler');

	switch($error->type) {
	    case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ROUTE:
	    case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER:
	    case Zend_Controller_Plugin_ErrorHandler::ESCEPTION_NO_ACTION:
		// 404 error controller, action or route not found
		$this->getResponse()->setHttpResponseCode(404);
		$this->view->message = 'Page not found.';
		break;
	    default:
		// application error
		$this->getResponse()->setHttpResponseCode(500);
		$this->view->message = 'Application error.';
		break;
        }
	
	$this->view->exception = $error->exception;
	$this->view->request = $error->request;
    }
}
