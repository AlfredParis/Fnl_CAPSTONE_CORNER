<div class="modal fade" id="saleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Archive Edit Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('admin.updateArch', ['ARCH_ID' => $archive->ARCH_ID]) }}" method="POST">
            @csrf
            @method('PUT')
          <div class="modal-body">

            <div class="form-group">
              <label> Product Name </label>
              <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name" required>
            </div>
            <div class="form-group">
              <label>Customer Name</label>
              <input type="text" name="customer_name" class="form-control" placeholder="Enter Customer Name" required>
            </div>
            <div class="form-group">
              <label>Quantity</label>
              <input type="number" name="quantity" class="form-control" placeholder="Enter Quantity" required>
            </div>
            <div class="form-group">
              <label>Date</label>
              <input type="date" name="date" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Unit Price</label>
              <input type="number" name="unit_price" class="form-control" placeholder="Enter Price" required>
            </div>
            <div class="form-group">
              <label>Upload Image</label>
              <input type="file" name="sale_image" id="sale_image" class="form-control" required>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="save_sale" class="btn btn-primary">Save</button>
          </div>
        </form>

      </div>
    </div>
  </div>
{{--
    <p class="text-style">Archive Edit Form</p>
    <form action="{{ route('admin.updateArch', ['ARCH_ID' => $archive->ARCH_ID]) }}" method="POST">

        <div class="checker">
            <div class="frm">
                <div class="chkContainier">

                    @csrf
                    @method('PUT')
                    <div class="formGroup">
                        <label for="archID">Archive ID</label>
                        <input class="formControl" type="text" id="archID" name="archID"
                            value="{{ old('ARCH_ID', $archive->ARCH_ID) }} " required>
                    </div>
                    @error('')
                        <span> {{ $message }}</span>
                    @enderror
                    <div class="formGroup">
                        <label for="name">Archive name</label>
                        <input class="formControl" type="text" name="name"
                            value="{{ old('ARCH_NAME', $archive->ARCH_NAME) }}" id="name" required>
                    </div>

                    @error('')
                        <span> {{ $message }}</span>
                    @enderror

                    <div class="formGroup">
                        <label for="gh">GitHub Link</label>
                        <input class="formControl" type="text" name="gh"
                            value="{{ old('GITHUB_LINK', $archive->GITHUB_LINK) }}" id="gh" required>
                    </div>
                    @error('')
                        <span> {{ $message }}</span>
                    @enderror



                    <div class="formGroup">
                        <label for="Status">Status:</label>
                        <select id="stat" name="stat">
                            <option value="approved">approved</option>
                            <option value="not approved">not approved</option>

                        </select>



                    </div>
                </div>
            </div>
            <div class="check">
                <br>
                <div class="formGroup">
                    <label for="abs">Enter a your abstract:</label>

                    <textarea class="abstract" type="text" name="abs" id="abs">{{ old('ABSTRACT', $archive->ABSTRACT) }}</textarea>
                </div>
                <div style="text-align: center">
                    <button type="submit" class="btn btn-primary">Update Archive</button>
                    <br>

                </div>
            </div>



        </div>
    </form> --}}
