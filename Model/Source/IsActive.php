<?php
namespace Sga\Faq\Model\Source;

use Magento\Framework\Data\OptionSourceInterface;

class IsActive implements OptionSourceInterface
{
    public function toOptionArray()
    {
        $availableOptions = [1 => __('Enabled'), 0 => __('Disabled')];
        $options = [];
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}
