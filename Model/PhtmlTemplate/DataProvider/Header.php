<?php
/*! (c) jTorm and other contributors | www.jtorm.com/license */

declare(strict_types=1);

namespace Webmakkers\JtormTheme\Model\PhtmlTemplate\DataProvider;

use Webmakkers\Jtorm\Model\AbstractDataProvider;

class Header extends AbstractDataProvider
{
    public function getTss(): string
    {
        return <<<TSS
.greet->data(html: jtorm_message)->append->ui {
    c: '@e.div';

    div->attr {
        n: 'class';
        v: 'jtorm-message';
    }
}
TSS;
    }

    public function toArray(array $keys = [])
    {
        $result = parent::toArray($keys);
        $result['jtorm_message'] = 'Processed by jTorm';
        return $result;
    }
}
