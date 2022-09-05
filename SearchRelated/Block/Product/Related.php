<?php

namespace Nadeem\SearchRelated\Block\Product;

use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\Registry;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\CatalogWidget\Block\Product\ProductsList;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\Search\FilterGroupBuilder;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Catalog\Model\ProductRepository;

class Related extends \Magento\Framework\View\Element\Template
{
    /**
     * @var Registry
     */
    protected $_coreRegistry = null;
    /**
     * @var CollectionFactory
     */
    protected $_productCollectionFactory;
    /**
     * @var ProductsList
     */
    protected $_productsList;
    /**
     * @var FilterBuilder
     */
    protected $_filterBuilder;
    /**
     * @var FilterGroupBuilder
     */
    protected $_filterGroupBuilder;
    /**
     * @var SearchCriteriaBuilder
     */
    protected $_searchCriteriaBuilder;
    /**
     * @var ProductRepository
     */
    protected $_productRepository;

    /**
     * @param Context $context
     * @param Registry $registry
     * @param CollectionFactory $productCollectionFactory
     * @param ProductsList
     * @param FilterBuilder
     * @param FilterGroupBuilder
     * @param SearchCriteriaBuilder
     * @param ProductRepository
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        CollectionFactory $productCollectionFactory,
        ProductsList $productsList,
        FilterBuilder $filterBuilder,
        FilterGroupBuilder $filterGroupBuilder,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        ProductRepository $productRepository,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->_productsList = $productsList;
        $this->_filterBuilder = $filterBuilder;
        $this->_filterGroupBuilder = $filterGroupBuilder;
        $this->_searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->_productRepository = $productRepository;
        parent::__construct($context, $data);
    }

    /**
     * @return product
     */
    public function getCurrentProduct() {
        return $this->_coreRegistry->registry('current_product');
    }

    /**
     * @var collection
     */
    public function getProductCollection($ProductSkuArray) {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addAttributeToFilter('sku', array('in' => $ProductSkuArray));
        return $collection;
    }

    /**
     * @return object
     */
    public function getFilterBuilder() {
        return $this->_filterBuilder;
    }

    /**
     * @return object
     */
    public function getProductList() {
        return $this->_productsList;
    }

    /**
     * @return object
     */
    public function getFilterGroupBuilder() {
        return $this->_filterGroupBuilder;
    }

    /**
     * @return object
     */
    public function getSearchCriteriaBulder() {
        return $this->_searchCriteriaBuilder;
    }

    /**
     * @return object
     */
    public function getProductRepository() {
        return $this->_productRepository;
    }
}
