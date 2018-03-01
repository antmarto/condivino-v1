<?php
public function getTask() {
    if (isset($_REQUEST['task']))
            return $_REQUEST['task'];
        else
            return false;
    }
    /**
     * @return mixed
     */
    public function getController() {
        if (isset($_REQUEST['controller']))
            return $_REQUEST['controller'];
        else
            return false;
    }
    /**
     * @return string
     */
    public function processaTemplate() {
        $contenuto=$this->fetch('creazioneevento_'.$this->_layout.'.tpl');
        return $contenuto;
    }
    /**
     * Imposta l'eventuale errore nel template
     *
     * @param string $errore
     */
    public function impostaErrore($errore){
        $this->assign('errore',$errore);
    }
    /**
     * imposta il layout
     *
     * @param string $layout
     */
    public function setLayout($layout){
        $this->_layout=$layout;
    }
    /**
     * Imposta i dati nel template identificati da una chiave ed il relativo valore
     *
     * @param string $key
     * @param mixed $valore
     */
    public function impostaDati($key,$valore){
        $this->assign($key,$valore);
    }
    /**
     * Restituisce l'array contenente i dati di registrazione
     *
     * @return array();
     */
    public function getDatiEvento() {
        $dati_richiesti=array('username','password','password_1','nome','cognome','via','CAP','citta','telefono','email');
        $dati=array();
        foreach ($dati_richiesti as $dato) {
            if (isset($_REQUEST[$dato]))
                $dati[$dato]=$_REQUEST[$dato];
        }
        return $dati;
    }
 
}

?>