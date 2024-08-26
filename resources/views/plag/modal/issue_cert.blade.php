<div class="modal fade" id="issue_cert{{$archive->id}}" tabindex="-1" aria-labelledby="issue_cert{{ $archive->id }}"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="issue_cert{{ $archive->id }}"><strong> {{$archive->GRP_NAME}}</strong>
                    Certificate Form
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <form class="" action="{{ route('addCert',['grp_id' => $archive->id]) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    <div class="custom-file">

                        <label class="form-label" for="file">Result:(PDF report)</label>
                        <input class="form-control" type="file" name="file" id="file" accept=".pdf">
                    </div>


                    <div class="dropdown">
                        <label for="Status" class="form-label">Status:</label>
                        <select id="stat" name="stat" class="form-select" aria-label="Default select example">
                            <option value="passed">Passed</option>
                            <option value="failed">Failed</option>
                        </select>


                        <br>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">feedback</span>
                        <textarea class="form-control" placeholder="Leave a feedback here" name="feedback"
                            id="floatingTextarea2" style="height: 100px"></textarea>

                    </div>




            </div>

            <div class="modal-footer">
                <a href="https://www.grammarly.com/plagiarism-checker" class="btn btn-success" target="_blank">Open
                    plagiarism checker</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Archive</button>

            </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
                new MultiSelectTag("countries");
            });
    </script>




</div>