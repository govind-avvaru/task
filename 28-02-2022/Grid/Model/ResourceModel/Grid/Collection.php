<?php


/**
 * Grid Grid Collection.
 * @category    I95dev
 * @author      I95dev Software Private Limited
 */

namespace I95dev\Grid\Model\ResourceModel\Grid;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';

    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init('I95dev\Grid\Model\Grid', 'I95dev\Grid\Model\ResourceModel\Grid');
    }
}
?>
