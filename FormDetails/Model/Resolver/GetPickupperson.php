<?php

namespace I95Dev\PickupPerson\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\GraphQl\Exception\GraphQlAuthorizationException;

class GetPickupperson implements ResolverInterface
{

    protected $collectionFactory;

    public function __construct(
        \I95Dev\PickupPerson\Model\ResourceModel\Pickupperson\CollectionFactory $collectionFactory
    ) {
        $this->collectionFactory = $collectionFactory;
    }
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {

        $collection = $this->collectionFactory->create();
        if (isset($args['id'])) {
            $collection->AddFieldToFilter(
                'id',
                $args['id']
            );
        }
        $collection->getData();
        
        return $collection;
    }
}
