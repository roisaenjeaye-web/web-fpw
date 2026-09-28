<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = ['category_id', 'code', 'name', 'unit', 'price', 'stock'];

    protected $appends = ['price_rupiah', 'formatted_price'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function transactionDetails(): HasMany
    {
        return $this->hasMany(TransactionDetail::class);
    }

    /**
     * Accessor untuk harga dalam format Rupiah (contoh: Rp 50.000).
     */
    protected function priceRupiah(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes): string => 'Rp '.number_format((float) ($attributes['price'] ?? $this->price ?? 0), 0, ',', '.'),
        );
    }

    /**
     * Accessor formatted_price dalam format Rupiah.
     */
    protected function formattedPrice(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes): string => 'Rp '.number_format((float) ($attributes['price'] ?? $this->price ?? 0), 0, ',', '.'),
        );
    }

    /**
     * Accessor rupiah_price dalam format Rupiah.
     */
    protected function rupiahPrice(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes): string => 'Rp '.number_format((float) ($attributes['price'] ?? $this->price ?? 0), 0, ',', '.'),
        );
    }
}
