<?php

declare(strict_types = 1);

namespace NeueCommerce\LaravelAddresses\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface AddressableInterface
{
    public function addresses(): MorphMany;
}
