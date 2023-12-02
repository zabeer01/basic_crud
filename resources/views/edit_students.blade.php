@extends('master')

@section('content')
    <div class="p-3">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('store_students') }}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" value="{{ $info ? $info->id : '' }}" name="id">

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ isset($info) ? $info->name : '' }}">

            <label for="image">Image:</label>
            <input type="file" id="image" name="image">

            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
