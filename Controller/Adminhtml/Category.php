<?php
namespace Sga\Faq\Controller\Adminhtml;

use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Page;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Ui\Component\MassAction\Filter as MassActionFilter;
use Sga\Faq\Model\CategoryFactory as ModelFactory;
use Sga\Faq\Model\ResourceModel\Category\CollectionFactory;
use Sga\Faq\Api\CategoryRepositoryInterface as ModelRepository;

abstract class Category extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Sga_Faq::faq_category';

    protected $_resultPageFactory;
    protected $_resultForwardFactory;
    protected $_jsonFactory;
    protected $_modelFactory;
    protected $_modelRepository;
    protected $_collectionFactory;
    protected $_massActionFilter;
    protected $_dataPersistor;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        ForwardFactory $resultForwardFactory,
        JsonFactory $jsonFactory,
        ModelFactory $modelFactory,
        ModelRepository $modelRepository,
        CollectionFactory $collectionFactory,
        MassActionFilter $massActionFilter,
        DataPersistorInterface $dataPersistor
    ) {
        $this->_resultPageFactory = $resultPageFactory;
        $this->_resultForwardFactory = $resultForwardFactory;
        $this->_jsonFactory = $jsonFactory;
        $this->_modelFactory = $modelFactory;
        $this->_modelRepository = $modelRepository;
        $this->_collectionFactory = $collectionFactory;
        $this->_massActionFilter = $massActionFilter;
        $this->_dataPersistor = $dataPersistor;

        parent::__construct($context);
    }

    protected function initPage(Page $resultPage)
    {
        $resultPage->setActiveMenu('Sga_Faq::faq_category')
            ->addBreadcrumb(__('FAQ'), __('FAQ'))
            ->addBreadcrumb(__('Categories'), __('Categories'));

        $resultPage->getConfig()->getTitle()->prepend(__('FAQ Categories'));

        return $resultPage;
    }
}
