<div class="modal fade" id="abs{{$GRP_det->id}}" tabindex="-1" aria-labelledby="abs{{$GRP_det->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="abs{{$GRP_det->id}}"><strong>{{$GRP_det->id}}</strong>
                    Certificate Form
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <form class="" action="{{ route('addCert',['grp_id' => $GRP_det->id]) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    <br>

                    <div class="input-group">
                        <span class="input-group-text">abstract</span>
                        <textarea class="form-control" placeholder="Leave a abstract here" name="feedback"
                            id="floatingTextarea2" style="height: 100px"></textarea>

                    </div>

            </div>



            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>

            </div>
            </form>
        </div>
    </div>
</div>






</div>