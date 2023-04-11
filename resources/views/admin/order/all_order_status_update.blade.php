<div class="modal-header">
    <h2 class="modal-title" id="exampleModalLabel">Update Order Status</h2>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
<div class="modal-body">
    <form action="{{route('admin.all_order_status_update_store')}}"  method="post" enctype="multipart/form-data">
        @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group ">
                                    <label>Order Id</label>
                                    <input type="text" class="form-control" value="{{ $status_info->pin }}" readonly/>
                                    <input type="hidden" class="form-control" name="id" value="{{ $status_info->id }}" />
                                </div>
                                <div class="form-group ">
                                    <label>Status</label>
                                    <select  class="form-control" name="status">
                                     <option value="0" {{ $status_info->status == 0 ? 'selected':'' }}>Pending</option>
                                     <option value="1" {{ $status_info->status == 1 ? 'selected':'' }}>Confirmed</option>
                                     <option value="2" {{ $status_info->status == 2 ? 'selected':'' }}>Processing</option>
                                     <option value="3" {{ $status_info->status == 3 ? 'selected':'' }}>Cancelled</option>

                                    </select>
                                </div>






                            </div>
                        </div>

                    </div> <!-- end col -->


                    <div class="col-lg-12">
                        <div class="float-right d-none d-md-block">
                            <div class="form-group mb-4">
                                <div>
                                    <button type="submit" class="btn btn-primary btn-lg  waves-effect waves-light mr-1">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </form>





    </form>
</div>
