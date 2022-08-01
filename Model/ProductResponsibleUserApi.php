<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Aiti\ProductResponsibleUser\Model;

use Aiti\ProductResponsibleUserApi\Api\Data\ProductResponsibleUserApiInterface;
use Magento\Framework\Model\AbstractModel;

class ProductResponsibleUserApi extends AbstractModel implements ProductResponsibleUserApiInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Aiti\ProductResponsibleUser\Model\ResourceModel\ProductResponsibleUser::class);
    }

    /**
     * @inheritDoc
     */
    public function getProductresponsibleuserId()
    {
        return $this->getData(self::PRODUCTRESPONSIBLEUSER_ID);
    }

    /**
     * @inheritDoc
     */
    public function setProductresponsibleuserId($productresponsibleuserId)
    {
        return $this->setData(self::PRODUCTRESPONSIBLEUSER_ID, $productresponsibleuserId);
    }

    /**
     * @inheritDoc
     */
    public function getUserId()
    {
        return $this->getData(self::USER_ID);
    }

    /**
     * @inheritDoc
     */
    public function setUserId($userId)
    {
        return $this->setData(self::USER_ID, $userId);
    }
}

