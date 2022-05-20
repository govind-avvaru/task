<?php

namespace I95dev\Form\Controller\Action;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use I95Dev\Form\Model\FormDetailsFactory;


/**
 * I95dev Hello Landing page Index Controller.
 */
class index extends Action
{
    /**
     * @var PageFactory
     */
    protected $_resultPageFactory;
    protected $formDetailsFactory;
    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context     $context,
        PageFactory $resultPageFactory,
        FormDetailsFactory $formDetailsFactory
    )
    {
        $this->_resultPageFactory = $resultPageFactory;
        $this->formDetailsFactory = $formDetailsFactory;
        parent::__construct($context);
    }

    /**
     * Hello Landing page.
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        //$resultPage = $this->_resultPageFactory->create();
        // Set title of page
        //$resultPage->getConfig()->getTitle()->set(__('I95dev'));
        //return $resultPage;
         $FormDetails= $this->FormDetailsFactory->create();
         $details= $FormDetails->getcollection();
         foreach($details as item){
         print_r($item->getData());
         echo '<br />'
         } 
         
      // var_dump($details->getData());


    }
}
?>
