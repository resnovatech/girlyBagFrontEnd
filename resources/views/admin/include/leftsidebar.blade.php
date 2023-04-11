@php
     $usr = Auth::guard('admin')->user();
 @endphp

<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li>
                    <a href="index.php" class="waves-effect">
                        <i class="ti-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-ticket-alt"></i>
                        <span>Period Track</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="today_period_list.php">Today's list</a></li>
                        <li><a href="next_2days_list.php">Next 2Days</a></li>
                        <li><a href="all_period_list.php">All</a></li>
                    </ul>
                </li>

                <li class="menu-title">Product</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-file-alt "></i>
                        <span>Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                    @if ($usr->can('category.create') || $usr->can('category.view') ||  $usr->can('category.edit') ||  $usr->can('category.delete'))
                        <li class="{{ Route::is('admin.category') || Route::is('admin.category.create') || Route::is('admin.category.edit') ? 'active' : '' }}"><a href="{{route('admin.category')}}">Parent Category</a></li>

                        @endif
                        @if ($usr->can('subcategory.create') || $usr->can('subcategory.view') ||  $usr->can('subcategory.edit') ||  $usr->can('subcategory.delete'))
                        <li class="{{ Route::is('admin.subcategory') || Route::is('admin.subcategory.create') || Route::is('admin.subcategory.edit') ? 'active' : '' }}">
                        <a href="{{route('admin.subcategory')}}">Child Category</a></li>
                        @endif
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-list "></i>
                        <span>Description</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                    @if ($usr->can('pdescription.create') || $usr->can('pdescription.view') ||  $usr->can('pdescription.edit') ||  $usr->can('pdescription.delete'))
                        <li><a href="{{route('admin.parent_description')}}">Parent type</a></li>
                        @endif

                        @if ($usr->can('cdescription.create') || $usr->can('cdescription.view') ||  $usr->can('cdescription.edit') ||  $usr->can('cdescription.delete'))
                        <li><a href="{{route('admin.child_description')}}">Child type</a></li>
                        @endif
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-bookmark-alt"></i>
                        <span>Product</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                    @if ($usr->can('product.create'))
                        <li><a href="{{route('admin.product.create')}}">Add Product </a></li>
                    @endif

                    @if ($usr->can('product.view') ||  $usr->can('product.edit') ||  $usr->can('product.delete'))
                        <li><a href="{{route('admin.product')}}">Product List</a></li>
                        @endif
                    </ul>
                </li>


                <li class="menu-title">Orders</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-shopping-cart "></i>
                        <span>Orders</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @if ($usr->can('order.create') || $usr->can('order.view') ||  $usr->can('order.edit') ||  $usr->can('order.delete'))
                        <li><a href="{{ route('admin.received_order') }}">Recieve Orders</a></li>
                        <li><a href="{{ route('admin.processing_order') }}">Processing Orders</a></li>
                        <li><a href="{{ route('admin.all_order')}}">Manage Orders</a></li>
                        <!--<li><a href="add_new_order.php">Create Orders</a></li>-->
                        @endif
                    </ul>
                </li>


                <li class="menu-title">Vendor & CRM</li>
                @if ($usr->can('supplier.create') || $usr->can('supplier.view') ||  $usr->can('supplier.edit') ||  $usr->can('supplier.delete'))
                <li class="{{ Route::is('admin.supplier') || Route::is('admin.supplier.create') || Route::is('admin.supplier.edit') ? 'active' : '' }}">
                    <a href="{{route('admin.supplier')}}" class="waves-effect">
                        <i class="fas fa-user-tag "></i>
                        <span>Supplier</span>
                    </a>
                </li>
              @endif
                <li>
                    <a href="add_new_client.php" class="waves-effect">
                        <i class="fas fa-user"></i>
                        <span>Clients</span>
                    </a>
                </li>

                <li class="menu-title">Coupon</li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fab fa-cc-discover"></i>
                        <span>Coupon</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @if ($usr->can('cupon.add') || $usr->can('cupon.view') ||  $usr->can('cupon.edit') ||  $usr->can('cupon.delete'))
                        <li><a href="{{ route('admin.cupon.create') }}">Add Coupon</a></li>
                        <li><a href="{{ route('admin.cupon') }}">List of Coupon</a></li>
                        @endif
                    </ul>
                </li>



                <li class="menu-title">Extra</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-money-bill "></i>
                        <span>Expense</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="add_expense.php">Total Expense</a></li>
                        <li><a href="expense_category.php">Expense Category</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-settings"></i>
                        <span>Settings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                    @if ($usr->can('brand.create') || $usr->can('brand.view') ||  $usr->can('brand.edit') ||  $usr->can('brand.delete'))
                        <li class="{{ Route::is('admin.brand') || Route::is('admin.brand.create') || Route::is('admin.brand.edit') ? 'active' : '' }}">
                        <a href="{{ route('admin.brand') }}">Add Brand</a></li>
                        @endif
                        @if ($usr->can('volume.create') || $usr->can('volume.view') ||  $usr->can('volume.edit') ||  $usr->can('volume.delete'))
                        <li class="{{ Route::is('admin.volume') || Route::is('admin.volume.create') || Route::is('admin.volume.edit') ? 'active' : '' }}">
                        <a href="{{route('admin.volume')}}">Add Volume</a></li>
                        @endif

                        @if ($usr->can('ship.create') || $usr->can('ship.view') ||  $usr->can('ship.edit') ||  $usr->can('ship.delete'))
                        <li class="{{ Route::is('admin.shipping') || Route::is('admin.shipping.create') || Route::is('admin.shipping.edit') ? 'active' : '' }}">
                        <a href="{{route('admin.shipping')}}">Add Shipping</a></li>
                        @endif
                        @if ($usr->can('shipcharge.create') || $usr->can('shipcharge.view') ||  $usr->can('shipcharge.edit') ||  $usr->can('shipcharge.delete'))
                        <li class="{{ Route::is('admin.shipping_charge') || Route::is('admin.shipping_charge.create') || Route::is('admin.shipping_charge.edit') ? 'active' : '' }}">
                        <a href="{{route('admin.shipping_charge')}}">Add Shipping Charge</a></li>
                        @endif
                        @if ($usr->can('reward.create') || $usr->can('reward.view') ||  $usr->can('reward.edit') ||  $usr->can('reward.delete'))
                        <li class="{{ Route::is('admin.reward') || Route::is('admin.reward.create') || Route::is('admin.reward.edit') ? 'active' : '' }}">
                        <a href="{{route('admin.reward')}}">Add Reward Point</a></li>

                        @endif


            <li class="{{ Route::is('admin.roles') || Route::is('admin.roles.create') || Route::is('admin.roles.edit') ? 'active' : '' }}">
            <a href="{{ route('admin.roles') }}">
            Role</a></li>



            <li class="{{ Route::is('admin.users') || Route::is('admin.users.create') || Route::is('admin.users.edit') ? 'active' : '' }}">
                <a href="{{ route('admin.users') }}">Users </a>
            </li>



                        <li class="{{ Route::is('admin.permission') || Route::is('admin.permission.create') || Route::is('admin.permission.edit') ? 'active' : '' }}">
                        <a href="{{ route('admin.permission') }}">Permission</a></li>

                    </ul>
                </li>


                <li>
                    <a href="#" class="waves-effect">
                        <i class="fas fa-envelope "></i>
                        <span>SMS</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="waves-effect">
                        <i class="fas fa-edit "></i>
                        <span>Email</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
