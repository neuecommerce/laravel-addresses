<?php

declare(strict_types = 1);

namespace NeueCommerce\LaravelAddresses\Contracts;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

interface AddressInterface
{
    public function entity(): MorphTo;

    public function parent(): BelongsTo | null;
}
