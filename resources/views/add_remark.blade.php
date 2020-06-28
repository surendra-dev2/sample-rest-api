@extends('master')
@section('title', 'add remark')
@section('content')

<h4 class="text-center">Add remark to {{$email}}</h4>
<p>Required fields <span class="errorClass">*</span></p>
<form action="{{url('remark')}}" id="frm">
    <input type="hidden" value="{{$email}}" id="email">
    <div class="row">
        <div class="col-md-12 form-group">
            <label for="tags">Tags <span class="errorClass">*</span></label>
            <select name="tags" id="tags" class="form-control required" required multiple>
                <option value="New">New Tag</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 form-group">
            <label for="remark">Remark <span class="errorClass">*</span></label>
            <textarea name="remark" id="remark" class="form-control required" rows="3" required></textarea>
        </div>
    </div>
    <div>
        <input type="button" class="btn btn-primary" value="Submit" id="btnsubmit">
    </div>
</form>

@stop

@section('footer')
<script>
    $(document).ready(function() {
        $('#tags').select2({
            placeholder: 'Select an option',
            tags:true
        });
    });
    $(document).on('click', '#btnsubmit', function() {
        var validityState = true;
        $('.required').each(function() {
            if ($(this)[0].validity.valid == false) {
                validityState = false;
            }
        });

        if (validityState) {
            SaveData();
        } else {
            alert('Fill the required fields');
        }
    });

    function SaveData() {
        var formData = new FormData();
        formData.append('_token', "{{ csrf_token() }}");
        formData.append('email', $('#email').val());
        formData.append('tags', $('#tags').val());
        formData.append('remark', $('#remark').val());

        $.ajax({
            type: 'POST',
            url: $('#frm').attr('action'),
            data: formData,
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                alert(data.message);
                if (data.message == "Successfully updated") {
                    window.location.href="{{url('records')}}";
                }
            },
            error: function(data) {
                console.log("error");
                console.log(data);
            }
        });
    }
</script>
@stop