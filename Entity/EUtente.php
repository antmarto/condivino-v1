<?php

/**
 * @access public
 * @package Entity
 */
class EUtente {
    
    /**
     * @AttributeType string
     */
    public $username;
    
    /**
     * @AttributeType string
     */
    public $password;
    
    /**
     * @AttributeType string
     */
    public $nome;

    /**
     * @AttributeType string
     */
    public $cognome;

    /**
     * @AttributeType string
     */
    public $via;
    
    /**
     * @AttributeType string
     */
    public $CAP;
    
    /**
     * @AttributeType string
     */
    public $citta;
    
    /**
     * @AttributeType string
     */
    public $email;
    
    /**
     * @AttributeType string
     */
    public $sesso;
	
    /**
     * @AttributeType datetime
     */
    public $data_nascita;
	
    /**
     * @AttributeType string
     */
    public $codice_fiscale;

    /**
     * @AttributeType string
     */
    public $partita_iva;
    
    /**
     * @AttributeType string
     */
    public $telefono;
  
    /**
     * @AttributeType string
     */
    public $codice_attivazione;
    
    /**
     * @AttributeType string
     */
    public $stato='non_attivo';
    
    /**
     * @AssociationType Entity.EEvento
     * @AssociationMultiplicity 0..*
     * @AssociationKind Aggregation
     */
    public $_eventi = array();
    
    /**
     * @access public
     * @return float
     * @ReturnType float
     */
    public function generaCodiceAttivazione() {
        $this->codice_attivazione=mt_rand();
    }

    /**
     * @access public
     * @param Entity.EEvento aEvento
     * @ParamType aEvento Entity.EEvento
     */
    public function addEvento(EEvento $aEvento) {
        $this->_eventi[]=$aEvento;
    }

    /**
     * @access public
     * @return array()
     * @ReturnType array()
     */
    public function getEventi() {
        return $this->_eventi;
    }
    
    /**
     * @access public
     * @return array()
     * @ReturnType array()
     */
    public function getAccountAttivo() {
        if ($this->stato=='attivo')
            return true;
        else
            return false;
    }

    /**
     * @access public
     * @return string
     * @ReturnType string
     */
    public function getCodiceAttivazione() {
        return $this->codice_attivazione;
    }
}

?>