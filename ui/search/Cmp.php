<?php

//declare(strict_types=1);

namespace cryodrift\shared\ui\search;

use cryodrift\fw\Context;
use cryodrift\fw\HtmlUi;

class Cmp extends HtmlUi
{
    protected string $templatefile_html=__DIR__ . '/_.html';
    protected string $templatefile_dropdown=__DIR__ . '/dropdown.html';

    public function __construct(Context $ctx, string $name, string $target, array $query_vars = [], array $dropdown = [])
    {
        parent::__construct();
        $this->lazyFile($this->templatefile_html);
        $search = $ctx->request()->vars($name, '');
        $data = [
          'dropdown' => '',
          'target' => $target,
          'value' => $search,
          'name' => $name,
          'clickhandler' => '',
        ];
        $map = [];
        if ($dropdown) {
            $data['dropdown'] = HtmlUi::fromFile($this->templatefile_dropdown);
            $map = ['value' => $name];
            $options = array_map(fn($a) => ['value' => $a], $dropdown);
            $options = self::addQuery($ctx, $options, $map, $query_vars);
            $data['dropdown']->setAttributes([
              'target' => $target,
              'value' => $search,
              'name' => $name,
              'options' => $options
            ]);
            $data['clickhandler'] = 'togglenext';
        }

        $data = self::addQuery($ctx, $data, $map, $query_vars);

        $this->setAttributes($data);

    }
}
