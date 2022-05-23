<?php

namespace I95Dev\FormDetails\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Exception\GraphQlAuthorizationException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\App\Action\Context;

class CreateFormDetails implements ResolverInterface
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
        $inputIndex='input';
        $statusIndex='status';
        $messageIndex='message';

              $args[$inputIndex]['user_id']=$user_id;
        $userNames = $this->FormDetailsFactory->create();

        $verification_id = $args[$inputIndex]['mobile_number'];
        if (isset($args[$inputIndex]['id'])) {
            $FormDetailsName = $args[$inputIndex]['name'];
            $Email = $args[$inputIndex]['Email'];
            $userNames->load($args[$inputIndex]['id']);
            $userNames->setName($FormDetailsName);
            $userNames->setEmail($Email);
            $userNames->setMobileNumber($verification_id);
            $userNames->save();
            return [$statusIndex => "true",$messageIndex => $FormDetailsName ." updated successfully."];
        }
        $exitingData = $userNames->load($verification_id, 'mobile_number');
        if ($exitingData->getId()>0) {
            $status = "false";
            $message = "$verification_id is alredy exits in application.";
            return [$statusIndex=>$status,$messageIndex=>$message];
        }
        $customerExitingData = $userNames->load($user_id, 'user_id');
        if ($customerExitingData->getId()>0) {
            $is_default=0;
        } else {
            $is_default=1;
        }
        $args[$inputIndex]['is_default']=$is_default;
        $userNames->setData($args[$inputIndex]);
        if ($userNames->save()) {
            $status = "true";
            $message = "user person created successfully.";
        } else {
            $status = "false";
            $message = "unable to save user person.";
        }
        return [$statusIndex=>$status,$messageIndex=>$message];
    }
}
