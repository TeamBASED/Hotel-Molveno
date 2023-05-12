<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model {
    use HasFactory;

    protected $fillable = [
        'payment_method_id',
        'value_added_tax',
        'final_amount',
        'description',
    ];

    public function reservation() {
        return $this->hasOne(Reservation::class);
    }

    public function paymentMethod() {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function costAdjustments() {
        return $this->hasMany(CostAdjustment::class);
    }

    public function getInvoiceById($id) {
        return Invoice::where('id', $id)->first();
    }
}