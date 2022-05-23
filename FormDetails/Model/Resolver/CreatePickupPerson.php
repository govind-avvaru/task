<?php

namespace I95Dev\PickupPerson\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Exception\GraphQlAuthorizationException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\App\Action\Context;

class CreatePickupPerson implements ResolverInterface
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
        $inputIndex='input';
        $statusIndex='status';
        $messageIndex='message';
        /* Guest checking */
        if (!$customer_id && 0 === $customer_id) {
            throw new GraphQlAuthorizationException(__('The current user cannot perform operations on create pickup'));
        }
        $args[$inputIndex]['customer_id']=$customer_id;
        $pickupNames = $this->pickupListFactory->create();
        
        $verification_id = $args[$inputIndex]['mobile_number'];
        if (isset($args[$inputIndex]['id'])) {
            $pickuppersonName = $args[$inputIndex]['name'];
            $callingcode = $args[$inputIndex]['callingcode'];
            $pickupNames->load($args[$inputIndex]['id']);
            $pickupNames->setName($pickuppersonName);
            $pickupNames->setCallingcode($callingcode);
            $pickupNames->setMobileNumber($verification_id);
            $pickupNames->save();
            return [$statusIndex => "true",$messageIndex => $pickuppersonName." updated successfully."];
        }
        $exitingData = $pickupNames->load($verification_id, 'mobile_number');
        if ($exitingData->getId()>0) {
            $status = "false";
            $message = "$verification_id is alredy exits in application.";
            return [$statusIndex=>$status,$messageIndex=>$message];
        }
        $customerExitingData = $pickupNames->load($customer_id, 'customer_id');
        if ($customerExitingData->getId()>0) {
            $is_default=0;
        } else {
            $is_default=1;
        }
        $args[$inputIndex]['is_default']=$is_default;
        $pickupNames->setData($args[$inputIndex]);
        if ($pickupNames->save()) {
            $status = "true";
            $message = "pickup person created successfully.";
        } else {
            $status = "false";
            $message = "unable to save pickup person.";
        }
        return [$statusIndex=>$status,$messageIndex=>$message];
    }
}
