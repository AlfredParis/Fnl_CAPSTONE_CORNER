<div class="modal fade" id="adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ ucfirst($userAdd) }} Add Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">



                @if ($userAdd == 'student')
                <form action="{{ route('superAdmin.import.excel') }}" method="POST" enctype="multipart/form-data">
                    @csrf <div class="mb-3">

                        <label for="excel_file" class="form-label">Import Student</label>
                        <input type="file" name="excel_file" id="excel_file" accept=".xlsx, .xls" class="form-control"
                            required>
                    </div>
                    <button type="submit" class="btn btn-primary">Import Excel</button>

                </form>
                @else
                @endif


                <form action="{{ route('superAdmin.storeEmp', ['user' => $userAdd]) }}" method="POST">

                    @csrf

                    <div class="mb-3">
                        <label for="userID" class="form-label"> {{ ucfirst($userAdd) }} ID</label>
                        <input type="text" class="form-control" placeholder="Enter ID" name="userID"
                            value="{{ old('userID') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="fullname" class="form-label"> {{ ucfirst($userAdd) }} name</label>
                        <input type="text" class="form-control" placeholder="{{ ucfirst($userAdd) }} name"
                            name="fullname" value="{{ old('fullname') }}" required>
                    </div>



                    @if ($userAdd == 'faculty')
                    <label for="DEPT_ID">Position</label>

                    @php
                    $TEACH=App\Models\position::where('id', '!=', 2)->where('id', '!=', 1)->get();
                    @endphp
                    <select class="custom-select" name="POSITION_ID" id="POSITION_ID" style="max-width: 23rem">
                        <option value="">select Position</option>
                        @foreach ($TEACH as $item)
                        <option value="{{$item->id}}">{{ucfirst($item->POSITION_NAME)}}</option>
                        @endforeach
                    </select>
                    @else
                    @endif


                    <div class="mb-3">

                        @php
                        $CHMBAC=App\Models\department::where('PROG_ID', 2)->get();
                        $CTE=App\Models\department::where('PROG_ID', 1)->get();
                        $AGRI=App\Models\department::where('PROG_ID', 3)->get();

                        @endphp
                        <label for="DEPT_ID">Course</label>
                        <select class="custom-select" name="DEPT_ID" id="DEPT_ID" style="max-width: 23rem">
                            <option value="">select course</option>
                            @foreach ($CHMBAC as $item)
                            <option value="{{$item->id}}">{{$item->DEPT_NAME}}</option>
                            @endforeach
                            @foreach ($CTE as $item)
                            <option value="{{$item->id}}">{{$item->DEPT_NAME}}</option>
                            @endforeach
                            @foreach ($AGRI as $item)
                            <option value="{{$item->id}}">{{$item->DEPT_NAME}}</option>
                            @endforeach
                        </select>
                    </div>


                    @if ($userAdd == 'student')
                    <div class="mb-3">
                        <label for="password" class="form-label">Student Password</label>
                        <input type="password" class="form-control" placeholder="Enter student password" name="PASSWORD"
                            id="myInput">
                    </div>
                    <div class="showpass">
                        <input type="checkbox" onclick="myFunction()"> Show Password
                    </div>

                    @else

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="PASSWORD" id="myInput"
                            value="{{ old('PASSWORD') }}">
                    </div>
                    <div class="showpass">
                        <input type="checkbox" onclick="myFunction()"> Show Password
                    </div>

                    @endif



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </div>
            </form>

        </div>
    </div>
</div>