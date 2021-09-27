<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>
<div class="card mb-3">
    <img height="265px" src="https://allea.org/wp-content/uploads/2019/06/shutterstock_520698799small-1500x430.jpg" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">Lijst met gebruikers</h5>
        <p class="card-text">Hier vind u alle informatie en gegevens van de gebruikers.</p>


        @if(auth()->user()->role_id == 2)
            <div class="form-group">
                <select class="form-control" type="text" id="myInput">
                    <option value="">Kies de klas...</option>
                    @foreach($data as $class)
                        <option value="{{$class->class}}">{{$class->class}}</option>
                    @endforeach
                </select>
            </div>
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Student Nummer</th>
                    <th scope="col">Voornaam</th>
                    <th scope="col">Achternaam</th>
                    <th scope="col">Klas</th>
                    <th scope="col">Leeftijd</th>
                    <th scope="col">Acties</th>
                </tr>
                </thead>
                <tbody id="myTable">
                @foreach($students as $student)
                    <tr>
                        <th scope="row">{{$student->studentnumber}}</th>
                        <td>{{$student->first_name}}</td>
                        <td>{{$student->last_name}}</td>
                        <td>{{$student->class}}</td>
                        <td>{{$student->age}}</td>
                        <td>

                            <a href="{{url('/edit/'.$student->id)}}" class="btn btn-sm btn-warning">Edit</a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

        @if(auth()->user()->role_id == 3)
            <h3>Filter</h3>
            <div class="form-group">
                <select class="form-control" type="text" id="myInput2">
                    <option value="">Kies de Rol...</option>
                    <option value="Student">Student</option>
                    <option value="Docent">Docent</option>
                    <option value="Bestuur">Bestuur</option>
                </select>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="email" class="form-control" id="myInput" placeholder="Volledige naam">
                </div>
                <div class="form-group col-md-6">
                    <input type="email" class="form-control" id="myInput3" placeholder="Plaats">
                </div>
            </div>

            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Volledige naam</th>
                    <th scope="col">Adres</th>
                    <th scope="col">Plaats</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Acties<a href="{{url('/create')}}"><i class="fa fa-plus" style="float:right;position:relative;top:5px;color:white;"></i></a></th>

                </tr>
                </thead>
                <tbody id="myTable2">
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->adres}}</td>
                        <td>{{$user->plaats}}</td>
                        <td>{{$user->email}}</td>
                        @if($user->role_id == 1)
                            <td>Student</td>
                        @elseif($user->role_id == 2)
                            <td>Docent</td>
                        @elseif($user->role_id == 3)
                            <td>Bestuur</td>
                        @endif
                        <td>
                            <a href="{{url('/users/edit/'.$user->id)}}" class="btn btn-sm btn-warning">Edit</a>
                            <a href="{{url('/edit/'.$user->id)}}" class="btn btn-sm btn-danger">Delete</a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable2 tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    $(document).ready(function(){
        $("#myInput2").on("change", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable2 tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    $(document).ready(function(){
        $("#myInput3").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable2 tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>





