<?php
namespace Sga\Faq\Controller\Adminhtml\Category;

use Sga\Faq\Controller\Adminhtml\Category as ParentClass;

class Index extends ParentClass
{
    public function execute()
    {
        $resultPage = $this->_resultPageFactory->create();
        $this->initPage($resultPage);

        return $resultPage;
    }
}
