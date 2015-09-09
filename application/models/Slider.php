<?php

class Application_Model_Slider extends Zend_Db_Table_Abstract {
    
    protected $_dbname  = DB_NAME_TELEMAQUE;
    protected $_name    = DB_TABLE_SLIDER;
    public $data        = array();
    
    /* Retourne la liste des sliders */
    public function getSliders()                                                        {
        
        $select = $this->select()
                       ->setIntegrityCheck(false)
                       ->from(array('s' => DB_TABLE_SLIDER), array(
                           's.id',
                           's.image',
                           's.image_name',
                           's.url',
                           's.position',
                           's.is_active',
                       ));
        
        try {
            
            $tab = $this->fetchAll($select)->toArray();
        } 
        catch(Exception $ex) {

            echo 'ERROR_SELECT_GETSLIDERS : ' . $ex->getMessage();
            return false;
        }
        
        $this->data = $tab;
        return $this->data;
    }
    
    /* Retourne le slider recherché */
    public function getSlider($id)                                                      {
        
        $select = $this->select()
                       ->setIntegrityCheck(false)
                       ->from(array('s' => DB_TABLE_SLIDER), array(
                           's.id',
                           's.image',
                           's.image_name',
                           's.url',
                           's.position',
                           's.is_active',
                       ))
                       ->where('s.id = ?', $id);
        
        try {
            
            $tab = $this->fetchAll($select)->toArray();
        } 
        catch(Exception $ex) {

            echo 'ERROR_SELECT_GETSLIDER : ' . $ex->getMessage();
            return false;
        }
        
        $this->data = $tab[0];
        return $this->data;
    }
    
    /* Ajouter un slider */
    public function addSlider($image, $image_name, $url, $position, $is_active)         {
        
        $insert = array(
            'image'         => $image,
            'image_name'    => $image_name,
            'url'           => $url,
            'position'      => $position,
            'is_active'     => $is_active,
        );
        
        try {
            
            $this->insert($insert);
        } 
        catch(Exception $ex) {

            echo 'ERROR_INSERT_ADDSLIDER : ' . $ex->getMessage();
            return false;
        }
        
        return true;
    }
    
    /* Modifie un slider */
    public function updateSlider($id, $image, $image_name, $url, $position, $is_active) {
        
        $update = array(
            'image'         => $image,
            'image_name'    => $image_name,
            'url'           => $url,
            'position'      => $position,
            'is_active'     => $is_active,
        );
        
        try {
            
            $this->update($update, 'id = ' . $id);
        } 
        catch (Exception $ex) {

            echo 'ERROR_UPDATE_UPDATESLIDER : ' . $ex->getMessage();
            return false;
        }
        
        return true;
    }
}