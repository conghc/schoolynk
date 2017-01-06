@extends('layouts.admin')
@section('header-2')
     Sponsor list
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped list">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th class="no-icon"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($schoolynks as $schoolynk)
                            <tr data-id="{{ $schoolynk->id }}">
                                <td>{{ $schoolynk->name }}</td>
                                <td>{{ $schoolynk->email}}</td>
                                <td class='ta-c'><i class="glyphicon glyphicon-remove-circle text-danger remove-school"></i></td>
                            </tr>
                    @endforeach
                </tbody>
            </table>
            <form id="TheForm" method="post" action="{{ route('admin.schoolynk.destroy', ['id' => 0]) }}">
                {!! csrf_field() !!}
                <input id="removeID" type="hidden" name="id" value="" />
                <input type="hidden" name="_method" value="delete" />
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function(){
        $('.list').DataTable();
        $(document).on('click', '.remove-school', function(){
            var id = $(this).closest('tr').data('id');
            bootbox.confirm("Are you sure?", function(result) {
                if(result){
                    $('#removeID').val(id);
                    var url = $('#TheForm').attr('action');
                    $('#TheForm').attr('action', url + id);
                    $('#TheForm').submit();
                }
            }); 
        });
    })
    
</script>
@endsection