<?php

namespace Aiti\ProductResponsibleUser\Model;


class Users extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'aiti_responsibleuser_users';
    protected $_cacheTag = 'aiti_responsibleuser_users';
    protected $_eventPrefix = 'aiti_responsibleuser_users';

    protected function _construct()
    {
        $this->_init('Aiti\ProductResponsibleUser\Model\ResourceModel\Users');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
