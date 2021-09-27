<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


    <style>
        .header{
            width:100%;
            height:60px;
            background-color: #00c9b7;
            position:relative;
            top:-50px;
        }

        .header_text{
            border-bottom: 2px solid #00c9b7;
            margin-top: 20px !important;
            margin-bottom: 20px !important;
            font-family: 'Dancing Script', cursive;
            font-size: 20px !important;
            text-align: center;
        }
        .overzicht{
            position:relative;
            top:50px;
            padding-bottom:20px;
        }

        .charts{
            position:relative;
            left:-100px;
        }
        .cijfers{
            position:relative;
            top:40px;
        }
    </style>
</head>
<body>
    <div class="header"></div>
    <h1 class="header_text">Student Management System</h1>
    <table class="table overzicht">
        <thead>
        <tr>
            <th scope="col">Studentnummer</th>
            <th scope="col">Voornaam</th>
            <th scope="col">Achternaam</th>
            <th scope="col">Leeftijd</th>
            <th scope="col">Klas</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{{$student->studentnumber}}</th>
            <td>{{$student->first_name}}</td>
            <td>{{$student->last_name}}</td>
            <td>{{$student->age}}</td>
            <td>{{$student->class}}</td>
        </tr>
        </tbody>
    </table>

    <table class="table overzicht">
        <thead>
        <tr>
            <th scope="col">Adres</th>
            <th scope="col">Plaats</th>
            <th scope="col">Postcode</th>
            <th scope="col">Tel.</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{{$student->adres}}</th>
            <td>{{$student->plaats}}</td>
            <td>{{$student->postcode}}</td>
            <td>{{$student->telefoonnummer}}</td>
            <td>{{$student->email}}</td>
        </tr>
        </tbody>
    </table>
    <div class="cijfers">
        <h1 class="header_text">Cijfers overzicht</h1>
        <table class="table overzicht" style="position:relative;top:30px;">
            <thead>
            <tr>
                <th scope="col">Vak</th>
                <th scope="col">Periode 1</th>
                <th scope="col">Periode 2</th>
                <th scope="col">Periode 3</th>
                <th scope="col">Gemiddelde</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $row)
                {{$gemiddelde =  $row->periode1 + $row->periode2 + $row->periode3}}

            <tr>
                <th scope="row">{{$row->vak}}</th>
                <td>{{$row->periode1}}</td>
                <td>{{$row->periode2}}</td>
                <td>{{$row->periode3}}</td>
                <td>{{$gemiddelde / 3}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>







</body>
</html>
