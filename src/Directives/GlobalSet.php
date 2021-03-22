<?php

namespace Edalzell\Blade\Directives;

use Edalzell\Blade\Concerns\IsDirective;
use Statamic\Facades\GlobalSet as GlobalSetAPI;

class GlobalSet
{
    use IsDirective;

    protected string $directive = 'globalset';
    protected string $key = 'globalset';
    protected string $type = 'both';
    protected string $method = 'handle';

    public function handleKey(string $handle, string $key = null)
    {
        return $this->globalSet($handle)->get($key);
    }

    public function handle(string $handle)
    {
        return $this->getAugmentedValue($this->globalSet($handle));
    }

    private function globalSet(string $handle)
    {
        return GlobalSetAPI::findByHandle($handle)->inCurrentSite();
    }
}
