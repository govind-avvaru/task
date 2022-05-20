<?php

namespace I95dev\Form\Model\ResourceModel\FormDetails;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use I95Dev\Form\Model\FormDetails;
use I95Dev\Form\Model\ResourceModel\FormDetails as FormDetailsResource

class collection extends Abstractcollection
{
    protected function __construct(){
        parent::_construct();
        $this->_init(FormDetails::class,FormDetailsResource::class);
    }
}
