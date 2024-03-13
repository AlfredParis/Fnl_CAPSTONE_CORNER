<div class="modal fade" id="comment{{ $oparch->id }}" tabindex="-1" aria-labelledby="comment{{ $oparch->id }}"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="groupAdd">Comments</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="" action="{{ route('subAdmin.addComment',['oparchID' => $oparch->id])}}" method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    <div class="messages">
                        @php
                        $com= Session::get('userID');

                        $messages=App\Models\messages::where('OP_ID',$oparch->id)->get();

                        @endphp
                        @foreach ($messages as $mess)
                        <div class="missage">
                            @php
                            $comName="";
                            $comNameEMP=App\Models\EMPLOYEE::where('EMP_ID',$mess->COMMENTOR)->value('NAME');

                            $comNameStud=App\Models\STUDENT::where('S_ID',$mess->COMMENTOR)->value('NAME');
                            if (isset($comNameEMP)) {
                            $comName=$comNameEMP;
                            }elseif (isset( $comNameStud)) {
                            $comName=$comNameStud;
                            }
                            @endphp

                            @if ($mess->COMMENTOR==$com)


                            <div class="textR"> {{$mess->MESSAGE}} <p class="sender">from: {{$comName}}</p>
                            </div>

                            @else


                            <div class="textL"> {{$mess->MESSAGE}} <p class="sender">from: {{$comName}}</p>
                            </div>


                            @endif


                        </div><br>
                        @endforeach



                        <div class="mess">

                            <input type="text" class="form-control" placeholder="Your Comment Here" name="MESSAGE"
                                value="{{ old('MESSAGE') }}" required>

                        </div>
                        <div class="send">
                            <button type="submit" class="btn btn-primary ">Send</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>






    </div>