<x-layout.base>
    <main id="invoice-edit" class="main-content">

        @if (isset($_GET['notification']))
            <p class="notification">{{ $_GET['notification'] }}</p>
        @endif

        <div class="padding-inline-5rem">
            <h2>Edit invoice</h2>

            <div class="flex-space-between">
                <form action="{{ route('invoice.update', $invoice->id) }}" method="POST" class="form-1 grid-two-columns"
                    id="edit-form">
                    @csrf
                    @method('PATCH')

                    <div class="left flex-column">

                        <label class="input-label" for="paid">Invoice paid:</label>
                        <input id="paid" type="checkbox" name="paid" value="1"
                            {{ old('paid', $invoice->is_paid == 1 ? 'checked' : '') }}>

                        <label class="input-label" for="payment-method">Payment method:</label>
                        <select id="payment-method" class="dropdown-select" name="payment_method" required>
                            @foreach ($paymentMethods as $paymentMethod)
                                <option class="filter-field-option" value="{{ $paymentMethod->id }}"
                                    @if ($paymentMethod->id == old('payment_method', $invoice->payment_method_id)) selected="selected" @endif>
                                    {{ $paymentMethod->method }}
                                </option>
                            @endforeach
                        </select>

                        <label class="input-label" for="value-added-tax">Value added tax:</label>
                        <input id="value-added-tax" type="number" class="input-text" required
                            value="{{ old('value_added_tax', $invoice->value_added_tax) }}" name="value_added_tax">

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

                        <div class="info-item">
                            <p class="label">Total amount:</p>
                            <p>{{ $invoice->final_amount }}</p>
                        </div>
                    </div>

                </form>
            </div>

            <div class="bottom-buttons flex-space-between">
                <x-buttons.secondary-button :href="route('invoice.info', $invoice->id)">Cancel</x-buttons.secondary-button>
                <x-buttons.primary-button form="edit-form">Save</x-buttons.primary-button>
            </div>


        </div>

    </main>
</x-layout.base>
