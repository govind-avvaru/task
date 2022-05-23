<?php

namespace I95Dev\PickupPerson\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\App\Action\Context;

class ManagePickupPerson implements ResolverInterface
{

    protected $pickupListFactory;

    public function __construct(
        \I95Dev\PickupPerson\Model\PickuppersonFactory $pickupListFactory
    ) {
        $this->pickupListFactory = $pickupListFactory;
    }
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {
        $customer_id = $context->getUserId();

        $id = $args['input']['id'];
        $is_default = 1;
        $notDefault = 0;
        $pickupNames = $this->pickupListFactory->create();
        $collections = $pickupNames->getCollection()->addFieldToFilter('customer_id', $customer_id);
        foreach ($collections as $collection) {
                $pickupNames->load($collection->getId(), 'id');
                $pickupNames->setData('is_default', $notDefault);
                $pickupNames->save();
        }

        $exitingData = $pickupNames->load($id, 'id');
        $status = "false";
        $message = "unable updated pickup person.";
        if ($exitingData->getId()>0) {
            $pickupNames->setData('is_default', $is_default);
            if ($pickupNames->save()) {
                $status = "true";
                $message = "pickup person updated successfully.";
            }
        }
        return ["status"=>$status,"message"=>$message];
    }
}
