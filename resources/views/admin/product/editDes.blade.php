    	<div class="modal-header">
    		<h2 class="modal-title" id="exampleModalLabel">Update Product Information</h2>
    		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    	</div>
    	<div class="modal-body">
    	<form action="{{route('admin.product.productUpdate')}}"  method="post" enctype="multipart/form-data">
                    @csrf
<div class="form-group col-lg-12">
                                                <label>Parent Description</label>
                                                <input type="text" class="form-control" name="pdes" value="{{$desedt}}" readonly="">
                                                 <input type="hidden" class="form-control" name="id" value="{{$new}}">

                                                 <input type="hidden" class="form-control" name="product_id" value="{{$desedt_id}}">
                                            </div>




            <div class="form-group col-lg-12">
                                                <label>Child Description</label>
                                                <select name="cdes"   class="form-control ">
@foreach($cdesnewedit as $newtestnew)

<option value="{{$newtestnew->description_child}}"  >{{$newtestnew->description_child}}</option>

@endforeach
</select>
                                            </div>

                                            <button type="submit"
                                                                class="btn btn-primary btn-lg  waves-effect waves-light mr-1">
                                                                Update
                                                            </button>

            </form>
    	</div>


