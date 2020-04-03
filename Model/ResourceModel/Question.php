<?php
namespace Sga\Faq\Model\ResourceModel;

use Magento\Framework\EntityManager\EntityManager;
use Magento\Framework\EntityManager\MetadataPool;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;
use Magento\Store\Model\StoreManagerInterface;
use Sga\Faq\Api\Data\QuestionInterface as ModelInterface;

class Question extends AbstractDb
{
    protected $_storeManager;
    protected $_entityManager;
    protected $_metadataPool;

    public function __construct(
        Context $context,
        StoreManagerInterface $storeManager,
        EntityManager $entityManager,
        MetadataPool $metadataPool,
        $connectionName = null
    ) {
        $this->_storeManager = $storeManager;
        $this->_entityManager = $entityManager;
        $this->_metadataPool = $metadataPool;

        parent::__construct($context, $connectionName);
    }

    protected function _construct()
    {
        $this->_init('sga_faq_question','question_id');
    }

    public function load(AbstractModel $object, $value, $field = null)
    {
        $this->_entityManager->load($object, (int)$value);
        return $this;
    }

    public function save(AbstractModel $object)
    {
        $this->_entityManager->save($object);
        return $this;
    }

    public function delete(AbstractModel $object)
    {
        $this->_entityManager->delete($object);
        return $this;
    }
    
}
