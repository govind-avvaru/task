<?php
namespace I95dev\Extension\Model\ResourceModel\Extension;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('I95dev\Extension\Model\Extension', 'I95dev\Extension\Model\ResourceModel\Extension');
    }
}
?>
