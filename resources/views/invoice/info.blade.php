<x-layout.base>
    <main id="invoice-info" class="main-content">

        <article class="info-section">
            <h2>Invoice info</h2>

            <div class="info-item">
                <p class="label">Contact name:</p>
                <p>{{ $invoice->reservation->contact->first_name }} {{ $invoice->reservation->contact->last_name }}</p>
            </div>

            <div class="info-item">
                <p class="label">Payment method:</p>
                <p>{{ $invoice->paymentMethod->method }}</p>
            </div>

            <div class="info-item">
                <p class="label">Total amount:</p>
                <p>{{ $invoice->final_amount }}</p>
            </div>

            <div class="info-item">
                <p class="label">Tax percentage:</p>
                <p>{{ $invoice->value_added_tax }}%</p>
            </div>

            <div class="info-item col">
                <p class="label">Adjustments:</p>
                <div class="cost-adjustments-list">
                    @if (count($invoice->costAdjustments) > 0)
                        @foreach ($invoice->costAdjustments as $costAdjustment)
                            <div class="cost-adjustments-item">
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

            <div class="info-item col">
                <p class="label">Description:</p>
                <p>{{ $invoice->description }}</p>
            </div>

        </article>

        <div>
            <x-buttons.secondary-button :href="route('reservation.info', ['id' => $invoice->reservation_id])">Back</x-buttons.secondary-button>
        </div>

    </main>
</x-layout.base>
