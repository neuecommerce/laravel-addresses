<?php
declare(strict_types = 1);

return [

    'model' => [
        /**
         * This is the model that will be used to manage the Addresses.
         *
         * It is required that it:
         * - Implements the "NeueCommerce\LaravelAddresses\Contracts\AddressInterface" interface
         * - Extends the "Illuminate\Database\Eloquent\Model" class
         */
        'class' => \NeueCommerce\LaravelAddresses\Models\Address::class,

        /**
         * This is the name of the table that will be created when running the migration
         * and also used by the default Address model that is shipped with the package.
         */
        'table_name' => env('ADDRESS_TABLE_NAME', 'addresses'),

        /**
         * This is the database connection that will be used when running the migration
         * and also used by the default Address model that is shipped with the package.
         *
         * In the case that this value is not defined, the config
         * value from "database.default" will be used instead.
         */
        'database_connection' => env('ADDRESSES_DB_CONNECTION'),
    ],

];
