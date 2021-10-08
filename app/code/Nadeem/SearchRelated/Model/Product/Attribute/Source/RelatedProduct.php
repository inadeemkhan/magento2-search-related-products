<?php
declare(strict_types=1);

namespace Nadeem\SearchRelated\Model\Product\Attribute\Source;

class RelatedProduct extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{

    /**
     * getAllOptions
     *
     * @return array
     */
    public function getAllOptions()
    {
        $this->_options = [
        ['value' => 'test1', 'label' => __('Test1')],
        ['value' => 'test2', 'label' => __('Test2')]
        ];
        return $this->_options;
    }
}

