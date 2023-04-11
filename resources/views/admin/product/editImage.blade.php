    	<div class="modal-header">
    		<h2 class="modal-title" id="exampleModalLabel">Update Product Information</h2>
    		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    	</div>
    	<div class="modal-body">
    	<form action="{{route('admin.product.productUpdateimg')}}"  method="post" enctype="multipart/form-data">
                    @csrf
<div class="form-group col-lg-12">
                                                <label>Image</label>
                                                <input type="file" class="form-control" name="image"  >
                                                 <input type="hidden" class="form-control" name="id" value="{{$new}}">

                                                 <input type="hidden" class="form-control" name="product_id" value="{{$ProductId}}">
                                                  <img src="{{asset('/')}}{{'public/upload/'.$imageEdit}}" height="50px" width="50px"/>
                                            </div>




        

                                            <button type="submit"
                                                                class="btn btn-primary btn-lg  waves-effect waves-light mr-1">
                                                                Update
                                                            </button>

            </form>
    	</div>


