<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Aiti\ProductResponsibleUser\Model;

use Aiti\ProductResponsibleUser\Api\Data\ProductResponsibleUserInterfaceFactory;
use Aiti\ProductResponsibleUser\Api\Data\ProductResponsibleUserSearchResultsInterfaceFactory;
use Aiti\ProductResponsibleUser\Model\ResourceModel\ProductResponsibleUser as ResourceProductResponsibleUser;
use Aiti\ProductResponsibleUser\Model\ResourceModel\ProductResponsibleUser\CollectionFactory as ProductResponsibleUserCollectionFactory;
use Aiti\ProductResponsibleUserApi\Api\Data\ProductResponsibleUserApiInterface;
use Aiti\ProductResponsibleUserApi\Api\ProductResponsibleUserApiRepositoryInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class ProductResponsibleUserApiRepository implements ProductResponsibleUserApiRepositoryInterface
{

    /**
     * @var ResourceProductResponsibleUser
     */
    protected $resource;

    /**
     * @var ProductResponsibleUserInterfaceFactory
     */
    protected $productResponsibleUserFactory;

    /**
     * @var ProductResponsibleUserCollectionFactory
     */
    protected $productResponsibleUserCollectionFactory;

    /**
     * @var ProductResponsibleUserApi
     */
    protected $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;


    /**
     * @param ResourceProductResponsibleUser $resource
     * @param ProductResponsibleUserInterfaceFactory $productResponsibleUserFactory
     * @param ProductResponsibleUserCollectionFactory $productResponsibleUserCollectionFactory
     * @param ProductResponsibleUserSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceProductResponsibleUser $resource,
        ProductResponsibleUserInterfaceFactory $productResponsibleUserFactory,
        ProductResponsibleUserCollectionFactory $productResponsibleUserCollectionFactory,
        ProductResponsibleUserSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->productResponsibleUserFactory = $productResponsibleUserFactory;
        $this->productResponsibleUserCollectionFactory = $productResponsibleUserCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(
        ProductResponsibleUserApiInterface $productResponsibleUser
    ) {
        try {
            $this->resource->save($productResponsibleUser);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the productResponsibleUser: %1',
                $exception->getMessage()
            ));
        }
        return $productResponsibleUser;
    }

    /**
     * @inheritDoc
     */
    public function get($productResponsibleUserId)
    {
        $productResponsibleUser = $this->productResponsibleUserFactory->create();
        $this->resource->load($productResponsibleUser, $productResponsibleUserId);
        if (!$productResponsibleUser->getId()) {
            throw new NoSuchEntityException(__('ProductResponsibleUser with id "%1" does not exist.', $productResponsibleUserId));
        }
        return $productResponsibleUser;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->productResponsibleUserCollectionFactory->create();

        $this->collectionProcessor->process($criteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);

        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }

        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(
        ProductResponsibleUserApiInterface $productResponsibleUser
    ) {
        try {
            $productResponsibleUserModel = $this->productResponsibleUserFactory->create();
            $this->resource->load($productResponsibleUserModel, $productResponsibleUser->getProductresponsibleuserId());
            $this->resource->delete($productResponsibleUserModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the ProductResponsibleUser: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($productResponsibleUserId)
    {
        return $this->delete($this->get($productResponsibleUserId));
    }
}

