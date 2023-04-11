    	<div class="modal-header">
    		<h2 class="modal-title" id="exampleModalLabel">Add More Product Image</h2>
    		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    	</div>
    	<div class="modal-body">
    	<form action="{{route('admin.product.productaddimg')}}"  method="post" enctype="multipart/form-data">
                    @csrf
<div class="form-group col-lg-12">
                                                <label>Image</label>
                                                <input type="file" class="form-control" name="image"  >
                                                 <input type="hidden" class="form-control" name="product_id" value="{{$new}}">

                                               
                                                  
                                            </div>




        

                                            <button type="submit"
                                                                class="btn btn-primary btn-lg  waves-effect waves-light mr-1">
                                                                Add
                                                            </button>

            </form>
    	</div>


