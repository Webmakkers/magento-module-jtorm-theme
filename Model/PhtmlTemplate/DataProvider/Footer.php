<?php
/*! (c) jTorm and other contributors | www.jtorm.com/license */

declare(strict_types=1);

namespace Webmakkers\JtormTheme\Model\PhtmlTemplate\DataProvider;

use Webmakkers\Jtorm\Model\DataProvider\AbstractDataProvider;

class Footer extends AbstractDataProvider
{
    public function getTss(): string
    {
        $year = \date('Y');
        return <<<TSS
.footer.links->append {
    h: '<li><a href="https://jtorm.com" target="_blank">jTorm {$year}</a></li>';
}
TSS;
    }
}
