<x-app-layout>

    <x-slot name="header">
        <h2>
            Patient Registration
        </h2>
    </x-slot>

    <div class="p-6">

   <form action="{{ route('patients.store') }}" method="POST">
        @csrf

        <div>
            <label>Card Number</label><br>
            <input type="text" name="card_number">
        </div>

        <br>

        <div>
            <label>Surname</label><br>
            <input type="text" name="surname">
        </div>

        <br>

        <div>
            <label>First Name</label><br>
            <input type="text" name="first_name">
        </div>

        <br>

        <div>
            <label>Other Name</label><br>
            <input type="text" name="other_name">
        </div>

        <br>

        <div>
            <label>Gender</label><br>
            <select name="gender">
                <option value="">-- Select Gender --</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>

        <br>

        <div>
            <label>Date of Birth</label><br>
            <input type="date" name="date_of_birth">
        </div>

        <br>

        <div>
            <label>Age</label><br>
            <input type="number" name="age" min="0">
        </div>

        <br>

        <div>
            <label>Phone Number</label><br>
            <input type="text" name="phone">
        </div>

        <br>

        <div>
            <label>Address</label><br>
            <textarea name="address" rows="3" cols="40"></textarea>
        </div>

        <br>

        <div>
            <label>Occupation</label><br>
            <input type="text" name="occupation">
        </div>

        <br>

        <div>
            <label>Next of Kin</label><br>
            <input type="text" name="next_of_kin">
        </div>

        <br>

        <div>
            <label>Next of Kin Phone</label><br>
            <input type="text" name="next_of_kin_phone">
        </div>

        <br>

        <button type="submit">
            Save Patient
        </button>

    </form>

    </div>

</x-app-layout>