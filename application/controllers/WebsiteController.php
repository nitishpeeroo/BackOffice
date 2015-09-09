<?php

class WebsiteController extends Zend_Controller_Action {
    
    public function init()                  {
        
        parent::init();
        $this->website = new Application_Model_Website();
    }
    
    public function informationsAction()    {
        
        $this->view->headTitle('Informations');
        $this->view->code_menu      = 'Website';
        $this->view->code_sous_menu = 'Informations';
        
        $informations               = $this->website->getInformations();
        $this->view->logo           = base64_encode($informations['logo']);
        $this->view->favicon        = base64_encode($informations['favicon']);
        $this->view->name_logo      = pathinfo($informations['name_logo'], PATHINFO_EXTENSION);
        $this->view->name_favicon   = pathinfo($informations['name_favicon'], PATHINFO_EXTENSION);
        
        $this->view->resultat       = $informations;
    }
    
    public function updateAction()          {
        
        $this->view->headTitle('Modifications');
        $this->view->code_menu      = 'Website';
        $this->view->code_sous_menu = 'Informations';
        
        $informations               = $this->website->getInformations();
        $this->view->logo           = base64_encode($informations['logo']);
        $this->view->favicon        = base64_encode($informations['favicon']);
        $this->view->name_logo      = pathinfo($informations['name_logo'], PATHINFO_EXTENSION);
        $this->view->name_favicon   = pathinfo($informations['name_favicon'], PATHINFO_EXTENSION);
        
        $form                       = new Application_Form_UpdateWebsite();
        
        $form->website_name         ->setValue($informations['website_name']);
        $form->catchphrase          ->setValue($informations['catchphrase']);
        $form->link_facebook        ->setValue($informations['link_facebook']);
        $form->link_twitter         ->setValue($informations['link_twitter']);
        $form->website_email        ->setValue($informations['website_email']);
        $form->website_address      ->setValue($informations['website_address']);
        $form->website_code_postal  ->setValue($informations['website_code_postal']);
        $form->website_ville        ->setValue($informations['website_ville']);
        $form->website_phone        ->setValue($informations['website_phone']);
        
        $this->view->form           = $form;
        
        if($this->_request->isPost()) {
            
            $req                = $this->getRequest();
            $website_name       = $req->getParam('website_name');
            $catchphrase        = $req->getParam('catchphrase');
            $facebook           = $req->getParam('link_facebook');
            $twitter            = $req->getParam('link_twitter');
            $email              = $req->getParam('website_email');
            $address            = $req->getParam('website_address');
            $code_postal        = $req->getParam('website_code_postal');
            $ville              = $req->getParam('website_ville');
            $phone              = $req->getParam('website_phone');
            
            if(empty($_FILES['logo']['name']))      {
                
                $logo           = $informations['logo'];
                $logo_name      = $informations['name_logo'];
            }
            else                                    {
                
                $logo           = file_get_contents($_FILES['logo']['tmp_name']);
                $logo_name      = $_FILES['logo']['name'];
            }
            
            if(empty($_FILES['favicon']['name']))   {
                
                $favicon        = $informations['favicon'];
                $favicon_name   = $informations['name_favicon'];
            }
            else                                    {
                
                $favicon        = file_get_contents($_FILES['favicon']['tmp_name']);
                $favicon_name   = $_FILES['favicon']['name'];
            }
            
            $this->website->updateInformations(
                    $website_name, 
                    $logo, 
                    $logo_name, 
                    $favicon,
                    $favicon_name,
                    $catchphrase, 
                    $facebook, 
                    $twitter, 
                    $email,
                    $address, 
                    $code_postal, 
                    $ville, 
                    $phone
            );
            
            $this->_redirect($this->view->url(array(
                'controller'    => 'website', 
                'action'        => 'informations'), null, true
            ));
        }
    }
}