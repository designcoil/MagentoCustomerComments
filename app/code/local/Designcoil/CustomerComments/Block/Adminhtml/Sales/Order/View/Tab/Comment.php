<?php 
/**
 * Adminhtml Customer Comment tab in order view
 *
 */
class Designcoil_CustomerComments_Block_Adminhtml_Sales_Order_View_Tab_Comment extends Mage_Adminhtml_Block_Sales_Order_Abstract implements Mage_Adminhtml_Block_Widget_Tab_Interface
{

    public function __construct()
    {
        $this->setTemplate('customercomments/order_comments.phtml');
    }
    
    public function getCustomerComments()
    {
        $customerId     = $this->getCustomerId();
        if($customerId) {
            $customerComments = Mage::helper('customer_comments')->getCommentsByCustomerId($customerId);
            return $customerComments;
        }
		return;
    }
    
  
    public function getCustomerId()
    {
        $order          = Mage::registry('current_order');
        $customerId     = $order->getCustomerId();
        if($customerId) {
            return $customerId;
        }
        return;
    }
    
    public function getTabLabel()
    {
        return Mage::helper('sales')->__('Customer Comments');
    }

    public function getTabTitle()
    {
        return Mage::helper('sales')->__('Customer Comments');
    }

    public function canShowTab()
    {
        return true;
    }

    public function isHidden()
    {
        return false;
    }
}