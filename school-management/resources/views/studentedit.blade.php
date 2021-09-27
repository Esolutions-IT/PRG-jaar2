<div class="container-fluid mt-4">
    <div class="row">
        <section class="col">
            <div class="card mb-3">
                <img height="265px" src="https://www.eladsoft.com/media/1988/ministry-of-education_hero.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Update je eigen gegevens</h5>

                    <form action="{{url('/users/edit')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Naam</label>
                            <input value="{{auth()->user()->name}}" name="first_name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Voornaam" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input value="{{auth()->user()->email}}" name="email" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Leeftijd" required>

                        </div>
                        <div class="form-group">
                            <label>Adres</label>
                            <input value="{{auth()->user()->adres}}" name="adres" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Voornaam" required>
                        </div>
                        <div class="form-group">
                            <label>Postcode</label>
                            <input value="{{auth()->user()->postcode}}" name="postcode" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Voornaam" required>
                        </div>
                        <div class="form-group">
                            <label>Plaats</label>
                            <input value="{{auth()->user()->plaats}}" name="plaats" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Voornaam" required>
                        </div>
                        <input type="submit" class="btn btn-info" value="Update">
                        <input type="reset" class="btn btn-warning" value="Reset">
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
