<?php

namespace I95Dev\FormDetails\Model\ResourceModel\FormDetails;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('I95Dev\FormDetails\Model\FormDetails', 'I95Dev\FormDetails\Model\ResourceModel\FormDetails');
        $this->_map['fields']['page_id'] = 'main_table.page_id';
    }
}
