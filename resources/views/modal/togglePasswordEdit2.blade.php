@php
$course= \App\Models\department::Get();

@endphp

<form action="{{ route('userUpdate', ['S_ID' => $Users->S_ID]) }}" method="POST">
    @csrf
    @method('PUT')


    <div class="form-group">
        <label for="fullname">Full name</label>
        <input class="form-control" type="text" name="NAME" value="{{ old('NAME', $profile->NAME) }}" id="fullname"
            required>
    </div>
    @error('')
    <span> {{ $message }}</span>
    @enderror

    <div class="form-group">
        <label for="PASSWORD">Password</label>
        <input id="passwordB{{ $i }}" class="form-control" type="password" name="PASSWORD" value=""
            placeholder="Enter your old password" required>
    </div>
    <div class="form-group">
        <label for="PASSWORD">Password</label>
        <input id="passwordB{{ $i }}" class="form-control" type="password" name="NewPASSWORD" value=""
            placeholder="Enter new password">
    </div>
    <div class="form-group">
        <div class="form-group">
            <label for="DEPT_ID">Course</label>

            @php
            $CHMBAC=App\Models\department::where('PROG_ID', 2)->get();
            $CTE=App\Models\department::where('PROG_ID', 1)->get();
            $AGRI=App\Models\department::where('PROG_ID', 3)->get();
            @endphp

            <select class="custom-select" name="DEPT_ID" id="DEPT_ID">
                <option value="">select your course</option>
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
    </div>

    <script>
        function togglePasswordEdit2() {

            var x = document.getElementById("passwordB{{ $i }}");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>