  {{-- modal for add --}}
  <div class="modal fade" id="edit_{{  $archive->ARCH_ID  }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Archive update</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">



<p class="text-style"> {{ $userAdd }} Add Form</p>
@if ($userAdd == 'student')
    <div class="top-left-anchor">

        <form action="{{ route('admin.import.excel') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" style=" margin-left: 1%;" name="excel_file" id="excel_file" accept=".xlsx, .xls"
                required>
            <br> <br>
            <button type="submit" class="glowbtn">Import Excel Student</button>

        </form>
    </div>
@elseif ($userAdd == 'admin')
@else
@endif


<form action="{{ route('admin.storeEmp', ['user' => $userAdd]) }}" method="POST">

                @csrf


                    <label for="userID"> {{ $userAdd }} ID</label>
                    <input type="text" class="formControl" placeholder="Enter ID" name="userID"
                        value="{{ old('userID') }}" required>

                    <label for="fullname"> {{ $userAdd }} name</label>
                    <input type="text" class="formControl" placeholder="{{ $userAdd }} name" name="fullname"
                        value="{{ old('fullname') }}" required>

                @if ($userAdd == 'student')


                        <label for="fullname"> Archive ID</label>
                        <input type="text" class="formControl" placeholder="archive id" name="ARCH_ID"
                            value="{{ old('ARCH_ID') }}">

                @else
                    <div class="formGroup">
                        <label for="password">Password</label>
                        <input type="password" class="formControl" placeholder="Password" name="PASSWORD" id="myInput"
                            value="{{ old('PASSWORD') }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                @endif


            </div>

        </div>
        <div class="check">
            @if ($userAdd == 'student')
                <div class="formGroup">
                    <br>
                    <label for="password">Student Password</label>
                    <input type="password" class="formControl" placeholder="Enter student password" name="PASSWORD"
                        id="myInput" value="{{ old('PASSWORD') }}" required>
                </div>
                <div class="showpass">
                    <input type="checkbox" onclick="myFunction()"> Show Password
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            @else
            @endif

        </div>

    </div>

</form>
</div>
