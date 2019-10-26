@extends('layouts.app')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a marker</h1>
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
      <form method="post" action="{{ route('postManager.store') }}">
          @csrf
          <div class="row">
          <div class="col-6">
          <div class="form-group">    
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="lon">Lon:</label>
              <input type="number" class="form-control" name="lon"/>
          </div>

          <div class="form-group">
              <label for="lat">Lat:</label>
              <input type="number" class="form-control" name="lat"/>
          </div>
          <div class="form-group">
              <label for="photographer">Photographer:</label>
              <input type="text" class="form-control" name="photographer" value="CSC"/>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
              <label for="rating">Rating:</label>
              <input type="number" min="0" max="5" value="5" class="form-control" name="rating"/>
          </div>
          <div class="form-group">
            <label for="date">date:</label>
            <input type="date" class="form-control" name="date"/>
        </div>
        <div class="form-group">
          <label for="type">Type:</label>
          <select name="type"  class="form-control">
          <option value="activity">Activity</option>
          <option value="other">Other</option>
          <option value="restaurant">Restaurant</option>
        </select>
      </div>
      <div class="form-group">
        <label for="text">Description:</label>
        <textarea  class="form-control" name="text" rows="3"></textarea>
    </div>
  </div>  
</div>                       
          <button type="submit" class="btn btn-primary-outline">Add location</button>
      </form>
  </div>
</div>
</div>
@endsection