<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>user</title>
</head>

<body>
    <!-- <div class="row justify-content-center mt-5">
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
    </div> -->
    <div class="container mt-5">
        <form method="post" action="{{route('user.store')}}">
            @csrf
            <div class="mb-3">
                <label for="text" class="form-label">First Name</label>
                <input type="text" class="form-control" id="fname" name="name">
                <span class="text-danger">
                    @error('name'){{$message}}
                    @enderror
                </span>

            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lastname">
                <span class="text-danger">
                    @error('lastname'){{$message}}
                    @enderror
                </span>
            </div>

            <div class="d-flex" style="margin-top: 64px" ;>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radiobtn" id="flexRadioDefault1" value="1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Female
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radiobtn" id="flexRadioDefault2" value="0">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Male
                    </label>
                </div>
            </div>
            <!-- 
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radiobtn" id="flexRadioDefault1" value=0>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Male
                    </label>

                </div>


                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radiobtn" id="flexRadioDefault2" value="1">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Female
                    </label>
                </div> -->

            <div class="mb-3">
                <label for="text" class="form-label">Age</label>
                <input type="text" class="form-control" id="ag" name="age">
                <span class="text-danger">
                    @error('age'){{$message}}
                    @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Phone No</label>
                <input type="text" class="form-control" id="phone" name="phone">
                <span class="text-danger">
                    @error('phone'){{$message}}
                    @enderror
                </span>
            </div>

            <div class="mb-3">
                <label for="text" class="form-label">Password</label>
                <input type="password" class="form-control" id="pass" name="password">
                <span class="text-danger">
                    @error('password'){{$message}}
                    @enderror
                </span>
            </div>
            <div class="dropdown">
                <select class="form-select" aria-label="Default select example" name="is_admin">
                    <option value="1">Admin</option>
                    <option value="0">User</option>

                </select>


            </div>

            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
    <br /><br /><br />
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">FirstName</th>
                <th scope="col">LastName</th>
                <th scope="col">Age</th>
                <th scope="col">Gender</th>
                <th scope="col">Action</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php $counter=1 @endphp
            @foreach($user as $usertbl)
            <tr>
                <th>{{$counter}}</th>
                <td>{{$usertbl->name}}</td>
                <td>{{$usertbl->last_name}}</td>
                <td>{{$usertbl->age}}</td>
                @if($usertbl->gender == 1 )

                <td>Female </td>
                @else
                <td> Male </td>

                @endif

                <td><a href="{{ route('user.edit', ['user' => $usertbl->id]) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square">Edit</i></a></td>
                <td><a href="{{ route('user.destroy', ['user' => $usertbl->id]) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square">Delete</i></a></td>
                @php $counter++ @endphp
                @endforeach
        </tbody>
    </table>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>