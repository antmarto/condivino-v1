<?php
/**
 * @access public
 * @package Entity
 */
class EVino {
    /**
     * @AttributeType int
     */
    public $vinoID;
    
    /**
     * @AttributeType string
     */
    public $nome;
   
    /**
     * @AttributeType string
     */
    public $produttore;
    
    /**
     * @AttributeType string
     */
    public $denominazione;
    
    /**
     * @AttributeType string
     */
    public $paese;
    
    /**
     * @AttributeType string
     */
    public $regione;
    
    /**
     * @AttributeType string
     */
    public $descrizione;
    
    /**
     * @AttributeType string
     */
    public $vitigno;

    /**
     * @AttributeType int
     */
    public $annata;

    /**
     * @AttributeType float
     */
    public $grado;

    /**
     * @AttributeType float
     */
	public $volume;
	
	/**
	 * @AttributeType string
	 */
	public $colore;
	
	/**
	 * @AttributeType string
	 */
	public $noteSensoriali;

	/**
	 * @AttributeType int
	 */
	public $temperaturaServizio;

	/**
	 * @AttributeType float
	 */
	public $prezzo;	
    
    /**
     * @AttributeType string
     */
    public $etichetta;
    
    /**
     * @AssociationType Entity.ECommento
     * @AssociationMultiplicity 0..*
     * @AssociationKind Aggregation
     */
    public $_commento = array();

    /**
     * Aggiunge un commento all'array di commenti 
     * relativi al vino
     *
     * @access public
     * @return array()
     * @ReturnType array()
     */
    public function addCommento(ECommento $commento) {
        array_push($this->_commento, $commento);
    }
    
    /**
     * Restituisce la media dei voti per il vino
     *
     * @access public
     * @return float
     * @ReturnType float
     */
    public function getMediaVoti() {
        $somma=0;
        $voti=count($this->_commento);
        if ($voti>1) {
            foreach ($this->_commento as $commento) {
                $somma+=$commento->voto;
            }
            return $somma/$voti;
        }
        elseif (isset($this->_commento[0]->voto))
            return $this->_commento[0]->voto;
        else
            return false;
    }
    /**
     * Restituisce un array di commenti relativi al vino
     *
     * @access public
     * @return array
     * @ReturnType array
     */
    public function getCommenti() {
        return ($this->_commento);
    }
  /**
     * Restituisce nome del vino
     *
     * @access public
     * @return string
     * @ReturnType string
     */
    public function getNome() {
        return ($this->_nome);
    }
	}
?>