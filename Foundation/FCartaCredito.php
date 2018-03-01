<?php
/**
 * @access public
 * @package Foundation
 */
class FCartaCredito extends Fdb{
    public function __construct() {
        $this->_table='cartacredito';
        $this->_key='cartacreditoID';
        $this->_return_class='ECartaCredito';
        USingleton::getInstance('Fdb');
    }

    /**
     * Menorizza sul DB lo stato dell'oggetto $carta
     * @access public
     * @param $carta String
     */
    public function store( $carta){
        parent::store($carta);
    }	
}
?>