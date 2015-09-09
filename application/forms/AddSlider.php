<?php

class Application_Form_AddSlider extends Zend_Form {

    public function init() {
        
        $this->addElement('text', 'url', array(
            'required'      => true,
            'placeholder'   => 'URL',
            'class'         => 'form-control',
            'style'         => 'width:500px'
        ));
        
        $this->addElement('text', 'position', array(
            'required'      => true,
            'placeholder'   => 'Position',
            'class'         => 'form-control',
            'style'         => 'width:500px'
        ));
        
        $this->addElement('select', 'is_active', array(
            'required'      => true,
            'class'         => 'form-control',
            'style'         => 'width:500px',
            'label'         => 'Actif ?',
            'multioptions'  => array(
                0 => 'Non',
                1 => 'Oui',
            ),
        ));
        
        $this->addElement('file', 'image', array(
            'style'         => 'width:500px',
            'style'         => 'margin-top:5px',
            'label'         => 'Image :',
        ));
        
        $this->addElement('submit', 'submit', array(
            'label'         => 'Valider',
            'class'         => 'btn btn-primary btn-sm',
            'style'         => 'margin-top:10px',
        ));
        
        $this->setAttrib('action', 'add');
        $this->setMethod('POST');
    }
}