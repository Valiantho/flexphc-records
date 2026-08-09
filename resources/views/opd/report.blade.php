<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            OPD Monthly Report
        </h2>
    </x-slot>

    <a
    href="{{ route('opd.report.print', ['month' => $month]) }}"
    target="_blank"
    class="px-4 py-2 rounded-lg bg-gray-800
           hover:bg-gray-900 text-white font-semibold"
>
    Print Report
</a>
    <div class="py-6">
        

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- REPORT HEADER -->
            <div class="bg-white rounded-xl border shadow-sm p-6 mb-6">

                <div class="flex flex-col sm:flex-row
                            sm:items-end sm:justify-between gap-4">

                    <div>
                        <p class="text-sm text-gray-500">
                            Monthly Report
                        </p>

                        <h1 class="text-2xl font-bold text-gray-900 mt-1">
                            {{ $date->format('F Y') }}
                        </h1>
                    </div>

                    <form
                        method="GET"
                        action="{{ route('opd.report') }}"
                        class="flex items-end gap-2"
                    >

                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">
                                Month
                            </label>

                            <input
                                type="month"
                                name="month"
                                value="{{ $month }}"
                                class="border border-gray-300 rounded-lg
                                       px-3 py-2
                                       focus:ring-2 focus:ring-blue-500
                                       focus:border-blue-500"
                            >
                        </div>

                        <button
                            type="submit"
                            class="px-4 py-2 rounded-lg bg-blue-600
                                   hover:bg-blue-700 text-white
                                   font-semibold transition"
                        >
                            View
                        </button>

                    </form>

                </div>

            </div>


            <!-- TOTAL -->
            <div class="bg-white rounded-xl border shadow-sm p-6 mb-6">

                <p class="text-sm text-gray-500">
                    Total OPD Consultations
                </p>

                <p class="text-4xl font-bold text-gray-900 mt-1">
                    {{ $total }}
                </p>

            </div>


            <!-- OUTCOMES -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">

                <div class="bg-white rounded-xl border shadow-sm p-5">
                    <p class="text-sm text-gray-500">
                        Treated
                    </p>

                    <p class="text-2xl font-bold text-green-600 mt-1">
                        {{ $treated }}
                    </p>
                </div>


                <div class="bg-white rounded-xl border shadow-sm p-5">
                    <p class="text-sm text-gray-500">
                        Referred
                    </p>

                    <p class="text-2xl font-bold text-orange-600 mt-1">
                        {{ $referred }}
                    </p>
                </div>


                <div class="bg-white rounded-xl border shadow-sm p-5">
                    <p class="text-sm text-gray-500">
                        Admitted
                    </p>

                    <p class="text-2xl font-bold text-red-600 mt-1">
                        {{ $admitted }}
                    </p>
                </div>


                <div class="bg-white rounded-xl border shadow-sm p-5">
                    <p class="text-sm text-gray-500">
                        Follow-up
                    </p>

                    <p class="text-2xl font-bold text-blue-600 mt-1">
                        {{ $followUp }}
                    </p>
                </div>

            </div>


            <!-- SEX -->
            <div class="grid grid-cols-2 gap-4 mb-6">

                <div class="bg-white rounded-xl border shadow-sm p-5">

                    <p class="text-sm text-gray-500">
                        Male
                    </p>

                    <p class="text-2xl font-bold text-gray-900 mt-1">
                        {{ $male }}
                    </p>

                </div>


                <div class="bg-white rounded-xl border shadow-sm p-5">

                    <p class="text-sm text-gray-500">
                        Female
                    </p>

                    <p class="text-2xl font-bold text-gray-900 mt-1">
                        {{ $female }}
                    </p>

                </div>

            </div>


            <!-- CONSULTATIONS -->
            <div class="bg-white rounded-xl border shadow-sm overflow-hidden">

                <div class="p-6 border-b">

                    <h2 class="text-lg font-bold text-gray-900">
                        Consultations
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        OPD records for {{ $date->format('F Y') }}
                    </p>

                </div>


                @if($visits->isEmpty())

                    <div class="p-8 text-center text-gray-500">
                        No OPD consultations were recorded for this month.
                    </div>

                @else

                    <div class="divide-y">

                        @foreach($visits as $visit)

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

                                        <p class="text-sm font-semibold text-gray-700 mt-1">
                                            {{ $visit->outcome }}
                                        </p>

                                    </div>

                                </div>

                            </a>

                        @endforeach

                    </div>

                @endif

            </div>

        </div>

    </div>

</x-app-layout>