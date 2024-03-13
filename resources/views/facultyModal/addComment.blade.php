<div class="modal fade" id="comment{{ $oparch->id }}" tabindex="-1" aria-labelledby="comment{{ $oparch->id }}"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="groupAdd">Comments</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="" action="{{ route('faculty.addComment',['oparchID' => $oparch->id])}}" method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    <div class="messages">
                        @php
                        $com= Session::get('userID');

                        $messages=App\Models\messages::where('COMMENTOR', $com)->get();

                        @endphp

                        {{-- @foreach ($collection as $item)

                        @endforeach --}}
                        <div class="textL"> asdas</div>
                        <div class="textR"> asda</div>

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