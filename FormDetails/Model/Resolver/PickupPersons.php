<?php

namespace I95Dev\PickupPerson\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\App\Action\Context;
use Magento\Framework\GraphQl\Exception\GraphQlAuthorizationException;

class PickupPersons implements ResolverInterface
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
       
        /* Guest checking */
        if (!$customer_id && 0 === $customer_id) {
            throw new GraphQlAuthorizationException(__('The current user cannot perform operations on Store Pickup'));
        }
        $storePickupLists = [];
        $pickupNames = $this->pickupListFactory->create();
        $collection = $pickupNames->getCollection();
        foreach ($collection as $item) {
            if ($customer_id == $item->getData('customer_id')) {
                $storePickupLists[] = [
                        'id' => $item->getData('id'),
                        'name' => $item->getData('name'),
                        'mobile_number' => $item->getData('mobile_number'),
                        'is_default' => $item->getData('is_default'),
                        'callingcode' => $item->getData('callingcode')
                    ];
            }
        }
        return $storePickupLists;
    }
}
