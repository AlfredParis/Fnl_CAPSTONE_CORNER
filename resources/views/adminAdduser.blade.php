<div class="modal fade" id="adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                @if ($userAdd == 'student')
                    <form action="{{ route('admin.import.excel') }}" method="POST" enctype="multipart/form-data">
                        @csrf <div class="mb-3">

                            <label for="excel_file" class="form-label">Import Student</label>
                            <input type="file" name="excel_file" id="excel_file" accept=".xlsx, .xls"
                                class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Import Excel</button>

                    </form>
                @elseif ($userAdd == 'admin')
                @else
                @endif


                <form action="{{ route('admin.storeEmp', ['user' => $userAdd]) }}" method="POST">

                    @csrf

                    <div class="mb-3">
                        <label for="userID" class="form-label">  ID</label>
                        <input type="text" class="form-control" placeholder="Enter ID" name="userID"
                            value="{{ old('userID') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="fullname" class="form-label">  name</label>
                        <input type="text" class="form-control" placeholder=" name"
                            name="fullname" value="{{ old('fullname') }}" required>
                    </div>


                    @if ($userAdd == 'student')
                        <div class="mb-3">
                            <label for="ARCH_ID" class="form-label"> Archive ID</label>
                            <input type="text" class="form-control" placeholder="archive id" name="ARCH_ID"
                                value="{{ old('ARCH_ID') }}">
                        </div>
                    @else
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="PASSWORD"
                                id="myInput" value="{{ old('PASSWORD') }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    @endif



                    @if ($userAdd == 'student')
                        <div class="mb-3">
                            <label for="password" class="form-label">Student Password</label>
                            <input type="password" class="form-control" placeholder="Enter student password"
                                name="PASSWORD" id="myInput" value="{{ old('PASSWORD') }}" required>
                        </div>
                        <div class="showpass">
                            <input type="checkbox" onclick="myFunction()"> Show Password
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    @else
                    @endif


                </form>
            </div>


        </div>
    </div>
</div>



@endsection
