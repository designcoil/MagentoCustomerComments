<?php
/**
 * Adminhtml customer comments observer
 *
 */
class Designcoil_CustomerComments_Model_Observer
{

    public function saveCustomerComment($observer)
    {
        $params = Mage::app()->getRequest()->getParams();
        $customer = $observer->getEvent()->getCustomer();
        $customerId = $customer->getId();
        $customerComment = '';
        
        if($customerId && isset($params['customer_comments'])) {
            $customerComment = trim(Mage::helper('core')->escapeHtml($params['customer_comments']));

            if($customerComment != '') {
                $currentTimestamp = Mage::getModel('core/date')->timestamp(time());
                $currentDate = date('Y-m-d H:i:s', $currentTimestamp);
                $data = array(
                    'customer_id'   => $customerId,
                    'comment'       => $customerComment,
                    'created_at'    => $currentDate
                );

                $model = Mage::getModel('customer_comments/comments')->setData($data);
                
                try {
                    $model->save();
                } catch (Exception $e){
                    echo $e->getMessage();   
                }
            } else {
                return;
            }
        }
        return;
    }

}