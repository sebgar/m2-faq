<?php
namespace Sga\Faq\Api\Data;

interface QuestionInterface
{
    const QUESTION_ID = 'question_id';
    const CATEGORY_ID = 'category_id';
    const QUESTION = 'question';
    const RESPONSE = 'response';
    const IS_ACTIVE = 'is_active';
    const POSITION = 'position';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * Get question id
     *
     * @return int|null
     */
    public function getQuestionId();

    /**
     * Set question id
     *
     * @param int $id
     * @return QuestionInterface
     */
    public function setQuestionId($id);
    
    /**
     * Get category_id
     *
     * @return int|null
     */
    public function getCategoryId();

    /**
     * Set category_id
     *
     * @param int $value
     * @return QuestionInterface
     */
    public function setCategoryId($value);
    
    /**
     * Get question
     *
     * @return string|null
     */
    public function getQuestion();

    /**
     * Set question
     *
     * @param string $value
     * @return QuestionInterface
     */
    public function setQuestion($value);
    
    /**
     * Get response
     *
     * @return string|null
     */
    public function getResponse();

    /**
     * Set response
     *
     * @param string $value
     * @return QuestionInterface
     */
    public function setResponse($value);
    
    /**
     * Get is_active
     *
     * @return bool|null
     */
    public function getIsActive();

    /**
     * Set is_active
     *
     * @param bool $value
     * @return QuestionInterface
     */
    public function setIsActive($value);
    
    /**
     * Get position
     *
     * @return int|null
     */
    public function getPosition();

    /**
     * Set position
     *
     * @param int $value
     * @return QuestionInterface
     */
    public function setPosition($value);
    
    /**
     * Get created_at
     *
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created_at
     *
     * @param string $value
     * @return QuestionInterface
     */
    public function setCreatedAt($value);
    
    /**
     * Get updated_at
     *
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set updated_at
     *
     * @param string $value
     * @return QuestionInterface
     */
    public function setUpdatedAt($value);
    
}
