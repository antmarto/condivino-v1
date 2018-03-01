<?php
/**
 * @access public
 * @package Controller
 */
class CCreazioneEvento {
	
    //private $_evento;
    /**
     * Crea evento 
     */
    public function salvaEvento(){
        $view = USingleton::getInstance('VCreazioneEvento');	
        //$dati_creazione = $view->getDatiEvento();
		
        $evento=new EEvento();
		$FEvento = new FEvento();
		$FEvento->store($evento);
		
		$view->setLayout('conferma_creazione');
        return $view->processaTemplate();
    }

        /**
     * Mostra il modulo creazione evento
     *
     * @return string
     */
    public function moduloEvento() {
        debug($registrato);
        $VCreazioneEvento=USingleton::getInstance('VCreazioneEvento');
        $VCreazioneEvento->setLayout('modulo');
        return $VCreazioneEvento->processaTemplate();
    }

    /**
     * Smista le richieste ai vari metodi
     * 
     * @return mixed
     */
    public function smista() {
        $view=USingleton::getInstance('VCreazioneEvento');
        switch ($view->getTask()) {
            case 'creaevento':
                return $this->moduloEvento();
	    case 'salvaevento':
                return $this->salvaEvento();
        }
    }
}

?>
