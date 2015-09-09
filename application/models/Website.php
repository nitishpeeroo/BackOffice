<?php

class Application_Model_Website extends Zend_Db_Table_Abstract {
    
    protected $_dbname  = DB_NAME_TELEMAQUE;
    protected $_name    = DB_TABLE_WEBSITE;
    public $data        = array();
    
    /* Retourne la liste des informations générales du site */
    public function getInformations() {
        
        $select = $this->select()
                       ->setIntegrityCheck(false)
                       ->from(array('w' => DB_TABLE_WEBSITE), array(
                           'w.website_name',
                           'w.favicon',
                           'w.name_favicon',
                           'w.logo',
                           'w.name_logo',
                           'w.catchphrase',
                           'w.link_facebook',
                           'w.link_twitter',
                           'w.website_address',
                           'w.website_code_postal',
                           'w.website_ville',
                           'w.website_phone',
                           'w.website_email',
                           'w.website_background_color',
                           'w.website_background_image',
                           'w.website_background_name',
                           'w.website_limit_product_index',
                       ));
        
        try {
            
            $tab = $this->fetchAll($select)->toArray();
        } 
        catch(Exception $ex) {

            echo 'ERROR_SELECT_GETINFORMATIONS : ' . $ex->getMessage();
            return false;
        }
        
        $this->data = $tab[0];
        return $this->data;
    }
    
    /* Modifie les informations générales du site */
    public function updateInformations($name, $logo, $name_logo, $favicon, $name_favicon, 
                                       $catchphrase, $facebook, $twitter, $email, $address, 
                                       $code_postal, $ville, $phone) {
        
        $update = array(
            'website_name'          => $name,
            'logo'                  => $logo,
            'name_logo'             => $name_logo,
            'favicon'               => $favicon,
            'name_favicon'          => $name_favicon,
            'catchphrase'           => $catchphrase,
            'link_facebook'         => $facebook,
            'link_twitter'          => $twitter,
            'website_email'         => $email,
            'website_address'       => $address,
            'website_code_postal'   => $code_postal,
            'website_ville'         => $ville,
            'website_phone'         => $phone,
        );
        
        try {
            
            $this->update($update);
        } 
        catch (Exception $ex) {

            echo 'ERROR_UPDATE_UPDATEINFORMATIONS : ' . $ex->getMessage();
            return false;
        }
        
        return true;
    }
}