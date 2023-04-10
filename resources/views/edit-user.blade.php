<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit user</title>
</head>

<body>
    <div class="row justify-content-center mt-5">
        <div class="col-lg-6">
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif

            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
            </div>
            @endforeach
            @endif
        </div>
    </div>
    <div class="container mt-2">
        <form method="POST" action="{{route('user.update', ['user'=> $user->id])}}">

            @csrf

            {{ method_field('PUT') }}



            <div class="form-group">
                <label for="text">First Name</label>
                <input type="text" class="form-control" id="text" placeholder="Enter name" value="{{$user->name}}" name="name">

            </div>
            <div class="form-group mt-2 ">
                <label for="text">Last Name</label>
                <input type="text" class="form-control" id="text" placeholder="Enter name" value="{{$user->last_name}}" name="lastname">
            </div>
            <br />
            <div class="radiogrp d-flex">
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="flexRadioDefault1" name="radiobtn" value="{{$user->gender}}">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="flexRadioDefault2" name="radiobtn" value="{{$user->gender}}">
                    <label class=" form-check-label" for="flexRadioDefault2">
                        Female
                    </label>
                </div>

            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>

    </div>







    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>