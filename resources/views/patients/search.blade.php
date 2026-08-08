<x-app-layout>

    <x-slot name="header">
        <h2>
            Search Patient
        </h2>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('patients.find') }}" method="GET">
        <label>Card Number</label><br>
        <input
            type="text"
            name="card_number"
            placeholder="PHC/2026/000001"
        >

        <br><br>

        <button type="submit">
            Search Patient
        </button>
    </form>

    </div>

</x-app-layout>

   