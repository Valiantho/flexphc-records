<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Patient Profile
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


            <!-- PATIENT HEADER -->
            <div class="bg-white rounded-xl shadow-sm border p-6 mb-6">

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">

                    <div>

                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-400 mb-2">
                            Patient
                        </p>

                        <h1 class="text-3xl sm:text-4xl font-bold text-gray-900">
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

                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                            Card Number
                        </p>

                        <p class="text-xl font-bold text-blue-700 mt-1">
                            {{ $patient->card_number }}
                        </p>

                        @if($patient->status)

                            <span class="inline-flex items-center mt-3 px-3 py-1
                                         rounded-full bg-green-100 text-green-700
                                         text-xs font-semibold">

                                Active

                            </span>

                        @else

                            <span class="inline-flex items-center mt-3 px-3 py-1
                                         rounded-full bg-gray-100 text-gray-600
                                         text-xs font-semibold">

                                Inactive

                            </span>

                        @endif

                    </div>

                </div>

            </div>



            <!-- QUICK ACTIONS -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">

                <a
                    href="{{ route('opd.create', $patient) }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white rounded-xl
                           p-5 shadow-sm transition">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-lg font-bold">
                                New OPD Visit
                            </p>

                            <p class="text-blue-100 text-sm mt-1">
                                Start a consultation
                            </p>

                        </div>

                        <span class="text-2xl">
                            +
                        </span>

                    </div>

                </a>


                <button
                    type="button"
                    class="bg-white hover:bg-gray-50 text-gray-800 rounded-xl
                           p-5 border shadow-sm transition text-left">

                    <p class="text-lg font-bold">
                        Edit Patient
                    </p>

                    <p class="text-gray-500 text-sm mt-1">
                        Update patient information
                    </p>

                </button>

            </div>



            <!-- PATIENT INFORMATION -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">


                <!-- CONTACT -->
                <div class="bg-white rounded-xl shadow-sm border p-6">

                    <h2 class="font-bold text-lg text-gray-900 mb-5">
                        Contact
                    </h2>

                    <div class="space-y-5">

                        <div>

                            <p class="text-xs uppercase tracking-wide
                                      font-semibold text-gray-400">
                                Phone
                            </p>

                            <p class="mt-1 text-gray-800">
                                {{ $patient->phone ?: 'Not provided' }}
                            </p>

                        </div>


                        <div>

                            <p class="text-xs uppercase tracking-wide
                                      font-semibold text-gray-400">
                                Address
                            </p>

                            <p class="mt-1 text-gray-800">
                                {{ $patient->address ?: 'Not provided' }}
                            </p>

                        </div>


                        <div>

                            <p class="text-xs uppercase tracking-wide
                                      font-semibold text-gray-400">
                                Occupation
                            </p>

                            <p class="mt-1 text-gray-800">
                                {{ $patient->occupation ?: 'Not provided' }}
                            </p>

                        </div>

                    </div>

                </div>



                <!-- NEXT OF KIN -->
                <div class="bg-white rounded-xl shadow-sm border p-6">

                    <h2 class="font-bold text-lg text-gray-900 mb-5">
                        Next of Kin
                    </h2>

                    <div class="space-y-5">

                        <div>

                            <p class="text-xs uppercase tracking-wide
                                      font-semibold text-gray-400">
                                Name
                            </p>

                            <p class="mt-1 text-gray-800">
                                {{ $patient->next_of_kin ?: 'Not provided' }}
                            </p>

                        </div>


                        <div>

                            <p class="text-xs uppercase tracking-wide
                                      font-semibold text-gray-400">
                                Phone
                            </p>

                            <p class="mt-1 text-gray-800">
                                {{ $patient->next_of_kin_phone ?: 'Not provided' }}
                            </p>

                        </div>

                    </div>

                </div>



                <!-- RECORD -->
                <div class="bg-white rounded-xl shadow-sm border p-6">

                    <h2 class="font-bold text-lg text-gray-900 mb-5">
                        Record
                    </h2>

                    <div class="space-y-5">

                        <div>

                            <p class="text-xs uppercase tracking-wide
                                      font-semibold text-gray-400">
                                Registered
                            </p>

                            <p class="mt-1 text-gray-800">
                                {{ $patient->created_at->format('d M Y') }}
                            </p>

                        </div>


                        <div>

                            <p class="text-xs uppercase tracking-wide
                                      font-semibold text-gray-400">
                                Date of Birth
                            </p>

                            <p class="mt-1 text-gray-800">
                                {{ $patient->date_of_birth
                                    ? $patient->date_of_birth->format('d M Y')
                                    : 'Not provided' }}
                            </p>

                        </div>


                        <div>

                            <p class="text-xs uppercase tracking-wide
                                      font-semibold text-gray-400">
                                Patient ID
                            </p>

                            <p class="mt-1 text-gray-800">
                                #{{ $patient->id }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>


        </div>

        <!-- CONSULTATION HISTORY -->
<div class="bg-white rounded-xl shadow-sm border mt-6 overflow-hidden">

    <div class="p-6 border-b bg-gray-50">

        <div class="flex items-center justify-between">

            <div>

                <h2 class="text-xl font-bold text-gray-900">
                    Consultation History
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Previous OPD visits for this patient
                </p>

            </div>

            <div class="bg-blue-100 text-blue-700 rounded-full
                        px-3 py-1 text-sm font-bold">

                {{ $visits->count() }}

            </div>

        </div>

    </div>


    <div class="p-6">

        @if($visits->isEmpty())

            <div class="text-center py-8">

                <p class="font-semibold text-gray-600">
                    No previous consultations
                </p>

                <p class="text-sm text-gray-400 mt-1">
                    This patient has no recorded OPD visits yet.
                </p>

            </div>

       @else

    @foreach($visits as $visit)

        <a
            href="{{ route('opd.show', [$patient, $visit]) }}"
            class="block border rounded-xl p-5 mb-4
                   hover:bg-gray-50 hover:border-blue-300 transition"
        >

            <div class="flex flex-col sm:flex-row
                        sm:items-center sm:justify-between gap-3">

                <div>
                    <p class="font-bold text-gray-900">
                        {{ $visit->visit_date->format('d M Y') }}
                    </p>

                    <p class="text-sm text-gray-500 mt-1">
                        {{ $visit->complaint }}
                    </p>
                </div>

                <span class="inline-flex w-fit px-3 py-1
                             rounded-full bg-gray-100
                             text-gray-600 text-xs font-semibold">
                    {{ $visit->outcome }}
                </span>

            </div>

            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">

                <div>
                    <p class="text-xs uppercase tracking-wide
                              font-semibold text-gray-400">
                        Diagnosis
                    </p>

                    <p class="text-sm text-gray-800 mt-1">
                        {{ $visit->diagnosis }}
                    </p>
                </div>

                <div>
                    <p class="text-xs uppercase tracking-wide
                              font-semibold text-gray-400">
                        Treatment
                    </p>

                    <p class="text-sm text-gray-800 mt-1">
                        {{ $visit->treatment }}
                    </p>
                </div>

            </div>

        </a>

    @endforeach

@endif

    </div>

</div>

    </div>

</x-app-layout>