<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Student Management System</title>
</head>
<body>

@include("navbar")

<div class="row header-container justify-content-center">
    <div class="header">
        <h1>Student Management System</h1>
    </div>
</div>

@if($layout == 'index')
    <div class="container-fluid mt-4">
        <div class="row">
            <section class="col">
                @include("studentlist")
            </section>
                @role('Student')
                    <section class="col">
                        @include("studentedit")
                    </section>
                @endrole

        </div>
    </div>
@elseif(($layout == 'create') && (auth()->user()->roles == 'Docent') || (auth()->user()->roles == 'Bestuur'))
    <div class="container-fluid mt-4">
        <div class="row">
            <section class="col">
                @include("studentlist")
            </section>
            <section class="col">
                <div class="card mb-3">
                    <img height="265px" src="https://www.eladsoft.com/media/1988/ministry-of-education_hero.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Voeg hier een nieuwe student toe.</h5>
                        <form action="{{url('/store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Studentnummer</label>
                                <input name="studentnumber" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Studentnummer" required>
                            </div>
                            <div class="form-group">
                                <label>Voornaam</label>
                                <input name="first_name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Voornaam" required>
                            </div>
                            <div class="form-group">
                                <label>Achternaam</label>
                                <input name="last_name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Achternaam" required>
                            </div>
                            <div class="form-group">
                                <label>Leeftijd</label>
                                <input name="age" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Leeftijd" required>
                            </div>
                            <input type="submit" class="btn btn-info" value="Save">
                            <input type="reset" class="btn btn-warning" value="Reset">
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@elseif($layout == 'show' )
    <div class="container-fluid mt-4">
        <div class="row">
            <section class="col">
                @include("studentlist")
            </section>
            <section class="col">

            </section>
        </div>
    </div>
@elseif(($layout == 'edit') && (auth()->user()->role_id == 2) || (auth()->user()->role_id == 3))
    <div class="container-fluid mt-4">
        <div class="row">
            <section class="col">
                @include("studentlist")
            </section>
            <section class="col">
                <div class="card mb-3">
                    <img height="265px" src="https://www.eladsoft.com/media/1988/ministry-of-education_hero.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Update gegevens van de studenten.</h5>
                        <form action="{{url('/update/' .$student->id)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Studentnummer</label>
                                <input value="{{$student->studentnumber}}" name="studentnumber" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Studentnummer" required>
                            </div>
                            <div class="form-group">
                                <label>Voornaam</label>
                                <input value="{{$student->first_name}}" name="first_name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Voornaam" required>
                            </div>
                            <div class="form-group">
                                <label>Achternaam</label>
                                <input value="{{$student->last_name}}" name="last_name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Achternaam" required>
                            </div>
                            <div class="form-group">
                                <label>Leeftijd</label>
                                <input value="{{$student->age}}" name="age" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Leeftijd" required>
                            </div>
                            <div class="form-group">
                                <p>Actief</p>
                                <label class="switch">
                                    @if($student->status == '')
                                        <input type="checkbox" name="active">
                                        <span class="slider round"></span>
                                    @endif

                                    @if($student->status == 'on')
                                        <input type="checkbox" name="active" checked >
                                        <span class="slider round"></span>
                                    @endif
                                </label>
                            </div>
                            <input type="submit" class="btn btn-info" value="Update">
                            <input type="reset" class="btn btn-warning" value="Reset">
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @elseif($layout == 'studiegeld')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Factuurnr.</th>
                <th scope="col">Datum</th>
                <th scope="col">Bedrag</th>
                <th scope="col">Acties</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $row)
            <tr>
                <th scope="row">{{$row->invoicenumber}}</th>
                <td>{{$row->date}}</td>
                <td>{{$row->amount}}</td>
                <td><a href="/student/invoice/{{$row->invoice_id}}">Bekijken</a> | <a href="{{url('/mollie-payment')}}">Betalen</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @else
        <h2 style="text-align: center">U heeft geen toegang tot deze pagina.</h2>
        <a href="{{url('/home')}}"><button type="button" class="btn btn-info" style="position:relative;left:50%; transform: translate(-50%);top:20px;">Terug naar home pagina</button></a>
@endif

<footer></footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
