<?php
namespace Sga\Faq\Model;

use Sga\Faq\Api\CategoryRepositoryInterface;
use Sga\Faq\Api\Data\CategoryInterface as ModelInterface;
use Sga\Faq\Model\CategoryFactory as ModelFactory;
use Sga\Faq\Model\ResourceModel\Category as ResourceModel;
use Sga\Faq\Model\ResourceModel\Category\CollectionFactory as ModelCollectionFactory;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchResultsInterface as SearchResultsInterfaceFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Store\Model\StoreManagerInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $resource;
    protected $modelFactory;
    protected $modelCollectionFactory;
    protected $searchResultsFactory;
    protected $dataObjectHelper;
    protected $storeManager;
    protected $collectionProcessor;

    public function __construct(
        ResourceModel $resource,
        ModelFactory $modelFactory,
        ModelCollectionFactory $modelCollectionFactory,
        SearchResultsInterfaceFactory $searchResultsFactory,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->modelFactory = $modelFactory;
        $this->modelCollectionFactory = $modelCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
    }

    public function save(ModelInterface $model)
    {
        if (empty($model->getStoreId())) {
            $model->setStoreId($this->storeManager->getStore()->getId());
        }

        try {
            $this->resource->save($model);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $model;
    }

    public function getById($id)
    {
        $model = $this->modelFactory->create();
        $this->resource->load($model, $id);
        if (!$model->getId()) {
            throw new NoSuchEntityException(__('The "%1" ID doesn\'t exist.', $id));
        }
        return $model;
    }

    public function getList(SearchCriteriaInterface $criteria)
    {
        $collection = $this->modelCollectionFactory->create();
        $this->collectionProcessor->process($criteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    public function delete(ModelInterface $model)
    {
        try {
            $this->resource->delete($model);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    public function deleteById($id)
    {
        return $this->delete($this->getById($id));
    }
}
