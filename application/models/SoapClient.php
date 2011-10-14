<?php

class Application_Model_SoapClient
{
    protected $client;
    protected $logFile;
    
    public function __construct(){
        ini_set("soap.wsdl_cache_enabled", "0");
        try {
        	$this->client = new SoapClient(APPLICATION_PATH."/../library/Sunny/scripts/site_dependent/todo.wsdl", array('trace'=>TRUE));
        }catch (Exception $e){
        	throw $e;
        }
        
        $this->logFile = APPLICATION_PATH.'/../log.xml';
        
    }
    
    public function __destruct() {
        appendFile($this->logFile, "\n".$this->client->__getLastRequest()."\n".$this->client->__getLastResponse()."\n");
    }
    
    public function getTodoList($name = 'bisu10'){
        try {
            $resultGetTodoList = $this->client->getTodoList($name);
        }catch (Exception $e){
            throw $e;
        }
        
        return $resultGetTodoList;
    }
    
    public function createTodo($form) {
        $acronym = $form->getValue('username');
        $time = $form->getValue('time');
        $note = $form->getValue('textarea');
        $priority = $form->getValue('priority');

        try {
            $result = $this->client->createTodo($acronym, $time, $note, $priority);
        }catch (Exception $e){
            throw $e;
        }
        
        return $result;
        
    }
    
    public function updateTodo($form) {
        $id = $form->getValue('id');
        $acronym = $form->getValue('username');
        $time = $form->getValue('time');
        $note = $form->getValue('textarea');
        $priority = $form->getValue('priority');

        try {
            $result = $this->client->updateTodo($id, $acronym, $time, $note, $priority);
        }catch (Exception $e){
            throw $e;
        }
        
        return $result;
        
        
    }


    public function deleteTodo($form) {
        $id = $form->getValue('id');
        $acronym = $form->getValue('username');
        
        try {
            $result = $this->client->deleteTodo($acronym, $id);
        }catch (Exception $e){
            throw $e;
        }
        
        return $result;
        
        
    }

}

