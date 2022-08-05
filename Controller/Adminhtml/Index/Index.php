<?php

declare(strict_types=1);

namespace Aiti\ProductResponsibleUser\Controller\Adminhtml\Index;

use Aiti\ProductResponsibleUser\Model\UsersFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action implements HttpGetActionInterface
{

    protected PageFactory $pageFactory;
    protected UsersFactory $usersFactory;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        UsersFactory $usersFactory
    )
    {
        $this->pageFactory = $pageFactory;
        $this->usersFactory = $usersFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $collection = $this->usersFactory->create()->getCollection();

        $resultPage = $this->pageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend((__('Responsible users')));

        return $resultPage;
    }
}
