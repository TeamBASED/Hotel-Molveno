<?php

namespace App\Http\Controllers;

use App\Models\CostAdjustment;
use App\Models\Reservation;
use Illuminate\Http\Request;

class CostAdjustmentController extends Controller {
    public function handleCreateCostAdjustment(Reservation $reservation, Request $request) {
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required',
            'invoice_id' => 'required',
        ]);

        $this->createCostAdjustment($request);

        return redirect(route('invoice.edit', $reservation->id));
    }

    private function createCostAdjustment(Request $request) {
        CostAdjustment::create([
            'invoice_id' => $request->invoice_id,
            'amount' => $request->amount,
            'description' => $request->description,
        ]);
    }
}