<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['user_id', 'supplier_name', 'invoice_number', 'total_amount', 'purchase_date'])]
class Purchase extends Model
{
    use HasFactory;

    // Relasi ke User (Pegawai/Admin yang melakukan pembelian)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Detail Pembelian (One-to-Many)
    public function details(): HasMany
    {
        return $this->hasMany(PurchaseDetail::class);
    }
}
