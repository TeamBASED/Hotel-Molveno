<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model {
    use HasFactory;

    protected $fillable = [
        'payment_method',
        'value_added_tax',
        'cost_adjustment',
        'final_amount'
    ];

    public function getInvoiceById($id) {
        return Invoice::where('id', $id)->first();
    }

    public function reservation() {
        return $this->belongsTo(Reservation::class);
    }
}