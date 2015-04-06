<?php
class Designcoil_CustomerComments_Model_Resource_Comments extends Mage_Core_Model_Resource_Db_Abstract {
	
	protected function _construct() {
		$this->_init ( 'customer_comments/comments', 'comment_id' );
	}

}