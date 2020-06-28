@extends('master')
@section('title', 'Record List')
@section('content')

<h4 class="text-center mb-5">Record List</h4>
<p>Click on Filters name to toogle(show/hide) column</p>
<div>
    Toggle column: <a class="toggle-vis" data-column="0">Name</a> - <a class="toggle-vis" data-column="1">Father
        Name</a> -
    <a class="toggle-vis" data-column="2">Contact</a> - <a class="toggle-vis" data-column="3">Email</a> - <a
        class="toggle-vis" data-column="4">Image</a> - <a class="toggle-vis" data-column="5">PDF</a>
    - <a class="toggle-vis" data-column="6">Gender</a> - <a class="toggle-vis" data-column="7">Address</a>
    - <a class="toggle-vis" data-column="8">DOB</a>- <a class="toggle-vis" data-column="9">Password</a>
</div>
<div class="table-responsive mt-5">
    <table class="table table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <th>Action</th>
                <th>Name</th>
                <th>Father Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Image</th>
                <th>PDF</th>
                <th>Gender</th>
                <th>Address</th>
                <th>DOB</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>

@stop

@section('footer')
<script>
    $(document).ready(function() {
        var table = $('table').DataTable( {
            "ajax": "{{url('sample_record')}}",
            "columns": [
            { "data": "email" },
            { "data": "name" },
            { "data": "father_name" },
            { "data": "contact" },
            { "data": "email" },
            { "data": "image" },
            { "data": "pdf" },
            { "data": "gender" },
            { "data": "address" },
            { "data": "dob" },
            { "data": "password" },
            ],
            "columnDefs": [
                {
                "targets": 0,
                "data": 'email',
                "render":  function ( data, type, row, meta ){
                    return "<a target='_blank' href='records/"+data+"'>Add remark</a>";
                }},
                {
                "targets": 5,
                "data": 'image',
                "render":  function ( data, type, row, meta ){
                    return "<img src='/image/"+data+"' style='width:100px;height:auto;'>";
                }},
                {
                "targets": 6,
                "data": 'pdf',
                "render":  function ( data, type, row, meta ){
                    return "<a target='_blank' href='/pdf/"+data+"'>"+data+"</a>";
                }
            } ]
        } );

        table.column(6).visible(false);
        table.column(7).visible(false);
        table.column(8).visible(false);
        table.column(9).visible(false);
        table.column(10).visible(false);

        $('a.toggle-vis').on( 'click', function (e) {
        e.preventDefault();
 
        // Get the column API object
        var column = table.column( $(this).attr('data-column') );
 
        // Toggle the visibility
        column.visible( ! column.visible() );
    } );
    });
</script>
@stop