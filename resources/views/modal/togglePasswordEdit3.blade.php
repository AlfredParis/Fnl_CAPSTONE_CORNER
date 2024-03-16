<form action="{{ route('userUpdate', ['S_ID' => $Users->EMP_ID]) }}" method="POST">
    @csrf
    @method('PUT')
    @php

    @endphp

    <div class="form-group">
        <label for="fullname">Name <span class="required">*</span> </label>
        <input class="form-control" type="text" name="NAME" value="{{ old('NAME', $profile->NAME) }}" id="fullname"
            required>
    </div>


    <div class="form-group">
        <label for="password">Current Password  <span class="required">*</span></label>
        <input class="form-control" type="password" name="PASSWORD" placeholder="Enter here your old password" required>
    </div>

    <div class="form-group">
        <label for="password">New Password</label>
        <input class="form-control" type="password" name="NewPASSWORD" placeholder="Enter here your new password" id="inputpass" >

    </div>

    <script>
        function togglePasswordEdit3() {

            var x = document.getElementById("inputpass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
