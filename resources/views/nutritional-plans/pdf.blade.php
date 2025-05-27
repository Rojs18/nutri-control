<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Plan de Alimentación</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
            line-height: 1.5;
        }
        .header {
            text-align: center;
            margin-bottom: 10px;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #2c7873;
        }
        .greeting {
            margin-bottom: 25px;
            text-align: justify;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
            page-break-inside: avoid;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            vertical-align: top;
        }
        th {
            background-color: #7AC6D2;
            font-weight: bold;
        }
        .meal-time {
            font-weight: bold;
            color: #213448;
        }
        .signature {
            margin-top: 40px;
            text-align: right;
            font-style: italic;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #777;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
        @page {
            size: A4 landscape;
        }
    </style>
</head>
<body>
<div class="header">
    <h1>Plan Nutricional</h1>
    <h2>{{ $plan->name }}</h2>
    <p>Paciente: {{ $plan->patient->first_name }} {{ $plan->patient->last_name }}</p>
</div>

<div class="greeting">
    <p><strong></strong></p>
</div>

<table>
    <thead>
        <tr>
            <th>COMIDA</th>
            @foreach($plan->options as $option)
                <th>{{ $option->name }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
    <tr>
        <td class="meal-time">DESAYUNO<br>(9:00 / 10:00 am)</td>
        @foreach($plan->options as $option)
            @forelse($option->mealOptions as $mealOption)
                @if($mealOption->recipe->mealType->key == 'breakfast' )
                    <td>{{ ucfirst($mealOption->recipe->name) }}</td>
                @endif
            @empty
                <td></td>
            @endforelse
        @endforeach
    </tr>
    <tr>
        <td class="meal-time">ALMUERZO<br>(1:00 / 2:00 pm)</td>
        @foreach($plan->options as $option)
            @forelse($option->mealOptions as $mealOption)
                @if($mealOption->recipe->mealType->key == 'lunch' )
                    <td>{{ ucfirst($mealOption->recipe->name)}}</td>
                @endif
            @empty
                <td></td>
            @endforelse
        @endforeach
    </tr>
    <tr>
        <td class="meal-time">CENA<br>(7:00 / 8:00 pm)</td>
        @foreach($plan->options as $option)
            @forelse($option->mealOptions as $mealOption)
                @if($mealOption->recipe->mealType->key == 'dinner' )
                    <td>{{ ucfirst($mealOption->recipe->name) }}</td>
                @endif
            @empty
                <td></td>
            @endforelse
        @endforeach
    </tr>
    </tbody>
</table>

<div class="signature">
    <p>Lic. Alfredo Simancas, Nutricionista – Dietista<br>
    </p>
</div>

<div class="footer">
    <p>Documento generado electrónicamente el {{ date('d/m/Y') }}</p>
</div>
</body>
</html>
