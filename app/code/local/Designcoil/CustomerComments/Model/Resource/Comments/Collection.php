<?php
class Designcoil_CustomerComments_Model_Resource_Comments_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract {
	
	protected function _construct() {
		$this->_init ('customer_comments/comments');
	}
    
}