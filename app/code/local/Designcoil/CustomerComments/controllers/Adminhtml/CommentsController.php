<?php
/**
 * Adminhtml customer comments controller
 *
 */
class Designcoil_CustomerComments_Adminhtml_CommentsController extends Mage_Adminhtml_Controller_Action
{
	public function deleteAction()
    {
        $commentId     = $this->getRequest()->getParam('comment');
        $customerId    = $this->getRequest()->getParam('customer');
        
        if(is_numeric($commentId)) {
            $customer_comment  = Mage::getModel('customer_comments/comments')->load($commentId);
            if($customer_comment->getCustomerId() == $customerId) {
                try {
                    $customer_comment->delete();
                    $message = Mage::helper('customer_comments')->__('Customer comment was deleted.');
                    Mage::getSingleton('adminhtml/session')->addSuccess($message);
                } catch (Exception $e){
                    echo $e->getMessage(); 
                }
            }
        }
        
        $this->_redirect('adminhtml/customer/edit', array('id' => $customerId, 'back'=>'edit','tab'=>'customer_info_tabs_customer_edit_tab_comment'));
    }
}