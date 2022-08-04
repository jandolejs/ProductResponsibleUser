<?php
declare(strict_types=1);

namespace Aiti\ProductResponsibleUser\Model\ResourceModel\ProductResponsibleUser;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'user_id';

    protected function _construct()
    {
        $this->_init(
            \Aiti\ProductResponsibleUser\Model\ProductResponsibleUserApi::class,
            \Aiti\ProductResponsibleUser\Model\ResourceModel\ProductResponsibleUser::class
        );
    }
}

