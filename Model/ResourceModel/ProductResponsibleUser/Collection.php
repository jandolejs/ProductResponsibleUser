<?php
declare(strict_types=1);

namespace Aiti\ProductResponsibleUser\Model\ResourceModel\ProductResponsibleUser;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'productresponsibleuser_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Aiti\ProductResponsibleUser\Model\ProductResponsibleUserApi::class,
            \Aiti\ProductResponsibleUser\Model\ResourceModel\ProductResponsibleUser::class
        );
    }
}

