<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Monthly OPD Report - {{ $date->format('F Y') }}
    </title>

    @vite(['resources/css/app.css'])

    <style>

        body {
            font-family: Arial, Helvetica, sans-serif;
            color: #111827;
            background: #f3f4f6;
        }

        .report-page {
            max-width: 900px;
            margin: 30px auto;
            background: white;
            padding: 45px 50px;
        }

        .report-header {
            text-align: center;
            border-bottom: 2px solid #111827;
            padding-bottom: 20px;
        }

        .report-header h1 {
            font-size: 24px;
            font-weight: 700;
            text-transform: uppercase;
            margin: 0;
        }

        .report-header .department {
            font-size: 14px;
            margin-top: 5px;
            color: #4b5563;
        }

        .report-title {
            font-size: 20px;
            font-weight: 700;
            margin-top: 22px;
            text-transform: uppercase;
        }

        .report-month {
            font-size: 16px;
            font-weight: 600;
            margin-top: 4px;
        }

        .section {
            margin-top: 28px;
        }

        .section-title {
            font-size: 15px;
            font-weight: 700;
            text-transform: uppercase;
            border-bottom: 1px solid #9ca3af;
            padding-bottom: 7px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #d1d5db;
            padding: 8px 9px;
            font-size: 12px;
        }

        th {
            background: #f3f4f6;
            font-weight: 700;
            text-align: left;
        }

        .summary-table td:last-child {
            text-align: right;
            font-weight: 600;
            width: 100px;
        }

        .summary-table tr:first-child td {
            font-weight: 700;
        }

        .register th {
            background: #e5e7eb;
        }

        .register td {
            vertical-align: top;
        }

        .number {
            text-align: center;
            width: 45px;
        }

        .date {
            width: 90px;
        }

        .card {
            width: 135px;
        }

        .sex {
            width: 65px;
        }

        .outcome {
            width: 90px;
        }

        .signature-area {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            margin-top: 70px;
        }

        .signature-line {
            border-bottom: 1px solid #374151;
            height: 30px;
        }

        .signature-label {
            font-size: 12px;
            margin-top: 6px;
            font-weight: 600;
        }

        .date-line {
            border-bottom: 1px solid #374151;
            height: 30px;
            margin-top: 18px;
        }

        .footer {
            margin-top: 45px;
            padding-top: 10px;
            border-top: 1px solid #d1d5db;
            display: flex;
            justify-content: space-between;
            font-size: 10px;
            color: #6b7280;
        }

        .print-controls {
            max-width: 900px;
            margin: 25px auto 0;
            display: flex;
            gap: 10px;
        }

        @media print {

            @page {
                size: A4 portrait;
                margin: 12mm;
            }

            body {
                background: white;
            }

            .print-controls {
                display: none !important;
            }

            .report-page {
                max-width: none;
                margin: 0;
                padding: 0;
                box-shadow: none;
            }

        }

    </style>

</head>


<body>


    <!-- SCREEN-ONLY CONTROLS -->

    <div class="print-controls">

        <button
            onclick="window.print()"
            class="px-5 py-3 bg-blue-600 hover:bg-blue-700
                   text-white rounded-lg font-semibold"
        >
            Print Report
        </button>

        <a
            href="{{ route('opd.report', ['month' => $month]) }}"
            class="px-5 py-3 bg-gray-200 hover:bg-gray-300
                   text-gray-800 rounded-lg font-semibold"
        >
            Back to Report
        </a>

    </div>


    <!-- REPORT -->

    <main class="report-page">


        <!-- HEADER -->

        <header class="report-header">

            <h1>
                Primary Health Care Centre
            </h1>

            <p class="department">
                Outpatient Department
            </p>

            <div class="report-title">
                Monthly OPD Report
            </div>

            <div class="report-month">
                {{ $date->format('F Y') }}
            </div>

        </header>


        <!-- SUMMARY -->

        <section class="section">

            <div class="section-title">
                Monthly Summary
            </div>

            <table class="summary-table">

                <tbody>

                    <tr>
                        <td>Total OPD Consultations</td>
                        <td>{{ $total }}</td>
                    </tr>

                    <tr>
                        <td>Treated</td>
                        <td>{{ $treated }}</td>
                    </tr>

                    <tr>
                        <td>Referred</td>
                        <td>{{ $referred }}</td>
                    </tr>

                    <tr>
                        <td>Admitted</td>
                        <td>{{ $admitted }}</td>
                    </tr>

                    <tr>
                        <td>Follow-up</td>
                        <td>{{ $followUp }}</td>
                    </tr>

                </tbody>

            </table>

        </section>


        <!-- SEX DISTRIBUTION -->

        <section class="section">

            <div class="section-title">
                Patient Distribution by Sex
            </div>

            <table class="summary-table">

                <tbody>

                    <tr>
                        <td>Male</td>
                        <td>{{ $male }}</td>
                    </tr>

                    <tr>
                        <td>Female</td>
                        <td>{{ $female }}</td>
                    </tr>

                </tbody>

            </table>

        </section>


        <!-- CONSULTATION REGISTER -->

        <section class="section">

            <div class="section-title">
                OPD Consultation Register
            </div>

            <table class="register">

                <thead>

                    <tr>

                        <th class="number">
                            S/N
                        </th>

                        <th class="date">
                            Date
                        </th>

                        <th class="card">
                            Card Number
                        </th>

                        <th>
                            Patient Name
                        </th>

                        <th class="sex">
                            Sex
                        </th>

                        <th class="outcome">
                            Outcome
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($visits as $index => $visit)

                        <tr>

                            <td class="number">
                                {{ $index + 1 }}
                            </td>

                            <td>
                                {{ $visit->visit_date->format('d/m/Y') }}
                            </td>

                            <td>
                                {{ $visit->patient->card_number }}
                            </td>

                            <td>
                                <strong>
                                    {{ $visit->patient->first_name }}
                                    {{ $visit->patient->other_name }}
                                    {{ $visit->patient->surname }}
                                </strong>
                            </td>

                            <td>
                                {{ $visit->patient->gender }}
                            </td>

                            <td>
                                {{ $visit->outcome }}
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="6"
                                style="text-align:center;"
                            >
                                No OPD consultations were recorded
                                for this month.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </section>


        <!-- SIGNATURES -->

        <section class="signature-area">

            <div>

                <div class="signature-line"></div>

                <div class="signature-label">
                    Prepared By
                </div>

                <div class="date-line"></div>

                <div class="signature-label">
                    Date
                </div>

            </div>


            <div>

                <div class="signature-line"></div>

                <div class="signature-label">
                    Reviewed / Approved By
                </div>

                <div class="date-line"></div>

                <div class="signature-label">
                    Date
                </div>

            </div>

        </section>


        <!-- FOOTER -->

        <footer class="footer">

            <span>
                FlexPHC Records
            </span>

            <span>
                Monthly OPD Report — {{ $date->format('F Y') }}
            </span>

            <span>
                Generated {{ now()->format('d M Y, h:i A') }}
            </span>

        </footer>


    </main>

</body>

</html>