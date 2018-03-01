<?php
/**
 * @access public
 * @package Foundation
 */
class FEvento extends Fdb{
    public function __construct() {
        $this->_table='evento';
        $this->_key='eventoID';
        $this->_auto_increment=true;
        $this->_return_class='EEvento';
        USingleton::getInstance('Fdb');
    }
    
    //public function store(EEvento & $evento){
    public function store($evento){
        //Location		
		//$FLocation=new FLocation();
        //$FLocation->store($evento->_location);		
        // $evento->locationID=$evento->_location->id;
        $evento->utente=$evento->_utente->username;	
		
		//Partecipanti
		/*
        $FEventoPartecipante=new FEventoPartecipante();
        $id = parent::store($evento);
        foreach ($evento->_partecipante as &$partecipante){
            $partecipante->eventoID=$id;
            $FEventoPartecipante->store($partecipante);
        }		
        $evento->id=$id;
		*/   
	}

    public function load($key){
        $evento=parent::load($key);
        //$FUtente=new FUtente();
		//$utente=$FUtente->load($evento->utente);
		//$evento->setUtente($utente);
		
		//$FLocation=new FLocation();
		//$location=$FLocation->load($evento->location);
		//$evento->setLocation($location);
        //$id = parent::store($evento);
        //$evento->id=$id;
        return $evento;
    }
}

?>
