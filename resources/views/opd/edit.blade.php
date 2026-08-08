<x-app-layout>

    <x-slot name="header">

    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Edit Consultation
    </h2>
</x-slot>

<div class="py-6">

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- PATIENT -->
        <div class="bg-white rounded-xl shadow-sm border p-6 mb-6">

            <p class="text-xs font-semibold uppercase
                      tracking-wider text-gray-400">
                Patient
            </p>

            <h1 class="text-3xl font-bold text-gray-900 mt-1">
                {{ $patient->first_name }}
                {{ $patient->other_name }}
                {{ $patient->surname }}
            </h1>

            <p class="text-gray-500 mt-1">
                Card Number:
                <span class="font-semibold text-blue-700">
                    {{ $patient->card_number }}
                </span>
            </p>

        </div>


        <!-- EDIT FORM -->
        <div class="bg-white rounded-xl shadow-sm border overflow-hidden">

            <div class="p-6 border-b">

                <div class="flex flex-col sm:flex-row
                            sm:items-center sm:justify-between gap-3">

                    <div>

                        <p class="text-xs font-semibold uppercase
                                  tracking-wider text-gray-400">
                            Consultation
                        </p>

                        <h2 class="text-xl font-bold text-gray-900 mt-1">
                            {{ $visit->visit_date->format('d M Y') }}
                        </h2>

                    </div>

                    <span class="text-sm text-gray-500">
                        Editing existing record
                    </span>

                </div>

            </div>


            <form
                method="POST"
                action="{{ route('opd.update', [$patient, $visit]) }}"
                class="p-6"
            >

                @csrf
                @method('PUT')


                <!-- COMPLAINT -->
                <div class="mb-6">

                    <label class="block text-sm font-semibold
                                  text-gray-700 mb-2">
                        Presenting Complaint
                    </label>

                    <textarea
                        name="complaint"
                        rows="4"
                        class="w-full border-gray-300 rounded-lg
                               focus:border-blue-500
                               focus:ring-blue-500"
                        required
                    >{{ old('complaint', $visit->complaint) }}</textarea>

                    @error('complaint')
                        <p class="text-sm text-red-600 mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- EXAMINATION -->
                <div class="mb-6">

                    <label class="block text-sm font-semibold
                                  text-gray-700 mb-2">
                        Examination
                    </label>

                    <textarea
                        name="examination"
                        rows="4"
                        class="w-full border-gray-300 rounded-lg
                               focus:border-blue-500
                               focus:ring-blue-500"
                    >{{ old('examination', $visit->examination) }}</textarea>

                    @error('examination')
                        <p class="text-sm text-red-600 mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- DIAGNOSIS -->
                <div class="mb-6">

                    <label class="block text-sm font-semibold
                                  text-gray-700 mb-2">
                        Diagnosis
                    </label>

                    <textarea
                        name="diagnosis"
                        rows="4"
                        class="w-full border-gray-300 rounded-lg
                               focus:border-blue-500
                               focus:ring-blue-500"
                        required
                    >{{ old('diagnosis', $visit->diagnosis) }}</textarea>

                    @error('diagnosis')
                        <p class="text-sm text-red-600 mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- TREATMENT -->
                <div class="mb-6">

                    <label class="block text-sm font-semibold
                                  text-gray-700 mb-2">
                        Treatment
                    </label>

                    <textarea
                        name="treatment"
                        rows="4"
                        class="w-full border-gray-300 rounded-lg
                               focus:border-blue-500
                               focus:ring-blue-500"
                        required
                    >{{ old('treatment', $visit->treatment) }}</textarea>

                    @error('treatment')
                        <p class="text-sm text-red-600 mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- OUTCOME -->
                <div class="mb-8">

                    <label class="block text-sm font-semibold
                                  text-gray-700 mb-2">
                        Outcome
                    </label>

                    <select
                        name="outcome"
                        class="w-full border-gray-300 rounded-lg
                               focus:border-blue-500
                               focus:ring-blue-500"
                        required
                    >

                        <option value="">
                            Select Outcome
                        </option>

                        <option
                            value="Treated"
                            @selected(old('outcome', $visit->outcome) === 'Treated')
                        >
                            Treated
                        </option>

                        <option
                            value="Referred"
                            @selected(old('outcome', $visit->outcome) === 'Referred')
                        >
                            Referred
                        </option>

                        <option
                            value="Admitted"
                            @selected(old('outcome', $visit->outcome) === 'Admitted')
                        >
                            Admitted
                        </option>

                        <option
                            value="Follow-up"
                            @selected(old('outcome', $visit->outcome) === 'Follow-up')
                        >
                            Follow-up
                        </option>

                    </select>

                    @error('outcome')
                        <p class="text-sm text-red-600 mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- ACTIONS -->
                <div class="flex flex-col sm:flex-row gap-3">

                    <button
                        type="submit"
                        class="px-6 py-3 rounded-lg
                               bg-blue-600 hover:bg-blue-700
                               text-white font-semibold"
                    >
                        Save Changes
                    </button>

                    <a
                        href="{{ route('opd.show', [$patient, $visit]) }}"
                        class="px-6 py-3 rounded-lg
                               bg-gray-100 hover:bg-gray-200
                               text-gray-800 font-semibold
                               text-center"
                    >
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

</x-app-layout>