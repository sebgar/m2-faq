<?php
namespace Sga\Faq\Model\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Sga\Faq\Model\CategoryFactory as ModelFactory;

class Category implements OptionSourceInterface
{
    protected $_modelFactory;

    public function __construct(
        ModelFactory $modelFactory
    ) {
        $this->_modelFactory = $modelFactory;
    }

    public function toOptionArray()
    {
        $items = $this->_modelFactory->create()->getCollection()->getItems();
        $options = [];
        foreach ($items as $item) {
            $options[] = [
                'label' => $item->getTitle(),
                'value' => $item->getCategoryId(),
            ];
        }
        return $options;
    }
}
