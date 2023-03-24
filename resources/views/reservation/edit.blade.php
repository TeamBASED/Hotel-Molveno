<x-layout.base>
    <main id="reservation-edit">
    <form action="" method="" class="">
        @csrf
        <div class="left">
            <h2>Edit Reservation</h2>
            <input type="text" class="input-text" required placeholder="First name" name="firstname">
            <input type="text" class="input-text" required placeholder="Last name" name="lastname">
            <input type="text" class="input-text" required placeholder="E-mail" name="email">
            <input type="text" class="input-text" required placeholder="Telephone" name="telephone">
            <input type="text" class="input-text" required placeholder="Adress" name="adress">
            <h3>Date of Arrival</h3>
            <input type="date" class="input-text" name="arrival">
            <h3>Date of Departure</h3>
            <input type="date" class="input-text" name="departure">
        </div>
        <div class="right">
        </div>
        </form>
    </main>
</x-layout.base>