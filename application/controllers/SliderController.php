<?php

class SliderController extends Zend_Controller_Action {
    
    public function init()              {
        
        parent::init();
        $this->slider = new Application_Model_Slider();
    }
    
    public function slidersAction()     {
        
        $this->view->headTitle('Sliders');
        $this->view->code_menu      = 'Slider';
        $this->view->code_sous_menu = 'Sliders';
        
        $this->view->resultat = $this->slider->getSliders();
    }
    
    public function addAction()         {
        
        $this->view->headTitle('Ajout');
        $this->view->code_menu      = 'Slider';
        $this->view->code_sous_menu = 'Add';
        
        $this->view->form = new Application_Form_AddSlider();
        
        if($this->_request->isPost()) {
            
            $req        = $this->getRequest();
            $url        = $req->getParam('url');
            $position   = $req->getParam('position');
            $is_active  = $req->getParam('is_active');
            
            $this->slider->addSlider(
                    file_get_contents($_FILES['image']['tmp_name']),
                    $_FILES['image']['name'],
                    $url,
                    $position,
                    $is_active
            );
            
            $this->_redirect($this->view->url(array(
                'controller'    => 'slider', 
                'action'        => 'sliders'), null, true
            ));
        }
    }
    
    public function updateAction()      {
        
        $this->view->headTitle('Modification');
        $this->view->code_menu      = 'Slider';
        $this->view->code_sous_menu = 'Sliders';
        
        $_SESSION['id']             = $this->_getParam('id');
        $slider                     = $this->slider->getSlider($_SESSION['id']);
        $this->view->slide          = base64_encode($slider['image']);
        $this->view->name_slide     = pathinfo($slider['image_name'], PATHINFO_EXTENSION);
        
        $form                       = new Application_Form_UpdateSlider();
        
        $form->url                  ->setValue($slider['url']);
        $form->position             ->setValue($slider['position']);
        $form->is_active            ->setValue($slider['is_active']);
        
        $this->view->form           = $form;
        
        if($this->_request->isPost()) {
            
            $req        = $this->getRequest();
            $url        = $req->getParam('url');
            $position   = $req->getParam('position');
            $is_active  = $req->getParam('is_active');
            
            if(empty($_FILES['image']['name'])) {
                
                $image       = $slider['image'];
                $name_image  = $slider['image_name'];
            }
            else {
                
                $image       = file_get_contents($_FILES['image']['tmp_name']);
                $name_image  = $_FILES['image']['name'];
            }
            
            $this->slider->updateSlider(
                    $_SESSION['id'],
                    $image,
                    $name_image,
                    $url,
                    $position,
                    $is_active
            );
            
            $this->_redirect($this->view->url(array(
                'controller'    => 'slider', 
                'action'        => 'sliders'), null, true
            ));
        }
    }
}