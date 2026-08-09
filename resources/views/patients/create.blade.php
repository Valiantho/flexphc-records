<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Patient Registration
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- SUCCESS --}}
            @if(session('success'))
                <div class="mb-6 bg-green-50 border border-green-200
                            text-green-800 rounded-xl px-5 py-4">
                    <div class="flex items-center gap-3">
                        <span class="text-green-600 text-lg">✓</span>
                        <span class="font-medium">
                            {{ session('success') }}
                        </span>
                    </div>
                </div>
            @endif

            {{-- ERRORS --}}
            @if($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200
                            text-red-800 rounded-xl px-5 py-4">

                    <p class="font-semibold mb-2">
                        Please correct the following:
                    </p>

                    <ul class="list-disc list-inside text-sm space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>
            @endif

            {{-- REGISTRATION CARD --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

                {{-- HEADER --}}
                <div class="px-6 py-5 border-b border-gray-200 bg-gray-50">

                    <h1 class="text-2xl font-bold text-gray-900">
                        Register Patient
                    </h1>

                    <p class="text-sm text-gray-500 mt-1">
                        Create a new patient record.
                    </p>

                </div>

                {{-- FORM --}}
                <form
                    method="POST"
                    action="{{ route('patients.store') }}"
                    class="p-6"
                >

                    @csrf

                    {{-- PATIENT INFORMATION --}}
                    <div>

                        <h2 class="text-lg font-bold text-gray-900 mb-5">
                            Patient Information
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                            {{-- CARD NUMBER --}}
                            <div class="md:col-span-2">

                                <label
                                    for="card_number"
                                    class="block text-sm font-semibold text-gray-700 mb-2"
                                >
                                    Card Number
                                </label>

                                <input
                                    id="card_number"
                                    type="text"
                                    name="card_number"
                                    value="{{ old('card_number') }}"
                                    placeholder="PHC/2026/000003"
                                    required
                                    class="block w-full rounded-lg border border-gray-300
                                           px-3 py-2.5 shadow-sm
                                           focus:border-blue-500 focus:ring-blue-500"
                                >

                            </div>

                            {{-- SURNAME --}}
                            <div>

                                <label
                                    for="surname"
                                    class="block text-sm font-semibold text-gray-700 mb-2"
                                >
                                    Surname
                                </label>

                                <input
                                    id="surname"
                                    type="text"
                                    name="surname"
                                    value="{{ old('surname') }}"
                                    required
                                    class="block w-full rounded-lg border border-gray-300
                                           px-3 py-2.5 shadow-sm
                                           focus:border-blue-500 focus:ring-blue-500"
                                >

                            </div>

                            {{-- FIRST NAME --}}
                            <div>

                                <label
                                    for="first_name"
                                    class="block text-sm font-semibold text-gray-700 mb-2"
                                >
                                    First Name
                                </label>

                                <input
                                    id="first_name"
                                    type="text"
                                    name="first_name"
                                    value="{{ old('first_name') }}"
                                    required
                                    class="block w-full rounded-lg border border-gray-300
                                           px-3 py-2.5 shadow-sm
                                           focus:border-blue-500 focus:ring-blue-500"
                                >

                            </div>

                            {{-- OTHER NAME --}}
                            <div>

                                <label
                                    for="other_name"
                                    class="block text-sm font-semibold text-gray-700 mb-2"
                                >
                                    Other Name
                                </label>

                                <input
                                    id="other_name"
                                    type="text"
                                    name="other_name"
                                    value="{{ old('other_name') }}"
                                    class="block w-full rounded-lg border border-gray-300
                                           px-3 py-2.5 shadow-sm
                                           focus:border-blue-500 focus:ring-blue-500"
                                >

                            </div>

                            {{-- GENDER --}}
                            <div>

                                <label
                                    for="gender"
                                    class="block text-sm font-semibold text-gray-700 mb-2"
                                >
                                    Gender
                                </label>

                                <select
                                    id="gender"
                                    name="gender"
                                    required
                                    class="block w-full rounded-lg border border-gray-300
                                           px-3 py-2.5 shadow-sm
                                           focus:border-blue-500 focus:ring-blue-500"
                                >
                                    <option value="">
                                        Select gender
                                    </option>

                                    <option
                                        value="Male"
                                        @selected(old('gender') === 'Male')
                                    >
                                        Male
                                    </option>

                                    <option
                                        value="Female"
                                        @selected(old('gender') === 'Female')
                                    >
                                        Female
                                    </option>
                                </select>

                            </div>

                            {{-- DATE OF BIRTH --}}
                            <div>

                                <label
                                    for="date_of_birth"
                                    class="block text-sm font-semibold text-gray-700 mb-2"
                                >
                                    Date of Birth
                                </label>

                                <input
                                    id="date_of_birth"
                                    type="date"
                                    name="date_of_birth"
                                    value="{{ old('date_of_birth') }}"
                                    class="block w-full rounded-lg border border-gray-300
                                           px-3 py-2.5 shadow-sm
                                           focus:border-blue-500 focus:ring-blue-500"
                                >

                            </div>

                            {{-- AGE --}}
                            <div>

                                <label
                                    for="age"
                                    class="block text-sm font-semibold text-gray-700 mb-2"
                                >
                                    Age
                                </label>

                                <input
                                    id="age"
                                    type="number"
                                    name="age"
                                    value="{{ old('age') }}"
                                    min="0"
                                    max="120"
                                    required
                                    class="block w-full rounded-lg border border-gray-300
                                           px-3 py-2.5 shadow-sm
                                           focus:border-blue-500 focus:ring-blue-500"
                                >

                            </div>

                        </div>

                    </div>

                    {{-- CONTACT --}}
                    <div class="border-t border-gray-200 mt-8 pt-8">

                        <h2 class="text-lg font-bold text-gray-900 mb-5">
                            Contact Information
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                            {{-- PHONE --}}
                            <div>

                                <label
                                    for="phone"
                                    class="block text-sm font-semibold text-gray-700 mb-2"
                                >
                                    Phone Number
                                </label>

                                <input
                                    id="phone"
                                    type="text"
                                    name="phone"
                                    value="{{ old('phone') }}"
                                    class="block w-full rounded-lg border border-gray-300
                                           px-3 py-2.5 shadow-sm
                                           focus:border-blue-500 focus:ring-blue-500"
                                >

                            </div>

                            {{-- OCCUPATION --}}
                            <div>

                                <label
                                    for="occupation"
                                    class="block text-sm font-semibold text-gray-700 mb-2"
                                >
                                    Occupation
                                </label>

                                <input
                                    id="occupation"
                                    type="text"
                                    name="occupation"
                                    value="{{ old('occupation') }}"
                                    class="block w-full rounded-lg border border-gray-300
                                           px-3 py-2.5 shadow-sm
                                           focus:border-blue-500 focus:ring-blue-500"
                                >

                            </div>

                            {{-- ADDRESS --}}
                            <div class="md:col-span-2">

                                <label
                                    for="address"
                                    class="block text-sm font-semibold text-gray-700 mb-2"
                                >
                                    Address
                                </label>

                                <textarea
                                    id="address"
                                    name="address"
                                    rows="3"
                                    class="block w-full rounded-lg border border-gray-300
                                           px-3 py-2.5 shadow-sm
                                           focus:border-blue-500 focus:ring-blue-500"
                                >{{ old('address') }}</textarea>

                            </div>

                        </div>

                    </div>

                    {{-- NEXT OF KIN --}}
                    <div class="border-t border-gray-200 mt-8 pt-8">

                        <h2 class="text-lg font-bold text-gray-900 mb-5">
                            Next of Kin
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                            {{-- NAME --}}
                            <div>

                                <label
                                    for="next_of_kin"
                                    class="block text-sm font-semibold text-gray-700 mb-2"
                                >
                                    Name
                                </label>

                                <input
                                    id="next_of_kin"
                                    type="text"
                                    name="next_of_kin"
                                    value="{{ old('next_of_kin') }}"
                                    class="block w-full rounded-lg border border-gray-300
                                           px-3 py-2.5 shadow-sm
                                           focus:border-blue-500 focus:ring-blue-500"
                                >

                            </div>

                            {{-- PHONE --}}
                            <div>

                                <label
                                    for="next_of_kin_phone"
                                    class="block text-sm font-semibold text-gray-700 mb-2"
                                >
                                    Phone Number
                                </label>

                                <input
                                    id="next_of_kin_phone"
                                    type="text"
                                    name="next_of_kin_phone"
                                    value="{{ old('next_of_kin_phone') }}"
                                    class="block w-full rounded-lg border border-gray-300
                                           px-3 py-2.5 shadow-sm
                                           focus:border-blue-500 focus:ring-blue-500"
                                >

                            </div>

                        </div>

                    </div>

                    {{-- SAVE --}}
                    <div class="border-t border-gray-200 mt-8 pt-6 flex justify-end">

                        <button
                            type="submit"
                            class="inline-flex items-center px-6 py-3
                                   bg-blue-600 hover:bg-blue-700
                                   text-white font-semibold rounded-lg
                                   shadow-sm transition"
                        >
                            Save Patient
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>