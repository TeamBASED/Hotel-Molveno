<x-layout.base>
    <main id="invoice-info" class="main-content">

        <article class="info-section">
            <h2>Invoice info</h2>

            <div class="info-item">
                <p class="label">Contact name:</p>
                <p>{{ $invoice->reservation->contact->first_name }} {{ $invoice->reservation->contact->last_name }}</p>
            </div>

            <div class="info-item">
                <p class="label">Total amount:</p>
                <p>{{ $invoice->final_amount }}</p>
            </div>

            <div class="info-item">
                <p class="label">Tax percentage:</p>
                <p>{{ $invoice->value_added_tax }}%</p>
            </div>

            <div class="info-item">
                <p class="label">Status:</p>
                <p>{{ $invoice->is_paid ? 'paid' : 'not yet paid' }}</p>
            </div>

            <div class="info-item">
                <p class="label">Payment method:</p>
                <p>{{ $invoice->paymentMethod->method }}</p>
            </div>

            <div class="info-item col">
                <p class="label">Comments:</p>
                <p>{{ $invoice->description }}</p>
            </div>

            <p class="label">Room costs:</p>
            <div class="costs-list">
                @foreach ($roomPrices as $room)
                    <div class="costs-item">
                        <div class="info-item">
                            <p class="label">Number:</p>
                            <p>{{ $room['room_number'] }}</p>
                        </div>
                        <div class="info-item">
                            <p class="label">Calculation:</p>
                            <p>{{ $room['price_per_night'] }} per night x {{ $daysReserved }} days</p>
                        </div>
                        <div class="info-item">
                            <p class="label">Total:</p>
                            <p>{{ $room['price'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="info-item col">
                <p class="label">Adjustments:</p>
                <div class="costs-list">
                    @if (count($invoice->costAdjustments) > 0)
                        @foreach ($invoice->costAdjustments as $costAdjustment)
                            <div class="costs-item">
                                <div class="info-item">
                                    <p class="label">Amount:</p>
                                    <p>{{ $costAdjustment->amount }}</p>
                                </div>
                                <div class="info-item">
                                    <p class="label">Description:</p>
                                    <p>{{ $costAdjustment->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No adjustments</p>
                    @endif
                </div>
            </div>

            <div>
                <x-buttons.secondary-button :href="route('invoice.edit', ['reservation' => $invoice->reservation_id])">Edit</x-buttons.secondary-button>
            </div>

        </article>

        <div>
            <x-buttons.primary-button :href="route('reservation.info', ['id' => $invoice->reservation_id])">Back</x-buttons.primary-button>
        </div>

    </main>
</x-layout.base>
