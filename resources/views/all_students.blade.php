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
                            <img src="{{ asset($std->image) }}" alt="Student Image"
                                style="max-width: 100px; max-height: 100px;">
                        </td>
                        <td>

                            <a class="btn btn-dark edit-btn" id="test" data-id="{{ $std->id }}">

                                {{-- href="{{ route('edit_students', ['id' => $std->id]) }}" --}}

                                Edit
                            </a>
                            <form method="POST" action="{{ route('student_soft_delete') }}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" value="{{ $std ? $std->id : '' }}" name="id">

                                <button  type="submit" class="btn btn-danger edit-btn" >

                                    {{-- href="{{ route('edit_students', ['id' => $std->id]) }}" --}}

                                    delete
                                </button>
                            </form>

                        </td>


                    </tr>
                @endforeach


        </table>
    </div>
@endsection


{{-- custom js --}}
@section('script')
    <script>
        $(document).ready(function() {
            // Handle click event on the Edit button
            $(document).on('click', '#test', function(e) {
                e.preventDefault();

                // Retrieve the student ID from the data-id attribute
                let studentId = $(this).data('id');

                // Construct the edit endpoint URL using the student ID
                let editEndpoint = `{{ route('edit_students', ['id' => 'studentIdPlaceholder']) }}`.replace(
                    'studentIdPlaceholder', studentId);

                // Open a Bootbox modal for editing and load form content using AJAX
                bootbox.dialog({
                    title: 'Edit Student',
                    message: '<div class="bootbox-body"><form id="editStudentForm">Loading form...</form></div>',
                    size: 'large',
                    buttons: {},
                    show: true
                });

                // Fetch the edit form content using AJAX
                $.ajax({
                    url: editEndpoint,
                    type: 'GET',
                    success: function(data) {
                        // Replace the message content with the fetched edit form
                        $('.bootbox-body').html(data);
                    },
                    error: function() {
                        // Handle errors if the form content cannot be fetched
                        $('.bootbox-body').html('Failed to load form.');
                    }
                });
            });
        });
    </script>
@endsection
