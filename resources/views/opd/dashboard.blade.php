<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        OPD
    </h2>
</x-slot>

<div class="py-6">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- SUMMARY -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">

            <!-- TODAY -->
            <div class="bg-white rounded-xl border shadow-sm p-5">
                <p class="text-sm text-gray-500">
                    Today
                </p>

                <p class="text-3xl font-bold text-gray-900 mt-1">
                    {{ $today }}
                </p>

                <p class="text-sm text-gray-500 mt-1">
                    consultations
                </p>
            </div>


            <!-- THIS MONTH -->
            <div class="bg-white rounded-xl border shadow-sm p-5">
                <p class="text-sm text-gray-500">
                    This Month
                </p>

                <p class="text-3xl font-bold text-gray-900 mt-1">
                    {{ $thisMonth }}
                </p>

                <p class="text-sm text-gray-500 mt-1">
                    consultations
                </p>
            </div>


            <!-- TREATED -->
            <div class="bg-white rounded-xl border shadow-sm p-5">
                <p class="text-sm text-gray-500">
                    Treated
                </p>

                <p class="text-3xl font-bold text-green-600 mt-1">
                    {{ $treated }}
                </p>

                <p class="text-sm text-gray-500 mt-1">
                    this month
                </p>
            </div>


            <!-- REFERRED -->
            <div class="bg-white rounded-xl border shadow-sm p-5">
                <p class="text-sm text-gray-500">
                    Referred
                </p>

                <p class="text-3xl font-bold text-orange-600 mt-1">
                    {{ $referred }}
                </p>

                <p class="text-sm text-gray-500 mt-1">
                    this month
                </p>
            </div>


            <!-- ADMITTED -->
            <div class="bg-white rounded-xl border shadow-sm p-5">
                <p class="text-sm text-gray-500">
                    Admitted
                </p>

                <p class="text-3xl font-bold text-red-600 mt-1">
                    {{ $admitted }}
                </p>

                <p class="text-sm text-gray-500 mt-1">
                    this month
                </p>
            </div>


            <!-- FOLLOW UP -->
            <div class="bg-white rounded-xl border shadow-sm p-5">
                <p class="text-sm text-gray-500">
                    Follow-up
                </p>

                <p class="text-3xl font-bold text-blue-600 mt-1">
                    {{ $followUp }}
                </p>

                <p class="text-sm text-gray-500 mt-1">
                    this month
                </p>
            </div>

        </div>


        <!-- RECENT CONSULTATIONS -->
        <div class="bg-white rounded-xl border shadow-sm overflow-hidden">

            <div class="p-6 border-b">

                <div class="flex items-center justify-between">

                    <div>
                        <h2 class="text-lg font-bold text-gray-900">
                            Recent Consultations
                        </h2>

                        <p class="text-sm text-gray-500 mt-1">
                            Latest OPD records
                        </p>
                    </div>

                    <a
                        href="{{ route('patients.search') }}"
                        class="text-sm font-semibold text-blue-600 hover:text-blue-800"
                    >
                        Find Patient
                    </a>

                </div>

            </div>


            @if($recentVisits->isEmpty())

                <div class="p-8 text-center text-gray-500">
                    No consultations recorded yet.
                </div>

            @else

                <div class="divide-y">

                    @foreach($recentVisits as $visit)

                        <a
                            href="{{ route('opd.show', [$visit->patient, $visit]) }}"
                            class="block p-5 hover:bg-gray-50 transition"
                        >

                            <div class="flex flex-col sm:flex-row
                                        sm:items-center
                                        sm:justify-between gap-3">

                                <div>

                                    <p class="font-semibold text-gray-900">

                                        {{ $visit->patient->first_name }}
                                        {{ $visit->patient->other_name }}
                                        {{ $visit->patient->surname }}

                                    </p>

                                    <p class="text-sm text-blue-600 mt-1">

                                        {{ $visit->patient->card_number }}

                                    </p>

                                </div>


                                <div class="sm:text-right">

                                    <p class="text-sm text-gray-500">

                                        {{ $visit->visit_date->format('d M Y') }}

                                    </p>

                                    <span class="inline-block mt-1
                                                 text-sm font-semibold
                                                 text-gray-700">

                                        {{ $visit->outcome }}

                                    </span>

                                </div>

                            </div>

                        </a>

                    @endforeach

                </div>

            @endif

        </div>

    </div>

</div>