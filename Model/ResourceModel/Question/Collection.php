<?php
namespace Sga\Faq\Model\ResourceModel\Question;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Sga\Faq\Model\Question as Model;
use Sga\Faq\Model\ResourceModel\Question as ResourceModel;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'question_id';

    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);

    }

}
