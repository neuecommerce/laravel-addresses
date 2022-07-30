<?php

declare(strict_types = 1);

namespace NeueCommerce\LaravelAddresses\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;

trait Addressable
{
    public function addresses(): MorphMany
    {
        $model = config('neue.laravel-addresses.model.class');

        return $this->morphMany($model, 'entity');
    }
}
