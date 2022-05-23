<?php
namespace I95Dev\Formdetails\Model\ResourceModel;

class Formdetails extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('i95dev_User_Details', 'id');
    }
}
