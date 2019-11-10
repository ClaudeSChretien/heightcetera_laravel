<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ url('/') }}">Home</a>

            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Post Manager
            </div>
            <div class="title m-b-md">
                {{$trip->name}}
            </div>


            <div class="links">

                <a href="/trip/{{$trip->name}}/postManager/create">Create</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h1 class="display-3">Trips</h1>    
              <table class="table table-striped">
                <thead>
                    <tr>
                      <td>ID</td>
                      <td>Name</td>
                      <td>Email</td>
                      <td>Job Title</td>
                      <td>City</td>
                      <td>Country</td>
                      <td>Country</td>
                      <td colspan = 2>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->name}} </td>
                        <td>{{$post->lon}}</td>
                        <td>{{$post->lat}}</td>
                        <td>{{$post->date}}</td>
                        <td>{{$post->text_fr}}</td>
                        <td>{{$post->text_en}}</td>
                        
                        <td>
                            <a href="{{ route('postManager.edit', [$trip->name, $post->id]) }}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('postManager.destroy', [$trip->name, $post->id])}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            <div>
            </div>
    </div>
</body>

</html>