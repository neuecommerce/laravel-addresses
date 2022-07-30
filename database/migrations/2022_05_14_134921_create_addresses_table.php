<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    public function up(): void
    {
        Schema::create($this->tableName(), function (Blueprint $table) {
            $table->id();

            $table->foreignId('parent_id')->nullable()->constrained($this->tableName())->nullOnDelete();

            $table->boolean('is_default')->default(0)->index();
            $table->boolean('is_shipping')->default(0)->index();
            $table->boolean('is_billing')->default(0)->index();

            $table->morphs('entity');

            $table->string('display_name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company_name')->nullable();
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('country')->nullable();
            $table->string('city');
            $table->string('province');
            $table->string('zip');
            $table->string('country_code');
            $table->string('province_code');
            $table->string('phone')->nullable();
            $table->string('notes')->nullable();
            $table->json('meta')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists($this->tableName());
    }

    public function getConnection(): string | null
    {
        return config('neue.laravel-addresses.model.database_connection');
    }

    private function tableName(): string
    {
        return config('neue.laravel-addresses.model.table_name');
    }
}
