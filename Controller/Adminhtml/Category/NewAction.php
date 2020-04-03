<?php
namespace Sga\Faq\Controller\Adminhtml\Category;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Sga\Faq\Controller\Adminhtml\Category as ParentClass;

class NewAction extends ParentClass implements HttpGetActionInterface
{
    public function execute()
    {
        $resultForward = $this->_resultForwardFactory->create();
        return $resultForward->forward('edit');
    }
}
