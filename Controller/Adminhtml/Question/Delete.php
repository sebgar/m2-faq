<?php
namespace Sga\Faq\Controller\Adminhtml\Question;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Sga\Faq\Controller\Adminhtml\Question as ParentClass;

class Delete extends ParentClass implements HttpPostActionInterface
{
    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        $id = $this->getRequest()->getParam('question_id');
        if ($id) {
            try {
                $model = $this->_modelFactory->create();
                $model->load($id);
                $model->delete();

                $this->messageManager->addSuccessMessage(__('You deleted the question.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['question_id' => $id]);
            }
        }
        $this->messageManager->addErrorMessage(__('We can\'t find a question to delete.'));
        return $resultRedirect->setPath('*/*/');
    }
}
