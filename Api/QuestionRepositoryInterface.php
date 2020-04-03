<?php
namespace Sga\Faq\Api;

use Sga\Faq\Api\Data\QuestionInterface as ModelInterface;

interface QuestionRepositoryInterface
{
    public function save(ModelInterface $model);

    public function getById($id);

    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    public function delete(ModelInterface $model);

    public function deleteById($id);
}
