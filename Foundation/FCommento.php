<?php
/**
 * @access public
 * @package Foundation
 */
class FCommento extends Fdb {
    public function __construct() {
        $this->_table='commento';
        $this->_key='commentoID';
        $this->_auto_increment=true;
        $this->_return_class='ECommento';
        USingleton::getInstance('Fdb');
    }

    /**
     * Menorizza sul DB lo stato dell'oggetto $object
     * @access public
     * @param $object String
     */
    public function store( $object){
        $id = parent::store($object);
        $object->id=$id;
    }

    /**
     * Carica l'array $arrayCommenti dei commenti relativi al vino $vinoID
     * @access public
     * @param $vinoID String
     */
    public function loadCommenti($vinoID){
        $parametri=array();
        $parametri[]=array('vinoID','=',$vinoID);
        $arrayCommenti=parent::search($parametri);
        return $arrayCommenti;
    }
}
?>