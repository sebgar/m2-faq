<?php
namespace Sga\Faq\Block;

use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\Serialize\Serializer\Json;
use Magento\Cms\Model\Template\FilterProvider;
use Sga\Faq\Model\CategoryFactory;
use Sga\Faq\Model\QuestionFactory;

class Faq extends \Magento\Framework\View\Element\Template
{
    protected $_categoryFactory;
    protected $_questionFactory;
    protected $_jsonSerializer;
    protected $_filterProvider;

    public function __construct(
        Context $context,
        CategoryFactory $categoryFactory,
        QuestionFactory $questionFactory,
        Json $jsonSerializer,
        FilterProvider $filterProvider
    ) {
        $this->_categoryFactory = $categoryFactory;
        $this->_questionFactory = $questionFactory;
        $this->_jsonSerializer = $jsonSerializer;
        $this->_filterProvider = $filterProvider;

        parent::__construct($context);
    }

    public function getJsonSerializer()
    {
        return $this->_jsonSerializer;
    }

    public function getCategories()
    {
        return $this->_categoryFactory->create()->getCollection()
            ->addFieldToFilter('is_active', 1)
            ->addStoreFilter()
            ->addOrder('position', 'ASC')
            ->getItems();
    }

    public function getQuestionsByCategory($categoryId)
    {
        return $this->_questionFactory->create()->getCollection()
            ->addFieldToFilter('is_active', 1)
            ->addFieldToFilter('category_id', $categoryId)
            ->addOrder('position', 'ASC')
            ->getItems();
    }

    public function getResponseHtml($text)
    {
        return $this->_filterProvider->getBlockFilter()->filter($text);
    }
}