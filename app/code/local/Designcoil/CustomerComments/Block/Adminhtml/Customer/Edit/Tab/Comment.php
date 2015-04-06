<?php 
/**
 * Adminhtml Customer Comments tab
 *
 */
class Designcoil_CustomerComments_Block_Adminhtml_Customer_Edit_Tab_Comment extends Mage_Adminhtml_Block_Template implements Mage_Adminhtml_Block_Widget_Tab_Interface
{

    public function __construct()
    {
        $this->setTemplate('customercomments/comment.phtml');
    }

    /**
     * Return collection of customer comments
     *
     * @return Designcoil_CustomerComments_Model_Resource_Comments_Collection
     */
    public function getCustomerComments()
    {
        $customer      = Mage::registry('current_customer');
        $customerId    = $customer->getId();
        if($customerId) {
            $customerComments = Mage::helper('customer_comments')->getCommentsByCustomerId($customerId);
            return $customerComments;
        }
        return;
    }
    
    /**
     * Return link to delete action in CommentsController.php
     *
     * @return string
     */
    public function getDeleteCommentUrl($commentId)
    {
        $customer      = Mage::registry('current_customer');
        $customerId    = $customer->getId();
        return $this->getUrl('customer_comments/adminhtml_comments/delete/comment/'.$commentId.'/customer/'.$customerId);
    }

    /**
     * Return Tab label
     *
     * @return string
     */
    public function getTabLabel()
    {
        return $this->__('Customer Comments');
    }

    /**
     * Return Tab title
     *
     * @return string
     */
    public function getTabTitle()
    {
        return $this->__('Customer Comments');
    }

    /**
     * Can show tab in tabs
     *
     * @return boolean
     */
    public function canShowTab()
    {
        $customer = Mage::registry('current_customer');
        return (bool)$customer->getId();
    }

    /**
     * Tab is hidden
     *
     * @return boolean
     */
    public function isHidden()
    {
        return false;
    }

     /**
     * Defines after which tab, this tab should be rendered
     *
     * @return string
     */
    public function getAfter()
    {
        return 'tags';
    }
}
?>