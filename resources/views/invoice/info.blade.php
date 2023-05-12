<x-layout.base>
    <main id="invoice-info" class="main-content">

        <article class="info-section">
            <h2>Invoice info</h2>

            <div class="info-item">
                <p class="label">Tax percentage:</p>
                <p>{{ $invoice->value_added_tax }}</p>
            </div>

            <div class="info-item">
                <p class="label">Payment method:</p>
                <p>{{ $invoice->paymentMethod->method }}</p>
            </div>

            <div class="info-item">
                <p class="label">Total amount:</p>
                <p>{{ $invoice->final_amount }}</p>
            </div>

        </article>

        <div>
            buttons
        </div>

    </main>
</x-layout.base>
