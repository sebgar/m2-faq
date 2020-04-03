<?php
namespace Sga\Faq\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface CategorySearchResultsInterface extends SearchResultsInterface
{
    public function getItems();

    public function setItems(array $items);
}
