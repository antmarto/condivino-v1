<?php

/**
 * @access public
 * @package Entity
 */
class EEvento {
    
    /**
     * @AttributeType int
     */
    public $eventoID;

    /**
     * @AttributeType string
     */
    public $nome;
    
    /**
     * @AttributeType Datetime
     */
	public $data_chiusura; 

    /**
     * @AttributeType int
     */
    public $posti;

    /**
     * @AttributeType string
     */
    public $descBreve;
    
    /**
     * @AttributeType string
     */
    public $descrizione;
    
    /**
     * @AttributeType float
     */
    public $prezzo;

	 /**
     * @AttributeType string
     */
    public $categoria;	
	
	/**
     * @AttributeType string
     */
    public $foto;  
  
	/**
     * @AttributeType tinyint
     */
    public $pubblicato;
	
    /**
     * @AssociationType Entity.EVino
     * @AssociationMultiplicity 1
     */
    public $vinoID;
    
    /**
     * @AssociationType Entity.EUtente
     * @AssociationMultiplicity 1
     */
    public $utenteID;
    
    /**
     * @AssociationType Entity.ELocation
     * @AssociationMultiplicity 1
     */
    public $locationID;
    
    /**
     * @AssociationType Entity.EEventoPartecipante
     * @AssociationMultiplicity 1..*
     * @AssociationKind Aggregation
     */
    public $_partecipante = array();
    
    /**
     * @AssociationType Entity.ECommento
     * @AssociationMultiplicity 0..*
     * @AssociationKind Aggregation
     */
	 // DA IMPLEMENTARE
    //public $_commento = array();
 	
	// METODI 

	// RIVEDERE
    /**
     * Imposta la data nel formato AAAA-MM-DD
     * @access public
     * @param $data string
     */
    public function setData($data) {
        $anno=substr($data, 6);
        $mese=substr($data, 3, 2);
        $giorno=substr($data, 0, 2);
        $this->data="$anno-$mese-$giorno";
    }
    
    /**
     * Imposta l'utente
     * @access public
     * @param $utente EUtente
     */
    public function setUtente(EUtente $utente) {
        $this->_utente=$utente;
    }
    
    /** VALUTARE UTILIZZO
     * rimuovo l'item nella posizione $pos dell'array
     * @param int $pos
     */
    public function removeItem($pos) {
        unset($this->_item[$pos]);
        $this->_item=array_values($this->_item);
    }
    
    /** restituisce l'utente creatore dell'evento
     * @return EUtente
     */
    public function getUtente() {
        return $this->_utente;
    }
    
    /** restituisce la media dei voti
     * @return EUtente
     */
    public function getMediaVoti() {
        $somma=0;
		// FINTA!
        return $somma;
    }
	
	/**
     * Restituisce il numero di partecipanti per evento
     * @access public
     * @return int
     * @ReturnType int
     */
    public function getNumeroPartecipanti() {
        $totale=0;
        $partecipanti=count($this->_partecipante);
        if ($partecipanti>1) {
            foreach ($this->partecipante as $partecipante) {
                $totale++;
            }
            return $totale;
        }
        //elseif (isset($this->_commento[0]->voto))
        //    return $this->_commento[0]->voto;
        else
            return false;
    }
	 
	/**
     * Imposta la località dell'evento
     * @param ELocation $location
     */
    public function setLocation(ELocation $location) {
        $this->_location=$location;
    }
    
   /**
     * Restituisce un array con i partecipanti
     *
     * @access public
     * @return array
     * @ReturnType array
     */
    public function getPartecipanti() {
        return ($this->_partecipante);
    }	

}
?>