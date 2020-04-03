<?php
namespace Sga\Faq\Controller\Adminhtml\Question;

use Sga\Faq\Controller\Adminhtml\Question as ParentClass;

class Index extends ParentClass
{
    public function execute()
    {
        $resultPage = $this->_resultPageFactory->create();
        $this->initPage($resultPage);

        return $resultPage;
    }
}
