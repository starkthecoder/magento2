<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Catalog\Test\Block\Product\ProductList;

use Magento\Catalog\Test\Block\Product\Price;
use Magento\Mtf\Block\Block;
use Magento\Mtf\Client\Locator;

/**
 * Product item block on frontend category view.
 */
class ProductItem extends Block
{
    /**
     * Link to product view page.
     *
     * @var string
     */
    protected $link = 'a.product-item-link';

    /**
     * Locator for price box.
     *
     * @var string
     */
    protected $priceBox = '.price-box';

    /**
     * 'Add to Card' button.
     *
     * @var string
     */
    protected $addToCard = "button.action.tocart";

    /**
     * Check whether block is visible.
     *
     * @return bool
     */
    public function isVisible()
    {
        return $this->_rootElement->isVisible();
    }

    /**
     * Open product view page by link.
     *
     * @return void
     */
    public function open()
    {
        $this->_rootElement->find($this->link, Locator::SELECTOR_CSS)->click();
    }

    /**
     * Return product name.
     *
     * @return string
     */
    public function getProductName()
    {
        return trim($this->_rootElement->find($this->link)->getText());
    }

    /**
     * Return price block.
     *
     * @return Price
     */
    public function getPriceBlock()
    {
        return $this->blockFactory->create(
            'Magento\Catalog\Test\Block\Product\Price',
            ['element' => $this->_rootElement->find($this->priceBox)]
        );
    }

    /**
     * Checking that "Add to Card" button is visible
     *
     * @return bool
     */
    public function isVisibleAddToCardButton()
    {
        return $this->_rootElement->find($this->addToCard, Locator::SELECTOR_CSS)->isVisible();
    }

    /**
     * Click by "Add to Cart" button.
     *
     * @return void
     */
    public function clickAddToCart()
    {
        $this->_rootElement->find($this->addToCard, Locator::SELECTOR_CSS)->click();
    }
}
