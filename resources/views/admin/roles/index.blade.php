@extends('admin.master.master')

@section('title')
Role List | Resnova
@endsection


@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
@endsection

@section('body')

 <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="page-title-box">
                                <h4 class="font-size-18">Role List</h4>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Resnova</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Role List</a></li>

                                </ol>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="float-right d-md-block">
                                <div class="dropdown">
                                  @if (Auth::guard('admin')->user()->can('role.create'))
                                   <a href="{{ route('admin.roles.create') }}" type="button"  class="btn btn-raised btn-primary waves-effect" >Add Role</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    
<div class="table-responsive">
                                    <table  class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                               <th>SL</th>
                                    <th>Name</th>
                                    <th >Permission</th>
                                    <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ($roles as $role) 
                                <tr>
                                   <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td >
                                        @foreach ($role->permissions as $perm)
                                            <span class="badge badge-success mt-1">
                                               {{ $perm->name }}<br>
                                            </span>
                                        @endforeach
                                    </td>
                                                
                                                <td>
                                                    <div class="btn-group">
                                                        
@if (Auth::guard('admin')->user()->can('admin.edit'))

                                                        <a href="{{ route('admin.roles.edit',$role->id) }}" type="button" class="btn btn-primary waves-light waves-effect"><i class="fas fa-pencil-alt"></i></a>
@endif
@if (Auth::guard('admin')->user()->can('admin.delete'))

                                                        <button type="button" class="btn btn-primary waves-light waves-effect" onclick="deleteTag({{ $role->id }})"><i class="far fa-trash-alt"></i></button>

 <form id="delete-form-{{ $role->id }}" action="{{ route('admin.roles.delete',$role->id) }}" method="POST" style="display: none;">
  @method('DELETE')
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
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->



                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

           

@endsection

@section('scripts')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
     <script>
         /**
         * Check all the permissions
         */
         $("#checkPermissionAll").click(function(){
             if($(this).is(':checked')){
                 // check all the checkbox
                 $('input[type=checkbox]').prop('checked', true);
             }else{
                 // un check all the checkbox
                 $('input[type=checkbox]').prop('checked', false);
             }
         });
         function checkPermissionByGroup(className, checkThis){
            const groupIdName = $("#"+checkThis.id);
            const classCheckBox = $('.'+className+' input');
            if(groupIdName.is(':checked')){
                 classCheckBox.prop('checked', true);
             }else{
                 classCheckBox.prop('checked', false);
             }
         }
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












