@extends('master')
@section('title', 'Create new record')
@section('content')

<h4 class="text-center">Create new record</h4>
<p>Required fields <span class="errorClass">*</span></p>
<form action="{{url('sample_record')}}" id="frm">
    <div class="row">
        <div class="col-md-4 form-group">
            <label for="name">Name <span class="errorClass">*</span></label>
            <input type="text" name="name" id="name" class="form-control required" maxlength="50" required
                placeholder="Enter your name">
        </div>
        <div class="col-md-4 form-group">
            <label for="father_name">Father Name <span class="errorClass">*</span></label>
            <input type="text" name="father_name" id="father_name" class="form-control required" maxlength="50" required
                placeholder="Enter your father name">
        </div>
        <div class="col-md-4 form-group">
            <label for="dob">DOB <span class="errorClass">*</span></label>
            <input type="date" name="dob" id="dob" class="form-control required" required placeholder="Enter your DOB">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 form-group">
            <label for="gender">Gender <span class="errorClass">*</span></label>
            <select name="gender" id="gender" class="form-control required" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <div class="col-md-4 form-group">
            <label for="contact">Contact <span class="errorClass">*</span></label>
            <input type="number" name="contact" id="contact" class="form-control required" maxlength="10" required
                placeholder="Enter your contact" minlength="10">
        </div>
        <div class="col-md-4 form-group">
            <label for="pdf">PDF Attachment <span class="errorClass">*</span></label>
            <input type="file" name="pdf" id="pdf" class="form-control required" required accept="application/pdf">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 form-group">
            <label for="image">Image <span class="errorClass">*</span></label>
            <input type="file" name="image" id="image" class="form-control required" required accept="image/*">
        </div>
        <div class="col-md-4 form-group">
            <label for="email">Email <span class="errorClass">*</span></label>
            <input type="email" name="email" id="email" class="form-control required" maxlength="100" required
                placeholder="Enter your email">
        </div>
        <div class="col-md-4 form-group">
            <label for="password">Password <span class="errorClass">*</span></label>
            <input type="password" id="password" name="password" class="form-control required" maxlength="50" required
                placeholder="Make your password">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 form-group">
            <label for="address">Address <span class="errorClass">*</span></label>
            <textarea name="address" id="address" class="form-control required" rows="3" required></textarea>
        </div>
    </div>
    <div>
        <input type="button" class="btn btn-primary" value="Submit" id="btnsubmit">
    </div>
</form>

@stop

@section('footer')
<script>
    $(document).on('click', '#btnsubmit', function () {
            var validityState = true;
            $('.required').each(function () {
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
            formData.append('pdf', $('#pdf')[0].files[0]);
            formData.append('image', $('#image')[0].files[0]);
            formData.append('name', $('#name').val());
            formData.append('father_name', $('#father_name').val());
            formData.append('dob', $('#dob').val());
            formData.append('gender', $('#gender').val());
            formData.append('contact', $('#contact').val());
            formData.append('email', $('#email').val());
            formData.append('password', $('#password').val());
            formData.append('address', $('#address').val());

            $.ajax({
                type: 'POST',
                url: $('#frm').attr('action'),
                data: formData,
                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    alert(data.message);
                    if(data.message=="Successfully registered" || data.message=="Successfully updated"){
                        window.location.reload();
                    }
                },
                error: function (data) {
                    console.log("error");
                    console.log(data);
                }
            });
        }
</script>
@stop