@extends('admin.master.master')
@section('title')
    Dashboard
@endsection


@section('body')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title-box">
                        <h4 class="font-size-18">Product Child Description</h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Resnova</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Product and Services</a></li>
                            <li class="breadcrumb-item active">Product Child Description</li>
                        </ol>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="float-right d-none d-md-block">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg" type="button">
                                <i class="far fa-calendar-plus  mr-2"></i> Add New Child Description
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Parent Category Name</th>
                                    <th>Descriptio Parent Category</th>
                                    <th>Descriptio Child Category</th>

                                    <th>Action</th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach ($cdes as $role)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>
                                            @foreach($pdes as $newcat)

                                                @if($newcat->id == $role->parent_id)

                                                    @foreach($categories_new as $newcatnew)

                                                        @if($newcatnew->id == $newcat->parent_id)

                                                            {{$newcatnew->category_name}}
                                                        @endif
                                                    @endforeach



                                                @endif
                                            @endforeach


                                        </td>
                                        <td>{{ $role->description_category }}</td>

                                        <td>{{ $role->description_child}}</td>

                                        <td>
                                            <div class="btn-group">
                                                @if (Auth::guard('admin')->user()->can('cdescription.edit'))
                                                    <a href="{{ route('admin.child_description.edit', $role->id) }}"
                                                       type="button" class="btn btn-primary waves-light waves-effect"><i class="fas fa-pencil-alt"></i></a>
                                                @endif

                                                @if (Auth::guard('admin')->user()->can('cdescription.delete'))
                                                    <button type="button" onclick="deleteTag({{ $role->id}})" class="btn btn-danger waves-light waves-effect">
                                                        <i class="far fa-trash-alt"></i></button>
                                                    <form id="delete-form-{{ $role->id }}" action="{{ route('admin.child_description.destroy',$role->id) }}" method="POST" style="display: none;">

                                                        @csrf

                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->



        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <!--  Modal content for the above example -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Add New Child Description</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form class="custom-validation" action="{{route('admin.child_description.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">



                                        <div class="form-group">
                                            <label>Description Parent Category Name:</label>


                                            <select class="form-control" id="subcategory" name="description_category">
                                                @foreach($pdes as $descriptuion_detail)


                                                    <option value="{{ $descriptuion_detail->description_category }}">{{ $descriptuion_detail->description_category }}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="form-group ">
                                            <label>Child Category Name:</label>
                                            <input type="text" class="form-control" name="description_child" />
                                        </div>

                                    </div>
                                </div>

                            </div> <!-- end col -->


                            <div class="col-lg-12">
                                <div class="float-right d-none d-md-block">
                                    <div class="form-group mb-4">
                                        <div>
                                            <button type="submit" class="btn btn-primary btn-lg  waves-effect waves-light mr-1">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $("#category").on('change',function(){
                var catId=$(this).val();
                //ajax

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:"{{route('admin.select_people')}}",
                    type:"POST",
                    data:{'catId':catId},
                    dataType:'json',
                    success:function(data){
                        console.log(data);
                        $('#subcategory').empty();
                        $.each(data,function(index,subcatObj){

                            $("#subcategory").append('<option value ="'+subcatObj.description_category+'">'+subcatObj.description_category+'</option>');
                        });

                    },
                    error:function(){
                        alert("error ase");
                    }
                });
                //endajax
            });
        });
    </script>
    <script type="text/javascript">
        function deleteTag(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endsection
