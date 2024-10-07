<?php
/*! (c) jTorm and other contributors | www.jtorm.com/license */

declare(strict_types=1);

namespace Webmakkers\JtormTheme\Model\HtmlTemplate\DataProvider\Magento\Checkout\Minicart;

use Webmakkers\Jtorm\Model\AbstractDataProvider;

class Content extends AbstractDataProvider
{
    public function getTss(): string
    {
        return <<<TSS
.block-title->data(html: jtorm_message)->append->ui {
    c: '@e.div';

    div->attr {
        n: 'class';
        v: 'jtorm-message';
    }
}

.secondary->append {
    h: '<a class="action viewcart" href="https://jtorm.com">jTorm</a>';
}
TSS;
    }

    public function toArray(array $keys = [])
    {
        $result = parent::toArray($keys);
        $result['jtorm_message'] = 'Processed HTML by jTorm';
        return $result;
    }
}
