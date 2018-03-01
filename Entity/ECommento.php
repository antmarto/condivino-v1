<?php
/**
 * @access public
 * @package Entity
 */
class ECommento {
    
	/**
	 * @AttributeType int
	 */
	public $commentoID ;

	/**
	 * @AttributeType string
	 */
	public $testo;
	
	/**
	 * @AttributeType float
	 */
	public $voto;

	/**
	 * @AssociationType Entity.EVino
	 * @AssociationMultiplicity 1
	 */
	public $vinoID;
	
}
?>