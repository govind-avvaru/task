<?php

namespace I95Dev\Formdetails\Model\ResourceModel\Formdetails;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('I95Dev\PickupPerson\Model\Pickupperson', 'I95Dev\PickupPerson\Model\ResourceModel\Pickupperson');
        $this->_map['fields']['page_id'] = 'main_table.page_id';
    }
}
