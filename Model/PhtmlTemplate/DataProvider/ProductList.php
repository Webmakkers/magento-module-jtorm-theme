<?php
/*! (c) jTorm and other contributors | www.jtorm.com/license */

declare(strict_types=1);

namespace Webmakkers\JtormTheme\Model\PhtmlTemplate\DataProvider;

use Magento\Catalog\Model\ResourceModel\Config;
use Webmakkers\Jtorm\Model\DataProvider\AbstractDataProvider;

class ProductList extends AbstractDataProvider
{
    public function __construct(
        private readonly Config $catalogConfig,
        array $data = []
    ) {
        parent::__construct($data);
    }

    public function getTss(): string
    {
        $attributes = $this->catalogConfig->getAttributesUsedInListing();
        if (empty($attributes)) {
            return '';
        }

        $block = $this->getBlock();
        $product = $block->getProduct();

        $attributesHtml = '<table><tbody>';
        foreach ($attributes as $attribute) {
            $attributeValue = $product->getAttributeText($attribute['attribute_code']);
            if (empty($attributeValue)) {
                continue;
            }

            $attributesHtml .= '<tr><th>' . $attribute['store_label'] . '</th><td>' . $attributeValue . '</td></tr>';
        }
        $attributesHtml .= '</tbody></table>';

        $this->setData('attributesHtml', $attributesHtml);
        return <<<TSS
body->prepend {
    h: attributesHtml;
}
TSS;
    }
}
