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
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        /** @var \Magento\Catalog\Model\ResourceModel\Product\Collection $productCollection */
        $productCollection = $objectManager->create('Magento\Catalog\Model\ResourceModel\Product\Collection');
        /** Apply filters here */
        $collection = $productCollection->addAttributeToSelect('*')->load();

        // This array will contain inner array.
        $productCollection = array();
        $innerArray = array(); 
        foreach ($collection as $product){
            $innerArray['value'] = $product->getSku();
            $innerArray['label'] = $product->getName();

            // Inserting inner array into ProductCollection array
            array_push($productCollection, $innerArray);
        } 
        return $productCollection;
    }
}

