<?php

declare(strict_types = 1);

namespace NeueCommerce\LaravelAddresses\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use NeueCommerce\DefaultRecords\HasDefaultRecord;
use NeueCommerce\DefaultRecords\HasDefaultRecordInterface;
use NeueCommerce\LaravelAddresses\Contracts\AddressInterface;
use NeueCommerce\ModelCasts\BooleanCast;
use NeueCommerce\ModelCasts\CollectionCast;

class Address extends Model implements AddressInterface, HasDefaultRecordInterface
{
    use SoftDeletes;
    use HasDefaultRecord;

    protected $guarded = ['*'];

    protected $casts = [
        'is_default'  => BooleanCast::class,
        'is_shipping' => BooleanCast::class,
        'is_billing'  => BooleanCast::class,
        'meta'        => CollectionCast::class,
    ];

    public function __construct(array $attributes = [])
    {
        if (! isset($this->connection)) {
            $this->setConnection(config('neue.laravel-addresses.model.database_connection'));
        }

        if (! isset($this->table)) {
            $this->setTable(config('neue.laravel-addresses.model.table_name'));
        }

        parent::__construct($attributes);
    }

    public function entity(): MorphTo
    {
        return $this->morphTo();
    }

    public function parent(): BelongsTo | null
    {
        return $this->belongsTo(Address::class, 'parent_id');
    }
}
