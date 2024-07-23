@extends('layouts.app')

@section('title', 'Tag List')

@section('content')
          <div class="row">
        <div class="d-flex justify-content-between mb-2">
          <h3>Tag List</h3>
          <a class="btn btn-success" href="{{route('admin.tag.create')}}" role="button"
            >Create</a
          >
        </div>
        <!-- Blog entries-->
        <div class="col-lg-12">
          <div class="card p-3">
            <table
              id="datatable"
              class="table table-striped"
              style="width: 100%"
            >
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tag</th>
                  <th style="width: 100px">Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($tags as $Tag)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $Tag->name }}</td>
                      <td>
                          <a class="btn btn-primary btn-sm"
                            href="{{ route('admin.tag.edit', ['id' => $Tag->id]) }}"
                            role="button">Edit</a>
                          <form method="POST" action="{{ route('admin.tag.destroy', ['id' => $Tag->id]) }}">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger btn-sm" type="submit" role="button">Delete</button>
                          </form>
                      </td>
                  </tr>
                  @endforeach
              </tbody>

              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Tag</th>
                  <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
@endsection