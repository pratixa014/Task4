<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Search Page</title>
</head>

<body>
    <div class="container mt-5">
        <form method="post" action="{{route('user.Search')}}">
            @csrf
            @method('GET')
            <div class="align-items-center">
                <h1>User Table</h1>
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Username</label>
                <input type="text" class="form-control" id="uname" name="username">


            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Title</label>
                <input type="text" class="form-control" id="titl" name="title">
            </div>

            <div class="mb-3">
                <label for="text" class="form-label">Age</label>
                <input type="text" class="form-control" id="ag" name="age">
            </div>
            <br />
            <div class="d-flex ">
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
                </div>


            </div>
            <button type="submit" class="btn btn-primary mt-3">Search</button>
        </form>
        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Title</th>
                    <th scope="col">Age</th>
                    <th scope="col">Gender</th>

                    <th></th>
                </tr>
            </thead>
            <tbody>

                @php $counter=1 @endphp
                @foreach($srch as $searchtbl)
                <tr>
                  
                    <th>{{$counter}}</th>
                    <td>{{$searchtbl->name}}</td>
                    <td>{{$searchtbl->title}}</td>
                    <td>{{$searchtbl->age}}</td>
                    @if($searchtbl->gender == 1 )

                    <td>Female </td>
                    @else
                    <td> Male </td>

                    @endif
                </tr>
                @php $counter++ @endphp
                @endforeach
            </tbody>

        </table>


    </div>
</body>

</html>