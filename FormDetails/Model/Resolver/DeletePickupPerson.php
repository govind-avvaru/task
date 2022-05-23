<?php

namespace I95Dev\PickupPerson\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\App\Action\Context;

class DeletePickupPerson implements ResolverInterface
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

        $pickupNames = $this->pickupListFactory->create();
        $id = $args['input']['id'];
        $exitingData = $pickupNames->load($id, 'id');
        $status = "false";
        $message = "unable to delete pickup person.";
        if ($exitingData->getIsDefault() == 1) {
            $message = "This store pickup person is set as default pickup person and cannot be deleted.";
            return ["status"=>$status,"message"=>$message];
        }
        if ($exitingData->getId()>0) {
            $exitingData->delete();
            $status = "true";
            $message = "Pickup preson deleted scuessfully.";
        }
        return ["status"=>$status,"message"=>$message];
    }
}
