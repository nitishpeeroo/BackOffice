<?php 

class Application_Form_UpdateSlider extends Zend_Form {

    public function init() {
        
        $this->_view = Zend_Layout::getMvcInstance()->getView();
        
        $action = $this->_view->url(array(
            'controller'    => 'slider',
            'action'        => 'update',
            'id'            => $_SESSION['id'],
        ));
        
        $this->setAttribs(array(
            'method'        => 'post',
            'action'        => $action,
        ));
        
        $this->addElement('text', 'url', array(
            'placeholder'   => 'URL',
            'class'         => 'form-control',
            'style'         => 'width:500px'
        ));
        
        $this->addElement('text', 'position', array(
            'placeholder'   => 'Position',
            'class'         => 'form-control',
            'style'         => 'width:500px'
        ));
        
        $this->addElement('select', 'is_active', array(
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
    }
}