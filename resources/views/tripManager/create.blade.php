@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Create a new trip</h1>
        <div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
            <form method="post" action="{{ route('trips.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" />
                        </div>

                        <div class="form-group col-6">
                            <label for="lon">Lon:</label>
                            <input type="number" class="form-control" name="lon" />
                        </div>

                        <div class="form-group col-5">
                            <label for="lat">Lat:</label>
                            <input type="number" class="form-control" name="lat" />
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="date">date:</label>
                            <input type="date" class="form-control" name="date" />
                        </div>
                        <div class="form-group">
                            <label for="text">Description Francais:</label>
                            <textarea class="form-control" name="text_fr" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="text">Description Englais:</label>
                            <textarea class="form-control" name="text_en" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control" name="image" required>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary-outline">Add location</button>
            </form>
        </div>
    </div>
</div>
@endsection