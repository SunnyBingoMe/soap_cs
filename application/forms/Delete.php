<?php

class Application_Form_Delete extends Zend_Form
{

    public function init()
    {
        $id = new Zend_Form_Element_Text('id');
        $id
            ->setAttrib('readOnly', 'readOnly')
            ->setLabel('ID')
            ;
        
        $acronym = new Sunny_Form_Element_Username();
        $acronym
            ->setAttrib('readOnly', 'readOnly')
            ->setLabel('Name')
            ;
        
        $submit = new Sunny_Form_Element_Submit();
        
        $cancel = new Sunny_Form_Element_Cancel();
        
        $this->addElements(array($id, $acronym, $submit, $cancel));
    }


}

