<?php

namespace Aiti\ProductResponsibleUser\Model\ResourceModel\Users;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;


class Collection extends AbstractCollection
{
    protected $_idFieldName = 'post_id';
    protected $_eventPrefix = 'aiti_productresponsibleuser_users_collection';
    protected $_eventObject = 'users_collection';

    protected function _construct()
    {
        $this->_init('Aiti\ProductResponsibleUser\Model\Users', 'Aiti\ProductResponsibleUser\Model\ResourceModel\Users');
    }

}
