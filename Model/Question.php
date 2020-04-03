<?php
namespace Sga\Faq\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Sga\Faq\Api\Data\QuestionInterface as ModelInterface;
use Sga\Faq\Model\ResourceModel\Question as ResourceModel;

class Question extends AbstractModel implements IdentityInterface, ModelInterface
{
    const CACHE_TAG = 'faq_question';

    protected $_eventPrefix = 'faq_question';

    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getQuestionId()
    {
        return $this->getData(self::QUESTION_ID);
    }

    public function setQuestionId($id)
    {
        return $this->setData(self::QUESTION_ID, $id);
    }

    public function getCategoryId()
    {
        return $this->getData(self::CATEGORY_ID);
    }

    public function setCategoryId($value)
    {
        return $this->setData(self::CATEGORY_ID, $value);
    }

    public function getQuestion()
    {
        return $this->getData(self::QUESTION);
    }

    public function setQuestion($value)
    {
        return $this->setData(self::QUESTION, $value);
    }

    public function getResponse()
    {
        return $this->getData(self::RESPONSE);
    }

    public function setResponse($value)
    {
        return $this->setData(self::RESPONSE, $value);
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


}
