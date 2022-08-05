<?php

namespace Aiti\ProductResponsibleUser\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;

class Users extends AbstractDb
{

    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('aiti_product_responsible_user', 'user_id');
    }
}
