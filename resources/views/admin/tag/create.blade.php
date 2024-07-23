@extends('layouts.app')

@section('title', 'Create Tag')

@section('content')
    <div class="container my-5">
      <div class="row">
        <div class="d-flex justify-content-between mb-2">
          <h3>Create Tag</h3>
          <a class="btn btn-success" href="{{route('admin.tag.create')}}" role="button">Back</a>
        </div>
        <!-- Blog entries-->
        <div class="col-lg-12">
          <div class="card p-3">
            <form method="POST" action="{{route('admin.tag.store')}}">
              @csrf
              <div class="mb-3">
                <label for="name" class="form-label">Tag</label>
                <input type="text" class="form-control" id="name" name="name" />
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection

