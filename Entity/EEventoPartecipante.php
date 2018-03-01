<?php

/**
 * @access public
 * @package Entity
 */
class EEventoPartecipante {
    
    /** 
     * @AttributeType int
     */
    public $eventoPartecipanteID;
    
    /**
     * @AttributeType tinyint
     */
    public $pagato;
    
    /**
     * @AssociationType Entity.EUtente
     * @AssociationMultiplicity 1
     */
    public $partecipanteID;
    
        /**
     * @AssociationType Entity.EEvento
     * @AssociationMultiplicity 1
     */
    public $eventoID;
       
	/**
     *
     * @param username String
     */
    public function setPartecipante($username) {
        $this->_partecipante=$username;
    }
    
    /**
     * Restituisce l'oggetto EUtente
     *
     * @return EUtente
     */
    public function getPartecipante() {
        return $this->_partecipante;
    }
	
    /**
     *
     * @param Id_evento int
     */
    public function setEventoID(Int $id_evento) {
        $this->_eventoID=$id_evento;
    }	
	
}
?>