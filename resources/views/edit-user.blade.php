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
    <div class="container mt-5">
        <form method="post" action="{{route('user.update', ['user'=> $user->id])}}">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="text" class="form-label">First Name</label>
                <input type="text" class="form-control" id="fname" name="name" value="{{$user->name}}">
                <span class="text-danger">
                    @error('name'){{$message}}
                    @enderror
                </span>

            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lastname" value="{{$user->last_name}}">
                <span class="text-danger">
                    @error('lastname'){{$message}}
                    @enderror
                </span>
            </div>

            <div class="d-flex" style="margin-top: 64px" ;>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radiobtn" id="flexRadioDefault1" @if($user->gender == 1) checked @endif value="1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Female
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radiobtn" id="flexRadioDefault2" value="0" @if($user->gender == 0) checked @endif>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Male
                    </label>
                </div>
            </div>


            <div class="mb-3">
                <label for="text" class="form-label">Age</label>
                <input type="text" class="form-control" id="ag" name="age" value="{{$user->age}}">

            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Phone No</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}">

            </div>


            <div class="dropdown">
                <select class="form-select" aria-label="Default select example" name="is_admin" value="{{$user->is_admin}}">
                    <option value="1" @if($user->is_admin == 1) selected @endif >Admin</option>
                    <option value="0" @if($user->is_admin == 0) selected @endif>User</option>

                </select>


            </div>

            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>







    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>