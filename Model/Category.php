<?php
namespace Sga\Faq\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Sga\Faq\Api\Data\CategoryInterface as ModelInterface;
use Sga\Faq\Model\ResourceModel\Category as ResourceModel;

class Category extends AbstractModel implements IdentityInterface, ModelInterface
{
    const CACHE_TAG = 'faq_category';

    protected $_eventPrefix = 'faq_category';

    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getCategoryId()
    {
        return $this->getData(self::CATEGORY_ID);
    }

    public function setCategoryId($id)
    {
        return $this->setData(self::CATEGORY_ID, $id);
    }

    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    public function setTitle($value)
    {
        return $this->setData(self::TITLE, $value);
    }

    public function getIsActive()
    {
        return $this->getData(self::IS_ACTIVE);
    }

    public function setIsActive($value)
    {
        return $this->setData(self::IS_ACTIVE, $value);
    }

    public function getPosition()
    {
        return $this->getData(self::POSITION);
    }

    public function setPosition($value)
    {
        return $this->setData(self::POSITION, $value);
    }

    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    public function setCreatedAt($value)
    {
        return $this->setData(self::CREATED_AT, $value);
    }

    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    public function setUpdatedAt($value)
    {
        return $this->setData(self::UPDATED_AT, $value);
    }


    public function getStores()
    {
        return $this->hasData('stores') ? $this->getData('stores') : $this->getData('store_id');
    }

}
