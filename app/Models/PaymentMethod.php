<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model {
    use HasFactory;

    protected $fillable = [
        'method',
    ];

    // Relations

    public function Invoices() {
        return $this->hasMany(Invoice::class);
    }

    // Public methods

    public static function getPaymentMethod(int $methodId) {
        return PaymentMethod::find($methodId);
    }

    public static function getAllPaymentMethods() {
        return PaymentMethod::get();
    }
}