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
                @include("userslist")
            </section>
            <section class="col">

            </section>
        </div>
    </div>
@elseif($layout == 'edit')

    <div class="container-fluid mt-4">
        <div class="row">
            <section class="col">
                @include("userslist")
            </section>
            @foreach($data as $row)
            <section class="col">
                <div class="card mb-3">
                    <img height="265px" src="https://www.eladsoft.com/media/1988/ministry-of-education_hero.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Update gegevens van de studenten.</h5>
                        <form action="{{url('/update/' .$row->name)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Studentnummer</label>
                                <input value="{{$row->name}}" name="studentnumber" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Studentnummer">
                            </div>
                            <div class="form-group">
                                <label>Voornaam</label>
                                <input value="{{$row->name}}" name="first_name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Voornaam">
                            </div>
                            <div class="form-group">
                                <label>Achternaam</label>
                                <input value="{{$row->name}}" name="last_name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Achternaam">
                            </div>
                            <div class="form-group">
                                <label>Leeftijd</label>
                                <input value="{{$row->name}}" name="age" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Leeftijd">
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <p>Actief</p>--}}
{{--                                <label class="switch">--}}
{{--                                    @if($student->status == '')--}}
{{--                                        <input type="checkbox" name="active">--}}
{{--                                        <span class="slider round"></span>--}}
{{--                                    @endif--}}

{{--                                    @if($student->status == 'on')--}}
{{--                                        <input type="checkbox" name="active" checked >--}}
{{--                                        <span class="slider round"></span>--}}
{{--                                    @endif--}}
{{--                                </label>--}}
{{--                            </div>--}}
                            <input type="submit" class="btn btn-info" value="Update">
                            <input type="reset" class="btn btn-warning" value="Reset">
                        </form>
                    </div>
                </div>
            </section>
                @endforeach
        </div>
    </div>
@endif
