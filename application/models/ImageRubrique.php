<?php

class Application_Model_ImageRubrique extends Zend_Db_Table_Abstract {
    
    protected $_dbname      = DB_NAME_TELEMAQUE;
    protected $_name        = DB_TABLE_IMG_RUBRIQUE;
    public $data            = array();   
    
    public function addImage($name, $image, $id_category) {
        
        $insert = array(
            'name_image'    => $name,
            'image'         => $image,
            'id_category'   => $id_category,
        );
        
        try {
            
            $this->insert($insert);
        } 
        catch(Exception $ex) {

            echo 'ERROR_INSERT_ADDIMAGE : ' . $ex->getMessage();
        }
    }
    
    public function updateImage($id, $name, $image) {
        
        $update = array(
            'name_image'    => $name,
            'image'         => $image,
        );
        
        try {
            
            $this->update($update, 'id_category = ' . $id);
        } 
        catch (Exception $ex) {

            echo 'ERROR_UPDATE_UPDATEIMAGE : ' . $ex->getMessage();
            return false;
        }
        
        return true;
    }
}