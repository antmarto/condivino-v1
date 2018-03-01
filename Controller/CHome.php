<?php
/**
 * @access public
 * @package Controller
 */
class CHome {
    /**
     * Imposta la pagina, controlla l'autenticazione
     */
    public function impostaPagina () {
        $CRegistrazione=USingleton::getInstance('CRegistrazione');
        $registrato=$CRegistrazione->getUtenteRegistrato();
        $VHome= USingleton::getInstance('VHome');
        $contenuto=$this->smista();
        //$fvino=USingleton::getInstance('FVino');
        //$categorie=$fvino->getCategorie();
        //$VHome->impostaTastiCategorie($categorie);
        $VHome->impostaContenuto($contenuto);
        if ($registrato) {
            $VHome->impostaPaginaRegistrato();
        } else {
            $VHome->impostaPaginaGuest();
        }
        $VHome->mostraPagina();
    }
    /**
     * Smista le richieste ai vari controller
     *
     * @return mixed
     */
    public function smista() {
        $view=USingleton::getInstance('VHome');
        switch ($view->getController()) {
            case 'registrazione':
                $CRegistrazione=USingleton::getInstance('CRegistrazione');
                return $CRegistrazione->smista();
            case 'evento':
                $CEvento=USingleton::getInstance('CEvento');
                return $CEvento->smista();	
            case 'creazioneevento':
                $CCreazioneEvento=USingleton::getInstance('CCreazioneEvento');
                return $CCreazioneEvento->smista();		                
            case 'ricerca':
                $CRicerca=USingleton::getInstance('CRicerca');
                return $CRicerca->smista();
            default:
                $CRicerca=USingleton::getInstance('CRicerca');
            //    return $CRicerca->ultimiArrivi();
			return $CRicerca->smista();
        }
    }
}

?>
