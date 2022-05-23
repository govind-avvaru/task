<?php
namespace I95Dev\FormDetails\Model;

class FormDetails extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('I95Dev\FormDetails\Model\ResourceModel\FormDetails');
    }
}
