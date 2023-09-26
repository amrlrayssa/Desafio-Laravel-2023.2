<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice - PetCare</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        table{
            font-size: x-small;
        }
        tfoot tr td{
            font-weight: bold;
            font-size: x-small;
        }
        .gray {
            background-color: lightgray
        }
    </style>
</head>

<body>
    <table width="100%">
        <tr>
            <td valign="top"><img src="https://i.imgur.com/9TInlUz.png" alt="" width="150"/></td>
            <td align="right">
                <h3>INVOICE</h3>
                <pre>
                    {{ \Illuminate\Support\Facades\Auth::user()->name }}
                    {{ \Illuminate\Support\Facades\Auth::user()->email }}
                    {{ \Illuminate\Support\Facades\Auth::user()->address }}
                    {{ \Illuminate\Support\Facades\Auth::user()->phone }}
                </pre>
            </td>
        </tr>

    </table>
    <hr>
    <table width="100%">
        <tr>
            <td align="right"><strong>Emission Date: </strong>{{$actualDate}}</td>
        </tr>
    </table>

    @foreach($consultations as $consultation)
    <table width="100%">
        <tr>
            <td align="center"><h3>{{ (new DateTime($consultation->initial_date))->format('F') }} </h3></td>
        </tr>
    </table>
    <table width="100%">
        <thead style="background-color: lightgray;">
            <tr>
                <th>ID</th>
                <th>Consultation</th>
                <th>Animal</th>
                <th>Initial Date</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{ $consultation->id }}</th>
                <td>{{ $consultation->treatment }}</td>
                <td align="right">{{ $consultation->animal->name }}</td>
                <td align="right">{{ $consultation->initial_date }}</td>
            </tr>
        </tbody>
    </table>
    @endforeach
</body>
</html>