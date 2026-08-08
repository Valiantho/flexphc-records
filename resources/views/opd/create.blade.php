<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            OPD Consultation
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


            <!-- PATIENT HEADER -->
            <div class="bg-white rounded-xl shadow-sm border p-6 mb-6">

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                    <div>

                        <h1 class="text-3xl font-bold text-gray-900">
                            {{ $patient->first_name }}
                            {{ $patient->other_name }}
                            {{ $patient->surname }}
                        </h1>

                        <p class="text-gray-500 mt-2">
                            {{ $patient->gender }}
                            ·
                            {{ $patient->age }} years
                        </p>

                    </div>


                    <div class="sm:text-right">

                        <p class="text-xs text-gray-500 uppercase tracking-wide">
                            Card Number
                        </p>

                        <p class="text-lg font-bold text-blue-700 mt-1">
                            {{ $patient->card_number }}
                        </p>

                        <span class="inline-flex items-center mt-2 px-3 py-1 rounded-full
                                     bg-green-100 text-green-700 text-xs font-semibold">

                            Active

                        </span>

                    </div>

                </div>

            </div>



            <!-- MAIN WORKSPACE -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">


                <!-- CONSULTATION FORM -->
                <div class="lg:col-span-2">

                    <div class="bg-white rounded-xl shadow-sm border p-6">


                        <form method="POST"
                              action="{{ route('opd.store', $patient) }}">

                            @csrf


                            <!-- COMPLAINT -->
                            <div class="mb-6">

                                <label class="block font-semibold text-gray-800 mb-2">
                                    Presenting Complaint
                                </label>

                                <textarea
                                    name="complaint"
                                    rows="4"
                                    class="w-full border-gray-300 rounded-lg p-3
                                           focus:border-blue-500 focus:ring-blue-500"
                                    required></textarea>

                            </div>


                            <!-- EXAMINATION -->
                            <div class="mb-6">

                                <label class="block font-semibold text-gray-800 mb-2">
                                    Examination
                                </label>

                                <textarea
                                    name="examination"
                                    rows="4"
                                    class="w-full border-gray-300 rounded-lg p-3
                                           focus:border-blue-500 focus:ring-blue-500"></textarea>

                            </div>


                            <!-- DIAGNOSIS -->
                            <div class="mb-6">

                                <label class="block font-semibold text-gray-800 mb-2">
                                    Diagnosis
                                </label>

                                <textarea
                                    name="diagnosis"
                                    rows="4"
                                    class="w-full border-gray-300 rounded-lg p-3
                                           focus:border-blue-500 focus:ring-blue-500"
                                    required></textarea>

                            </div>


                            <!-- TREATMENT -->
                            <div class="mb-6">

                                <label class="block font-semibold text-gray-800 mb-2">
                                    Treatment
                                </label>

                                <textarea
                                    name="treatment"
                                    rows="4"
                                    class="w-full border-gray-300 rounded-lg p-3
                                           focus:border-blue-500 focus:ring-blue-500"
                                    required></textarea>

                            </div>


                            <!-- OUTCOME -->
                            <div class="mb-8">

                                <label class="block font-semibold text-gray-800 mb-2">
                                    Outcome
                                </label>

                                <select
                                    name="outcome"
                                    class="w-full border-gray-300 rounded-lg p-3
                                           focus:border-blue-500 focus:ring-blue-500"
                                    required>

                                    <option value="">
                                        Select Outcome
                                    </option>

                                    <option value="Treated">
                                        Treated
                                    </option>

                                    <option value="Referred">
                                        Referred
                                    </option>

                                    <option value="Admitted">
                                        Admitted
                                    </option>

                                    <option value="Follow-up">
                                        Follow-up
                                    </option>

                                </select>

                            </div>


                            <!-- SAVE -->
                            <div class="flex items-center justify-end border-t pt-6">

                                <button
                                    type="submit"
                                    class="bg-blue-600 hover:bg-blue-700
                                           text-white px-7 py-3 rounded-lg
                                           font-semibold shadow-sm transition">

                                    Save Consultation

                                </button>

                            </div>

                        </form>

                    </div>

                </div>



                <!-- PATIENT HISTORY -->
                <div class="lg:col-span-1 lg:sticky lg:top-6">

                    <div class="bg-white rounded-xl shadow-sm border overflow-hidden">


                        <!-- HISTORY HEADER -->
                        <div class="p-5 border-b bg-gray-50">

                            <div class="flex items-center justify-between">

                                <h2 class="text-lg font-bold text-gray-900">
                                    Previous Consultations
                                </h2>

                                <div class="bg-blue-100 text-blue-700 rounded-full
                                            w-9 h-9 flex items-center justify-center
                                            font-bold text-sm">

                                    {{ $visits->count() }}

                                </div>

                            </div>

                        </div>


                        <!-- HISTORY -->
                        <div class="p-5 max-h-[calc(100vh-190px)] overflow-y-auto">

                            @if($visits->isEmpty())

                                <div class="text-center py-8">

                                    <p class="font-semibold text-gray-600">
                                        No previous consultations
                                    </p>

                                    <p class="text-sm text-gray-400 mt-1">
                                        First recorded visit.
                                    </p>

                                </div>

                            @else

                                @foreach($visits as $visit)

                                    <div class="relative pl-5
                                                {{ !$loop->last ? 'pb-6 mb-6 border-b' : '' }}">


                                        <!-- Timeline dot -->
                                        <div class="absolute left-0 top-1
                                                    w-2.5 h-2.5 rounded-full
                                                    bg-blue-500">
                                        </div>


                                        <!-- DATE / OUTCOME -->
                                        <div class="flex items-start justify-between gap-3">

                                            <p class="text-sm font-bold text-gray-900">

                                                {{ $visit->visit_date->format('d M Y') }}

                                            </p>

                                            <span class="inline-flex px-2 py-1 rounded-full
                                                         bg-gray-100 text-gray-600
                                                         text-xs font-semibold whitespace-nowrap">

                                                {{ $visit->outcome }}

                                            </span>

                                        </div>


                                        <!-- COMPLAINT -->
                                        <div class="mt-4">

                                            <p class="text-xs font-semibold uppercase
                                                      tracking-wide text-gray-400">

                                                Complaint

                                            </p>

                                            <p class="text-sm text-gray-700 mt-1 leading-relaxed">

                                                {{ $visit->complaint }}

                                            </p>

                                        </div>


                                        <!-- DIAGNOSIS -->
                                        <div class="mt-3">

                                            <p class="text-xs font-semibold uppercase
                                                      tracking-wide text-gray-400">

                                                Diagnosis

                                            </p>

                                            <p class="text-sm font-semibold text-gray-800 mt-1">

                                                {{ $visit->diagnosis }}

                                            </p>

                                        </div>


                                        <!-- TREATMENT -->
                                        <div class="mt-3">

                                            <p class="text-xs font-semibold uppercase
                                                      tracking-wide text-gray-400">

                                                Treatment

                                            </p>

                                            <p class="text-sm text-gray-700 mt-1 leading-relaxed">

                                                {{ $visit->treatment }}

                                            </p>

                                        </div>


                                    </div>

                                @endforeach

                            @endif

                        </div>

                    </div>

                </div>


            </div>

        </div>

    </div>

</x-app-layout>