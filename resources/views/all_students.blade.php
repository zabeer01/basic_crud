@extends('master')

@section('content')
   <div class="p-5">
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">SI</th>
                <th scope="col">name</th>
                <th scope="col">img</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($students as $std)
                <tr>
                    <th scope="row">{{ $i++ }}</th>

                    <td>{{ $std->name }}</td>
                    <td>
                        <!-- Display the student image -->
                        <img src="{{ asset($std->image) }}" alt="Student Image" style="max-width: 100px; max-height: 100px;">
                    </td>
                    <td>

                        <a href="{{ route('edit_students', ['id' => $std->id]) }}" class="btn btn-dark">edit</a>
                    </td>

                </tr>
            @endforeach


    </table>
   </div>
@endsection
