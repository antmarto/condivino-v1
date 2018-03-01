<?php
/**
 * @access public
 * @package Controller
 */
class CEvento {
    /**
     * Variabili di servizio
     *
     * @var EEvento
     */
    private $_eventi_per_pagina=6;
	private $_evento;
     /**
     * Seleziona sul database gli eventi disponibili per mostrarli all'utente 
     *
     * @return string
     */
    public function lista(){
        $view = USingleton::getInstance('VEvento');
        $FEvento=new FEvento();
        
		$parametri=array();
        $categoria=$view->getCategoria();
        $parola=$view->getParola();
		
        if ($categoria!=false){
            $parametri[]=array('categoria','=',$categoria);
        }
        if ($parola!=false){
            $parametri[]=array('descrizione','LIKE','%'.$parola.'%');
        }
		// CONTROLLO FLAG PUBBLICATO
		$parametri[]=array('pubblicato','=',1);
    
		$limit=$view->getPage()*$this->_eventi_per_pagina.','.$this->_eventi_per_pagina;
		$num_risultati=count($FEvento->search($parametri));
        $pagine = ceil($num_risultati/$this->_eventi_per_pagina);
        $risultato=$FEvento->search($parametri, '', $limit);
        // Recupera media voti
		// DA IMPLEMENTARE
		
		if ($risultato!=false) {
            $array_risultato=array();
			    foreach ($risultato as $item) {
                $tmpEvento=$FEvento->load($item->eventoID);
                $array_risultato[]=array_merge(get_object_vars($tmpEvento),array('media_voti'=>$tmpEvento->getMediaVoti()));
                //$array_risultato[]=array(get_object_vars($tmpEvento));
                }
        }
		
		// RECUPERA PARTECIPANTI
        $partecipanti=$tmpEvento->getNumeroPartecipanti();
		debug($partecipanti);
		$view->impostaDati('partecipanti',$partecipanti);
		
		$view->impostaDati('pagine',$pagine);
        $view->impostaDati('task','lista');
        $view->impostaDati('parametri','categoria='.$categoria.'&stringa='.$parola);
        $view->impostaDati('dati',$array_risultato);
        return $view->processaTemplate();
    }
	
    /**
     * Mostra i dettagli dell'evento, con la descrizione completa solo per utenti registrati
     *
     * @return string
     */
    
	//TERMINARE

	public function dettagli() {
        $view = USingleton::getInstance('VEvento');
        $id_evento=$view->getIdEvento();
	echo "ID_EVE_DET";
        debug($id_evento);
        $FEvento=new FEvento();
        $evento=$FEvento->load($id_evento);
		$dati=get_object_vars($evento);
	    $view->impostaDati('dati',$dati);
	    
		$partecipanti=$evento->getPartecipanti();
        $arrayPartecipanti=array();
		
		// LEGGI DATI VINO
		$FVino=new FVino();
		$id_vino=$evento->vino;
		$vino=$FVino->load($id_vino);
		$dati_vino=get_object_vars($vino);
		$view->impostaDati('dati_vino', $dati_vino);
		
		// LEGGI DATI LOCATION
		$FLocation=new FLocation();
		$id_location=$evento->location;
		$location=$FLocation->load($id_location);
		$dati_location=get_object_vars($location);
		$view->impostaDati('dati_location', $dati_location);

		// LEGGI PARTECIPANTI
		if ( is_array( $partecipanti )  ) {
	    foreach ($partecipanti as $partecipante){
		$arrayPartecipanti[]=get_object_vars($partecipante);
	    }
        }

        $dati['partecipante']=$arrayPartecipanti;


        $session=USingleton::getInstance('USession');
        debug($session);
        $username=$session->leggi_valore('username');
        if ($username!=false)
            $view->setLayout('dettagli_registrato');
        else
            $view->setLayout('dettagli');
        return $view->processaTemplate();
    }

	  /**
     * Mostra il modulo per il pagamento
     *
     */
    public function moduloPagamento() {
        $view = USingleton::getInstance('VEvento');
        $id_evento=$view->getIdEvento();
    
        echo "ID_EVE_MOD_PAG";
        debug($id_evento);        
        
        
        $view->setLayout('pagamento');
        return $view->processaTemplate();
    }
	
     /**
     * Salva l'ordine nel database.
     *
     * @return string
     */
    public function partecipa() {
        $view = USingleton::getInstance('VEvento');
        // DATI EVENTO
        $id_evento=$view->getIdEvento();
	echo "ID_EVE_PAR";	
        debug($id_evento);
        $FEvento=new FEvento();
        $evento=$FEvento->load($id_evento);
		$dati=get_object_vars($evento);
	    $view->impostaDati('dati',$dati);
		
		// DATI UTENTE
		$session=USingleton::getInstance('USession');
        $username=$session->leggi_valore('username');
		$FUtente=new FUtente();
		
		// TERMINARE Associare utente a pagamento e registrare in eventoPartecipanti
        /**
		$dati_pagamento=$view->getDatiPagamento();
        $carta_credito= new ECartaCredito();
        $carta_credito->ccv=$dati_pagamento['ccv'];
        $carta_credito->numero=$dati_pagamento['numero_carta'];
        $carta_credito->nome_titolare=$dati_pagamento['nome_titolare'];
        $carta_credito->cognome_titolare=$dati_pagamento['cognome_titolare'];
        $carta_credito->setDataScadenza($dati_pagamento['scadenza']);
        debug($carta_credito);
		*/
		$eventoPartecipante=new EEventoPartecipante();
		$eventoPartecipante->setPartecipante($username);
		
        //$this->_carrello->setCartaCredito($carta_credito);
        //$this->_carrello->setCartaCredito($carta_credito);
        //$FOrdine=new FOrdine();
        //$this->_carrello->setData(date('d-m-Y'));
        //$FOrdine->store($this->_carrello);
        
		//$this->emailConfermaEvento($this->_carrello);
        $view->setLayout('pagamento');
        //$session=USingleton::getInstance('USession');
        //$session->cancella_valore('carrello');
        return $view->processaTemplate();
    }

    /**
     * Salva l'ordine nel database.
     *
     * @return string
     */
    public function salvaPartecipazioneEvento() {
        $view = USingleton::getInstance('VEvento');
        $id_evento=$view->getIdEvento();
        echo "ID_SAL";
        debug($id_evento);
        
        $dati_pagamento=$view->getDatiPagamento();
        $carta_credito= new FCartaCredito();
        $carta_credito->ccv=$dati_pagamento['ccv'];
        $carta_credito->numero=$dati_pagamento['numero_carta'];
        $carta_credito->nome_titolare=$dati_pagamento['nome_titolare'];
        $carta_credito->cognome_titolare=$dati_pagamento['cognome_titolare'];
        //$carta_credito->setDataScadenza($dati_pagamento['scadenza']);
        debug($carta_credito);
	$FCartaCredito = new FCartaCredito();
        $FCartaCredito->store($carta_credito);
        // -------
        
        
        // Carica oggetto vuoto, assegna id ed inscrive il partecipante
        //
        $EveP=new EEventoPartecipante(); 
        $FEventoPartecipante=new FEventoPartecipante();
        $EveP->eventoID=$id_evento;
        $FEventoPartecipante->store($EveP);
        $view->setLayout('termine');
        return $view->processaTemplate();
    }
	
   /**
     * Invia un email di conferma all'utente che ha effettuato il pagamento
     *
     * @return boolean
     */
	 // COMPLETARE
    public function emailConfermaEvento(EEvento $evento) {
        global $config;
        $view=USingleton::getInstance('VOrdine');
        $view->setLayout('email_conferma');
        $utente=$ordine->getUtente();
        $dati_utente=get_object_vars($utente);
        $view->impostaDati('dati_utente',$dati_utente);
        $items=$ordine->getItems();
        $carrello['libri']=array();
        $carrello['totale']=$this->_carrello->getPrezzoTotale();
        foreach ($items as $item) {
            $carrello['libri'][]=array_merge(get_object_vars($item->getLibro()), array('quantita' => $item->quantita));
        }
        $view->impostaDati('ordine',$carrello);
        $corpo_email=$view->processaTemplate();
        $email=USingleton::getInstance('UEmail');
        return $email->invia_email($utente->email,$utente->nome.' '.$utente->cognome,'Conferma ordine bookstore',$corpo_email,'Contenuto non visibile, necessario client che supporti l\'HTML',true);
    }
	
    /**
     * Inserisce un commento nel database collegandolo al relativo libro
     *
     * @return string
     */
	 
	 //TERMINARE
	 /**
    public function inserisciCommento() {
        $session=USingleton::getInstance('USession');
        $username=$session->leggi_valore('username');
        if ($username!=false) {
            $view = USingleton::getInstance('VRicerca');
            $ECommento = new ECommento();
            $ECommento->libroISBN=$view->getIdLibro();
            $ECommento->voto=$view->getVoto();
            $ECommento->testo=$view->getCommento();
            $FCommento=new FCommento();
            $FCommento->f($ECommento);
            return $this->dettagli();
        }
    }
	
	*/
	// TERMINARE
	
    /**
     * Smista le richieste ai vari metodi
     * 
     * @return mixed
     */
    public function smista() {
        $view=USingleton::getInstance('VEvento');
        switch ($view->getTask()) {
            case 'lista':
                return $this->lista();
            case 'dettagli':
                return $this->dettagli();
            case 'Partecipa':
                return $this->partecipa();
	    case 'Effettua il pagamento':
                return $this->salvaPartecipazioneEvento();				
	  //case 'Aggiungi al Carrello':
            //    return $this->aggiungi();
        }
    }
}

?>
