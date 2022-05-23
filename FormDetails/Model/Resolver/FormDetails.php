<?php

namespace I95Dev\FormDetails\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\App\Action\Context;
use Magento\Framework\GraphQl\Exception\GraphQlAuthorizationException;

class FormDetails implements ResolverInterface
{

    protected $FormDetailsFactory;

    public function __construct(
        \I95Dev\FormDetails\Model\FormDetailsFactory $FormDetailsFactory
    ) {
        $this->FormDetailsFactory = $FormDetailsFactory;
    }
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {

        $user_id = $context->getUserId();

        /* Guest checking */

        $storeUserLists = [];
        $userNames = $this->FormDetailsFactory->create();
        $collection = $userNames->getCollection();
        foreach ($collection as $item) {
            if ($user_id == $item->getData('user_id')) {
                $storeUserLists[] = [
                        'id' => $item->getData('id'),
                        'Date_Of_Birth' => $item->getData('Date_Of_Birth'),
                        'Full_Name' => $item->getData('Full_Name'),
                        'MobileNo' => $item->getData('MobileNo'),
                        'Email' => $item->getData('Email'),
                        'Area' => $item->getData('Area'),
                        'Team_Name' => $item->getData('Team_Name'),
                        'Team_Captain_Name' => $item->getData('Team_Captain_Name')
                    ];
            }
        }
        return $storeUserLists;
    }
}
