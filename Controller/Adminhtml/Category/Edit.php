<?php
namespace Sga\Faq\Controller\Adminhtml\Category;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Sga\Faq\Controller\Adminhtml\Category as ParentClass;

class Edit extends ParentClass implements HttpGetActionInterface
{
    public function execute()
    {
        $id = $this->getRequest()->getParam('category_id');
        $model = $this->_modelFactory->create();
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This category no longer exists.'));

                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }

        $resultPage = $this->_resultPageFactory->create();
        $this->initPage($resultPage)
            ->addBreadcrumb(
            $id ? __('Edit Category') : __('New Category'),
            $id ? __('Edit Category') : __('New Category')
            );
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? 'Category : #'.$model->getId() : __('New Category'));

        return $resultPage;
    }
}
