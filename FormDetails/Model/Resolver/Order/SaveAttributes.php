<?php


declare(strict_types=1);

namespace I95Dev\PickupPerson\Model\Resolver\Order;

use Exception;
use Magento\Framework\Exception\InputException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Quote\Model\QuoteFactory;
use Magento\QuoteGraphQl\Model\Cart\GetCartForUser;
use Magento\Quote\Model\MaskedQuoteIdToQuoteIdInterface;
use \Magento\Framework\Exception\NoSuchEntityException;



class SaveAttributes implements ResolverInterface
{
    
    /**
     * @var GetCartForUser
     */
    protected $getCartForUser;
    protected $quoteFactory;



    
    public function __construct(
        GetCartForUser $getCartForUser,
        MaskedQuoteIdToQuoteIdInterface $maskedQuoteIdToQuoteId,
        QuoteFactory $quoteFactory
        
    ) {
       
        $this->getCartForUser = $getCartForUser;
        $this->maskedQuoteIdToQuoteId = $maskedQuoteIdToQuoteId;
        $this->quoteFactory = $quoteFactory;

       
    }

    /**
     * @inheritdoc
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        if (empty($args['input']['cart_id'])) {
            throw new GraphQlInputException(__('Required parameter "cart_id" is missing'));
        }
        $maskedCartId = $args['input']['cart_id'];
        $storeId = (int) $context->getExtensionAttributes()->getStore()->getId();

        $maskedCartId = $args['input']['cart_id'];
        $this->getCartForUser->execute($maskedCartId, $context->getUserId(),$storeId);

        $PickupPerson = $args['input']['PickupPerson'];
        $PickupTime = $args['input']['PickupTime'];
        $PickupDate = $args['input']['PickupDate'];
          $quoteId = $this->getQuoteIdFromMaskedHash($maskedCartId);
        $quote = $this->quoteFactory->create()->load($quoteId);
        try {
            $quote->setData('pickup_person',$PickupPerson);
            $quote->setData('pickup_time',$PickupTime);
            $quote->setData('delivery_date',$PickupDate);
            $quote->save();
        } catch (Exception $e) {
            throw new GraphQlInputException(__($e->getMessage()));
        }

        return true;

    }

    /**
     * get QuoteId by masked id.
     *
     * @return int
     * @throws LocalizedException
     */
    public function getQuoteIdFromMaskedHash($maskedHashId)
    {
        try {
            $cartId = $this->maskedQuoteIdToQuoteId->execute($maskedHashId);
        } catch (NoSuchEntityException $exception) {
            throw new GraphQlInputException(___('Could not find a cart with ID "%masked_cart_id"', ['masked_cart_id' => $maskedHashId]));
            
        }

        return $cartId;
    }

   

   
}