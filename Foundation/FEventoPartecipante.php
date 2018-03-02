<?php
/**
 * @access public
 * @package Foundation
 */
class FEventoPartecipante extends Fdb {
    public function __construct() {
        $this->_table='eventoPartecipante';
        $this->_key='eventoPartecipanteID';
        $this->_auto_increment=true;
        $this->_return_class='EEventoPartecipante';
        USingleton::getInstance('Fdb');
    }
    //    public function store(EOrdineItem & $item) {
    //    $libro=$item->getLibro();
    //    $item->libroISBN=$libro->ISBN;
    //    $id = parent::store($item);
    //    $item->id=$id;
    
    public function store(EEventoPartecipante & $item) {
            
        // Event ID
        
        // Utente 
        $session=USingleton::getInstance('USession');
        $username=$session->leggi_valore('username');
        //debug($username);
        $item->partecipante=$username;
        
        // Pagato
        $item->pagato=1;
        
        $id = parent::store($item);
        $item->id=$id;
    }
}
?>
