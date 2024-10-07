<?php
/*! (c) jTorm and other contributors | www.jtorm.com/license */

declare(strict_types=1);

namespace Webmakkers\JtormTheme\Model\FullPageTemplate\AfterFpc\DataProvider;

use Webmakkers\Jtorm\Model\AbstractDataProvider;

class AddBodyClass extends AbstractDataProvider
{
    public function isFullPage()
    : bool
    {
        return true;
    }

    public function getTss(): string
    {
        return <<<TSS
body->attr {
    n: 'class';
    v: jtorm_class;
    m: 'a';
}
TSS;
    }

    public function toArray(array $keys = [])
    {
        $result = parent::toArray($keys);
        $result['jtorm_class'] = 'jtorm-full-page';
        return $result;
    }
}
