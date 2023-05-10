<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model {
    use HasFactory;

    protected $fillable = [
        'method',
    ];

    public function Invoices() {
        return $this->hasMany(Invoice::class);
    }

    public function getPaymentMethod(int $methodId) {
        return PaymentMethod::find($methodId);
    }
}