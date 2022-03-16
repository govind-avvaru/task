<?php

namespace I95dev\Extension\Block;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use I95dev\Extension\Model\ResourceModel\Extension\CollectionFactory;

class Showdata extends Template
{

    public $collection;

    public function __construct(Context $context, CollectionFactory $collectionFactory, array $data = [])
    {
        $this->collection = $collectionFactory;
        parent::__construct($context, $data);
    }

    public function getCollection()
    {
        return $this->collection->create();
    }

    public function getDeleteAction()
    {
        return $this->getUrl('extension/index/delete', ['_secure' => true]);
    }

    public function getEditAction()
    {
        return $this->getUrl('extension/index/index', ['_secure' => true]);
    }

}
?>
