<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>todo</title>
</head>

<body>

    <div class="text-center mt-5">
        <h2>Add Todo</h2>

        <form class="row g-3 justify-content-center" method="POST" action="{{route('todos.store')}}">
            @csrf
            <div class="col-6">
                <input type="text" class="form-control" name="title" placeholder="Title">
                <span class="text-danger">
                    @error('title'){{$message}}
                    @enderror
                </span>

            </div>
            <div class="d-flex">
                <textarea class="form-control" id="exampleFormControlTextarea1" name="des" placeholder="Description......" style="max-width: 50%; margin-left: 463px;" rows="2"></textarea>
                <span class="text-danger">
                    @error('des'){{$message}}
                    @enderror
                </span>
            </div>
            <div>
                <select class="form-select" aria-label="Default select example" name="dropdown" style="max-width:20%; margin-left: 468px;">
                    <option value="" disabled selected>select user</option>

                    @foreach($user_data as $usr)
                    <option value="{{$usr->id}}">{{$usr->name}}</option>


                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary" style="margin-top: -95px; margin-left: -20px;">Submit</button>
            </div>






        </form>
    </div>

    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
    <div>

        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Status</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @php $counter=1 @endphp

                @foreach($todos as $todo)
                <tr>
                    <th>{{$counter}}</th>
                    <td>{{$todo->title}}</td>

                    <td>{{$todo->created_at}}</td>
                    <td>
                        @if($todo->is_completed)
                        <div class="badge bg-success">Completed</div>
                        @else
                        <div class="badge bg-warning">Not Completed</div>
                        @endif
                    <td>{{$todo->des}}</td>
                    </td>
                    <td>
                        <a href="{{route('todos.edit',['todo'=>$todo->id])}}" class="btn btn-info">Edit</a>
                        <a href="{{route('todos.destory',['todo'=>$todo->id])}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>

                @php $counter++; @endphp

                @endforeach
            </tbody>
        </table>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>