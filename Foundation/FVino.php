<?php
/**
 * @access public
 * @package Foundation
 */
class FVino extends Fdb {
    public function __construct() {
        $this->_table='vino';
        $this->_key='vinoID';
        $this->_return_class='EVino';
        USingleton::getInstance('Fdb');
    }
    
    public function store($vino) {
        parent::store($vino);
        $FCommento=new FCommento();
        $arrayCommentiEsistenti=$FCommento->loadCommenti($vino->vinoID);
        if ($arrayCommentiEsistenti!=false) {
            foreach ($arrayCommentiEsistenti as $itemCommento) {
                $FCommento->delete($itemCommento);
            }
        }
        $arrayCommenti=$vino->getCommenti();
        foreach ($arrayCommenti as &$commento) {
            $commento->vinoID=$vino->ID;
            $FCommento->store($commento);
        }
    }
    
    public function load ($key) {
        $vino=parent::load($key);
        $FCommento=new FCommento();
        $arrayCommenti=$FCommento->loadCommenti($vino->vinoID);
        $vino->_commento=$arrayCommenti;
        return $vino;
    }

    public function delete(& $vino) {
        $arrayCommenti=& $vino->getCommenti();
        $FCommento= new FCommento();
        foreach ($arrayCommenti as &$commento) {
            $FCommento->delete($commento);
        }
        parent::delete($vino);
    }
    
}

?>
