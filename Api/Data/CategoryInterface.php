<?php
namespace Sga\Faq\Api\Data;

interface CategoryInterface
{
    const CATEGORY_ID = 'category_id';
    const TITLE = 'title';
    const IS_ACTIVE = 'is_active';
    const POSITION = 'position';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * Get category id
     *
     * @return int|null
     */
    public function getCategoryId();

    /**
     * Set category id
     *
     * @param int $id
     * @return CategoryInterface
     */
    public function setCategoryId($id);
    
    /**
     * Get title
     *
     * @return string|null
     */
    public function getTitle();

    /**
     * Set title
     *
     * @param string $value
     * @return CategoryInterface
     */
    public function setTitle($value);
    
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
     * @return CategoryInterface
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
     * @return CategoryInterface
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
     * @return CategoryInterface
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
     * @return CategoryInterface
     */
    public function setUpdatedAt($value);
    
}
