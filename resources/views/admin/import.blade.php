@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Import Users</h2>
    <form action="{{ route('admin.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="csv_file">Choose CSV file</label>
            <input type="file" name="csv_file" id="csv_file" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
@endsection