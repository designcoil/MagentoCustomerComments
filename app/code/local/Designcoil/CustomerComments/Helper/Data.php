<?php
class Designcoil_CustomerComments_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Return collection of customer comments
     *
     * @return Designcoil_CustomerComments_Model_Resource_Comments_Collection
     */
    public function getCommentsByCustomerId($customer_id)
    {
        if($customer_id) {
            $customer_comments  = Mage::getModel('customer_comments/comments')
                                ->getCollection()
                                ->addFieldToFilter('customer_id', $customer_id)
                                ->setOrder('comment_id');
                                
            return $customer_comments;
        }
        return;
    }
}