<x-layout.base>
    <main id="invoice-edit" class="main-content">

        @if (isset($_GET['notification']))
            <p class="notification">{{ $_GET['notification'] }}</p>
        @endif

        <div class="padding-inline-5rem">
            <h2>Edit invoice</h2>

            <div class="flex-space-between">
                <form action="{{ route('invoice.update', $invoice->reservation_id) }}" method="POST" class="form-1"
                    id="edit-form">
                    @csrf
                    @method('PATCH')

                    <div class="grid-two-columns edit-list">

                        <p class="input-label">Total amount:</p>
                        <p>{{ $invoice->final_amount }}</p>

                        <label class="input-label" for="value-added-tax">Value added tax:</label>
                        <input id="value-added-tax" type="number" class="input-text" required
                            value="{{ old('value_added_tax', $invoice->value_added_tax) }}" name="value_added_tax">

                        <label class="input-label" for="is-paid">Invoice paid:</label>
                        <input id="is-paid" type="checkbox" name="is_paid" value="1"
                            {{ old('is-paid', $invoice->is_paid == 1 ? 'checked' : '') }}>

                        <label class="input-label" for="payment-method">Payment method:</label>
                        <select id="payment-method" class="dropdown-select" name="payment_method" required>
                            @foreach ($paymentMethods as $paymentMethod)
                                <option class="filter-field-option" value="{{ $paymentMethod->id }}"
                                    @if ($paymentMethod->id == old('payment_method', $invoice->payment_method_id)) selected="selected" @endif>
                                    {{ $paymentMethod->method }}
                                </option>
                            @endforeach
                        </select>

                        <label class="input-label" for="description">Description:</label>
                        <textarea class="input-text flex-grow-1" id="description" placeholder="Write extra information here" name="description">{{ old('description', $invoice->description) }}</textarea>

                        <p class="input-label">Room costs:</p>
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

                        <p class="input-label">Adjustments:</p>
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


                            <p>Add cost adjustment</p>

                            <label class="input-label" for="adjustment-amount">Amount:</label>
                            <input id="adjustment-amount" type="number" class="input-text" required name="amount"
                                form="cost-adjustment-form">

                            <label class="input-label" for="adjustment-description">Description:</label>
                            <textarea class="input-text flex-grow-1" id="adjustment-description" placeholder="Write extra information here"
                                name="description" form="cost-adjustment-form"></textarea>

                            <x-buttons.secondary-button form="cost-adjustment-form">Add adjustment
                            </x-buttons.secondary-button>

                        </div>

                        <x-buttons.secondary-button :formaction="route('invoice.recalculate', $invoice->reservation_id)">Recalculate total amount
                        </x-buttons.secondary-button>

                    </div>

                </form>

                <form action="{{ route('costAdjustment.create', $invoice->reservation_id) }}" method="POST"
                    id="cost-adjustment-form">
                    @csrf
                    <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
                </form>
            </div>

            <div class="bottom-buttons flex-space-between">
                <x-buttons.secondary-button :href="route('invoice.info', $invoice->id)">Cancel</x-buttons.secondary-button>
                <x-buttons.primary-button form="edit-form">Save</x-buttons.primary-button>
            </div>

        </div>

    </main>
</x-layout.base>
