<?php 

class Application_Form_UpdateWebsite extends Zend_Form {

    public function init() {
        
        $this->_view = Zend_Layout::getMvcInstance()->getView();
        
        $action = $this->_view->url(array(
            'controller'    => 'website',
            'action'        => 'update',
        ));
        
        $this->setAttribs(array(
            'method'        => 'post',
            'action'        => $action,
        ));
        
        $this->addElement('text', 'website_name', array(
            'label'         => 'Intitulé du site :',
            'class'         => 'form-control',
            'style'         => 'width:400px',
        ));
        
        $this->addElement('text', 'catchphrase', array(
            'label'         => "Phrase d'accroche :",
            'class'         => 'form-control',
            'style'         => 'width:400px',
        ));
        
        $this->addElement('text', 'link_facebook', array(
            'label'         => 'Lien de la page Facebook :',
            'class'         => 'form-control',
            'style'         => 'width:400px',
        ));
        
        $this->addElement('text', 'link_twitter', array(
            'label'         => 'Lien de la page Twitter :',
            'class'         => 'form-control',
            'style'         => 'width:400px',
        ));
        
        $this->addElement('text', 'website_email', array(
            'label'         => 'Adresse mail du site :',
            'class'         => 'form-control',
            'style'         => 'width:400px',
        ));
        
        $this->addElement('text', 'website_address', array(
            'label'         => 'Adresse :',
            'class'         => 'form-control',
            'style'         => 'width:400px',
        ));
        
        $this->addElement('text', 'website_code_postal', array(
            'label'         => 'Code postal :',
            'class'         => 'form-control',
            'style'         => 'width:400px',
        ));
        
        $this->addElement('text', 'website_ville', array(
            'label'         => 'Ville :',
            'class'         => 'form-control',
            'style'         => 'width:400px',
        ));
        
        $this->addElement('text', 'website_phone', array(
            'label'         => 'Téléphone :',
            'class'         => 'form-control',
            'style'         => 'width:400px',
        ));
        
        $this->addElement('file', 'logo', array(
            'label'         => 'Logo :',
            'style'         => 'width:400px',
        ));
        
        $this->addElement('file', 'favicon', array(
            'label'         => 'Favicon :',
            'style'         => 'width:400px',
        ));
        
        $this->addElement('submit', 'submit', array(
            'label'         => 'Valider',
            'class'         => 'btn btn-primary btn-sm',
            'style'         => 'margin-top:10px',
        ));
    }
}