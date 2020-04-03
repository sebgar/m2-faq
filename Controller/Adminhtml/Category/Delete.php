<?php
namespace Sga\Faq\Controller\Adminhtml\Category;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Sga\Faq\Controller\Adminhtml\Category as ParentClass;
use Sga\Faq\Model\Category as Model;

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

        $id = $this->getRequest()->getParam('category_id');
        if ($id) {
            try {
                $model = $this->_objectManager->create(Model::class);
                $model->load($id);
                $model->delete();

                $this->messageManager->addSuccessMessage(__('You deleted the category.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['category_id' => $id]);
            }
        }
        $this->messageManager->addErrorMessage(__('We can\'t find a category to delete.'));
        return $resultRedirect->setPath('*/*/');
    }
}
