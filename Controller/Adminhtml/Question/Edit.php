<?php
namespace Sga\Faq\Controller\Adminhtml\Question;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Sga\Faq\Controller\Adminhtml\Question as ParentClass;

class Edit extends ParentClass implements HttpGetActionInterface
{
    public function execute()
    {
        $id = $this->getRequest()->getParam('question_id');
        $model = $this->_modelFactory->create();
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This question no longer exists.'));

                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }

        $resultPage = $this->_resultPageFactory->create();
        $this->initPage($resultPage)
            ->addBreadcrumb(
            $id ? __('Edit Question') : __('New Question'),
            $id ? __('Edit Question') : __('New Question')
            );
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? 'Question : #'.$model->getId() : __('New Question'));

        return $resultPage;
    }
}
