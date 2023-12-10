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
                       <button type="button" class="btn btn-danger" id="test">Danger</button>
                    </td>


                </tr>
            @endforeach


    </table>
   </div>
@endsection


{{-- custom js --}}
@section('script')
<script>
    $(document).ready(function () {
        //modal show 
        $(document).on('click','#test', function () {
            let dialog = bootbox.dialog({
                                title: 'A custom dialog with buttons and callbacks',
                                message: "<p>This dialog has buttons. Each button has it's own callback
                                function.</p>",
                                size: 'large',
                                buttons: {
                                cancel: {
                                label: "I'm a cancel button!",
                                className: 'btn-danger',
                                callback: function(){
                                console.log('Custom cancel clicked');
                                }
                                },
                                noclose: {
                                label: "I don't close the modal!",
                                className: 'btn-warning',
                                callback: function() {
                                console.log('Custom button clicked');
                                return false;
                                }
                                },
                                ok: {
                                label: "I'm an OK button!",
                                className: 'btn-info',
                                callback: function() {
                                console.log('Custom OK clicked');
                                }
                                }
                                }
                                });
            
        });
    });
</script>
@endsection
