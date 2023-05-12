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

    // Relations

    public function reservation() {
        return $this->hasOne(Reservation::class);
    }

    public function paymentMethod() {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function costAdjustments() {
        return $this->hasMany(CostAdjustment::class);
    }

    // Methods

    public static function getInvoiceById($id) {
        return Invoice::where('id', $id)->first();
    }

    public static function getInvoiceByReservationId($reservationId) {
        return Invoice::where('reservation_id', $reservationId)->first();
    }
}