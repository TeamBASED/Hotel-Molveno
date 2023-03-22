<x-layout.base>
<main id="reservation-info" class="main-content">
    <h2>Reservation info</h2>
    <article class="flex-space-around">
        <div class="info-wrapper">
            <section class="info-section">
                <div class="grid-two-columns margin-block">
                    <h4>First name&colon;</h4>
                    <p class="right-aligned"></p>
                    <h4>Last name&colon;</h4>
                    <p class="right-aligned"></p>
                    <h4>E-mail&colon;</h4>
                    <p class="right-aligned"></p>
                    <h4>Telephone&colon;</h4>
                    <p class="right-aligned"></p>
                    <h4>adress&colon;</h4>
                    <p class="right-aligned"></p>
                    <h4>Date arrival&colon;</h4>
                    <p class="right-aligned"></p>
                    <h4>Date departure&colon;</h4>
                    <p class="right-aligned"></p>
                </div>
                <x-buttons.primary-button>Edit</x-buttons.primary-button>
            </section>
            <x-buttons.primary-button>Back</x-buttons.primary-button>
        </div>
        <section class="reservation-schedule">
            <h3 class="white-text">being reserved by</h3>
            <div class="reservations grid-two-columns">
                <p class="white-background">Placeholder</p>
                <x-buttons.edit-button>Edit</x-buttons.edit-button>
            
                <p class="white-background">Placeholder</p>
                <x-buttons.edit-button>Edit</x-buttons.edit-button>
            
                <p class="white-background">Placeholder</p>
                <x-buttons.edit-button>Edit</x-buttons.edit-button>

                <p class="white-background">Placeholder</p>
                <x-buttons.edit-button>Edit</x-buttons.edit-button>

                <p class="white-background">Placeholder</p>
                <x-buttons.edit-button>Edit</x-buttons.edit-button>

                <p class="white-background">Placeholder</p>
                <x-buttons.edit-button>Edit</x-buttons.edit-button>
            </div>
        </section>
    </article>
</main>
</x-layout.base>