<?php
namespace Sga\Faq\Controller\Adminhtml\Category;

use Magento\Framework\App\Action\HttpPostActionInterface as HttpPostActionInterface;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Backend\App\Action\Context;
use Sga\Faq\Api\CategoryRepositoryInterface as ModelRepositoryInterface;
use Sga\Faq\Model\CategoryFactory as ModelFactory;
use Sga\Faq\Controller\Adminhtml\Category as ParentClass;

class Save extends ParentClass implements HttpPostActionInterface
{
    protected $dataPersistor;
    private $modelFactory;
    private $modelRepository;

    public function __construct(
        Context $context,
        DataPersistorInterface $dataPersistor,
        ModelFactory $modelFactory,
        ModelRepositoryInterface $modelRepository
    ) {
        $this->dataPersistor = $dataPersistor;
        $this->modelFactory = $modelFactory;
        $this->modelRepository = $modelRepository;

        parent::__construct($context);
    }

    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            if (isset($data['is_active']) && $data['is_active'] === 'true') {
                $data['is_active'] = 1;
            }
            if (empty($data['category_id'])) {
                $data['category_id'] = null;
            }

            $model = $this->modelFactory->create();

            $id = $this->getRequest()->getParam('category_id');
            if ($id) {
                try {
                    $model = $this->modelRepository->getById($id);
                } catch (LocalizedException $e) {
                    $this->messageManager->addErrorMessage(__('This category no longer exists.'));
                    return $resultRedirect->setPath('*/*/');
                }
            }

            $model->setData($data);

            try {
                $this->modelRepository->save($model);
                $this->messageManager->addSuccessMessage(__('You saved the category.'));
                $this->dataPersistor->clear('faq_category');
                return $this->processReturn($model, $data, $resultRedirect);
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the category.'));
            }

            $this->dataPersistor->set('faq_category', $data);
            return $resultRedirect->setPath('*/*/edit', ['category_id' => $id]);
        }
        return $resultRedirect->setPath('*/*/');
    }

    private function processReturn($model, $data, $resultRedirect)
    {
        $redirect = $data['back'] ?? 'close';

        if ($redirect ==='continue') {
            $resultRedirect->setPath('*/*/edit', ['category_id' => $model->getId()]);
        } else if ($redirect === 'close') {
            $resultRedirect->setPath('*/*/');
        } else if ($redirect === 'duplicate') {
            $duplicateModel = $this->modelFactory->create(['data' => $data]);
            $duplicateModel->setId(null);
            $duplicateModel->setIsActive(0);
            $this->modelRepository->save($duplicateModel);

            $id = $duplicateModel->getId();
            $this->messageManager->addSuccessMessage(__('You duplicated the category.'));
            $this->dataPersistor->set('faq_category', $data);
            $resultRedirect->setPath('*/*/edit', ['category_id' => $id]);
        }
        return $resultRedirect;
    }
}
