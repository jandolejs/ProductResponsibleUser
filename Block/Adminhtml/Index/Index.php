<?php

declare(strict_types=1);

namespace Aiti\ProductResponsibleUser\Block\Adminhtml\Index;

class Index extends \Magento\Backend\Block\Template
{

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }
}
