<?php
namespace Sga\Faq\Api;

use Sga\Faq\Api\Data\CategoryInterface as ModelInterface;

interface CategoryRepositoryInterface
{
    public function save(ModelInterface $model);

    public function getById($id);

    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    public function delete(ModelInterface $model);

    public function deleteById($id);
}
