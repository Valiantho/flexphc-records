<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Consultation Record
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">


            <!-- PATIENT -->
            <div class="bg-white rounded-xl shadow-sm border p-6 mb-6">

                <div class="flex flex-col sm:flex-row
                            sm:items-center sm:justify-between gap-4">

                    <div>

                        <p class="text-xs font-semibold uppercase
                                  tracking-wider text-gray-400">
                            Patient
                        </p>

                        <h1 class="text-3xl font-bold text-gray-900 mt-1">

                            {{ $patient->first_name }}
                            {{ $patient->other_name }}
                            {{ $patient->surname }}

                        </h1>

                    </div>


                    <div class="sm:text-right">

                        <p class="text-xs font-semibold uppercase
                                  tracking-wider text-gray-400">
                            Card Number
                        </p>

                        <p class="text-lg font-bold text-blue-700 mt-1">

                            {{ $patient->card_number }}

                        </p>

                    </div>

                </div>

            </div>



            <!-- CONSULTATION HEADER -->
            <div class="bg-white rounded-xl shadow-sm border p-6 mb-6">

                <div class="flex flex-col sm:flex-row
                            sm:items-center sm:justify-between gap-4">

                    <div>

                        <p class="text-xs font-semibold uppercase
                                  tracking-wider text-gray-400">
                            Consultation
                        </p>

                        <h2 class="text-2xl font-bold text-gray-900 mt-1">

                            {{ $visit->visit_date->format('d M Y') }}

                        </h2>

                    </div>


                    <span class="inline-flex w-fit px-4 py-2
                                 rounded-full bg-blue-100
                                 text-blue-700 text-sm font-semibold">

                        {{ $visit->outcome }}

                    </span>

                </div>

            </div>



            <!-- CLINICAL RECORD -->
            <div class="bg-white rounded-xl shadow-sm border overflow-hidden">

                <div class="p-6 border-b">

                    <h2 class="text-lg font-bold text-gray-900">
                        Clinical Record
                    </h2>

                </div>


                <div class="p-6 space-y-8">


                    <!-- COMPLAINT -->
                    <div>

                        <p class="text-xs font-semibold uppercase
                                  tracking-wider text-gray-400 mb-2">
                            Presenting Complaint
                        </p>

                        <p class="text-gray-800 leading-relaxed">
                            {{ $visit->complaint }}
                        </p>

                    </div>


                    <!-- EXAMINATION -->
                    <div>

                        <p class="text-xs font-semibold uppercase
                                  tracking-wider text-gray-400 mb-2">
                            Examination
                        </p>

                        <p class="text-gray-800 leading-relaxed">

                            {{ $visit->examination ?: 'No examination recorded.' }}

                        </p>

                    </div>


                    <!-- DIAGNOSIS -->
                    <div>

                        <p class="text-xs font-semibold uppercase
                                  tracking-wider text-gray-400 mb-2">
                            Diagnosis
                        </p>

                        <p class="text-gray-800 leading-relaxed">
                            {{ $visit->diagnosis }}
                        </p>

                    </div>


                    <!-- TREATMENT -->
                    <div>

                        <p class="text-xs font-semibold uppercase
                                  tracking-wider text-gray-400 mb-2">
                            Treatment
                        </p>

                        <p class="text-gray-800 leading-relaxed">
                            {{ $visit->treatment }}
                        </p>

                    </div>


                </div>

            </div>



            <!-- ACTIONS -->
            <div class="mt-6 flex flex-col sm:flex-row gap-3">

                <a
                    href="{{ route('patients.find', [
                        'card_number' => $patient->card_number
                    ]) }}"
                    class="px-5 py-3 rounded-lg bg-gray-100
                           hover:bg-gray-200 text-gray-800
                           font-semibold text-center"
                >
                    Back to Patient
                </a>

                <a
                    href="{{ route('opd.edit', [$patient, $visit]) }}"
                    class="px-5 py-3 rounded-lg bg-gray-100
                        hover:bg-gray-200 text-gray-800
                        font-semibold text-center"
                >
                    Edit Consultation
                </a>

                <a
                    href="{{ route('opd.create', $patient) }}"
                    class="px-5 py-3 rounded-lg bg-blue-600
                           hover:bg-blue-700 text-white
                           font-semibold text-center"
                >
                    New OPD Visit
                </a>

            </div>


        </div>

    </div>

</x-app-layout>