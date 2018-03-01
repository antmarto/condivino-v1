<?php
/**
 * @access public
 * @package Foundation
 */
class FLocation extends Fdb {
    public function __construct() {
        $this->_table='location';
        $this->_key='locationID';
        $this->_auto_increment=true;
        $this->_return_class='ELocation';
            USingleton::getInstance('Fdb');
        }

    public function store( $object){
        $id = parent::store($object);
        $object->id=$id;
    }

}

?>
