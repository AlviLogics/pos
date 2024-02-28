<div class="menu">
        <div class="main-menu">
            <div class="scroll">
                <ul class="list-unstyled">
                    <li @if( $data['sideMenu'] == 'dashboard') class="active" @endif>
                    <a @if( request()->url() == route('dashboard') )
                             { class="active" } @endif href="{{ route('dashboard') }}" >
                            <i class="iconsminds-dashboard" ></i>
                            <span>Dashboard {{auth()->guard('web')->user()->can('Product access')}}</span>
                        </a>
                    </li>
                    
                    @if(auth()->guard('web')->user()->can('Brand access') || auth()->guard('web')->user()->can('Branch access'))
                    <li @if( $data['sideMenu'] == 'brand') class="active" @endif>
                        <a href="#locations">
                            <i class="iconsminds-location-2"></i> 
                            <span>Locations</span>
                        </a>
                    </li>
                    @endif
                    
                    @can('Product access')
                    <li @if( $data['sideMenu'] == 'product' || $data['sideMenu'] == 'packing'  ) class="active" @endif >
                        <a href="#productmanagement">
                            <i class="iconsminds-archery"></i> Product
                        </a>
                    </li>
                    @endcan

                    @can('Survay access')
                    <li @if( $data['sideMenu'] == 'incident') class="active" @endif >
                        <a href="#incidentmanagement">
                            <i class="iconsminds-air-balloon-1"></i> Incidents
                        </a>
                    </li>
                    @endcan

                    @can('Survay access')
                    <li @if( $data['sideMenu'] == 'survay') class="active" @endif >
                        <a @if( request()->url() == route('observation.index') )
                            { class="active" } @endif href="{{ route('observation.index') }}" >
                            <i class="iconsminds-green-energy"></i> Observation
                        </a>
                    </li>
                    @endcan

                    @can('Customer access')
                    <li @if(  $data['sideMenu'] == 'payment' || $data['sideMenu'] == 'vendor' || $data['sideMenu'] == 'purchase' ) class="active" @endif >
                    <a href="#customer">
                            <i class="iconsminds-communication-tower-2"></i> Purc
                        </a>
                    </li>
                    @endcan

                    @can('Sale access')
                    <li @if( $data['sideMenu'] == 'customer' || $data['sideMenu'] == 'employee' || $data['sideMenu'] == 'salespeople' ||$data['sideMenu'] == 'expense' ) class="active" @endif >
                    <a href="#sale">
                            <i class="iconsminds-communication-tower-2"></i> Sales
                        </a>
                    </li>
                    @endcan

                    @can('User access')
                    <li @if( $data['sideMenu'] == 'usermanagement') class="active" @endif >
                        <a href="#usermanagement">
                            <i class="iconsminds-user"></i> Users
                        </a>
                    </li>
                    @endcan
                    
                </ul>
            </div>
        </div>

        <div class="sub-menu">
            <div class="scroll">
                <ul class="list-unstyled" data-link="dashboard">
                    <li class="active">
                    <a @if( request()->url() == route('dashboard') )
                             { class="active" } @endif href="{{ route('dashboard') }}">
                            <i class="simple-icon-rocket"></i> <span class="d-inline-block">Home</span>
                        </a>
                    </li>                                   
                </ul>
                <ul class="list-unstyled" data-link="brands" id="brands">
                    
                    
                </ul>
                <ul class="list-unstyled" data-link="usermanagement">
                    @canany('User access')
                    <li>
                    <a @if( request()->url() == route('users.index') )
                                        { class="active" } @endif href="{{ route('users.index') }}">
                            <i class="simple-icon-picture"></i> <span class="d-inline-block">User Management</span>
                        </a>
                    </li>
                    @endcan
                    @canany('Role access','Role create','Role edit','Role delete')                    
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseAuthorization" aria-expanded="true"
                            aria-controls="collapseAuthorization" class="rotate-arrow-icon opacity-50">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Role Management</span>
                        </a>
                        <div id="collapseAuthorization" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                            @can('Role create')
                                <li>
                                <a @if( request()->url() == route('roles.create') )
                                { class="active" } @endif href="{{ route('roles.create') }}">
                                        <i class="simple-icon-user-following"></i> <span
                                            class="d-inline-block">Create New Role</span>
                                    </a>
                                </li>
                                @endcan
                                <li>
                                <a @if( request()->url() == route('roles.index') )
                                { class="active" } @endif href="{{ route('roles.index') }}">
                                        <i class="simple-icon-user-follow"></i> <span
                                            class="d-inline-block">Roles List</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                    @endcanany
                    @canany('Permission access','Permission add','Permission edit','Permission delete')
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseAuthorization" aria-expanded="true"
                            aria-controls="collapseAuthorization" class="rotate-arrow-icon opacity-50">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Permission Management</span>
                        </a>
                        <div id="collapseAuthorization" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                            @can('Permission create')
                                <li>
                                <a @if( request()->url() == route('permissions.create') )
                                { class="active" } @endif href="{{ route('permissions.create') }}">
                                        <i class="simple-icon-user-following"></i> <span
                                            class="d-inline-block">Create New Permissions</span>
                                    </a>
                                </li>
                                @endcan
                                <li>
                                <a @if( request()->url() == route('permissions.index') )
                                { class="active" } @endif href="{{ route('permissions.index') }}">
                                        <i class="simple-icon-user-follow"></i> <span
                                            class="d-inline-block">Permissions List</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                    @endcanany
                    
                </ul>
                <ul class="list-unstyled" data-link="locations">
                    @can('Brand access')
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseAuthorization" aria-expanded="true"
                            aria-controls="collapseAuthorization" class="rotate-arrow-icon opacity-50">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Brand Management</span>
                        </a>
                        <div id="collapseAuthorization" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                            @can('Brand create')
                                <li>
                                <a @if( request()->url() == route('brand.create') )
                                { class="active" } @endif href="{{ route('brand.create') }}">
                                        <i class="simple-icon-user-following"></i> <span
                                            class="d-inline-block">Create New Brand</span>
                                    </a>
                                </li>
                                @endcan
                                @can('Brand access')
                                <li>
                                <a @if( request()->url() == route('brand.index') )
                             { class="active" } @endif href="{{ route('brand.index') }}">
                                        <i class="simple-icon-user-follow"></i> <span
                                            class="d-inline-block">Brand List</span>
                                    </a>
                                </li>
                                @endcan
                                
                            </ul>
                        </div>
                    </li>
                    @endcan
                    
                    @can('Branch access')
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="true"
                            aria-controls="collapseProduct" class="rotate-arrow-icon opacity-50">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Branch Management</span>
                        </a>
                        <div id="collapseProduct" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                <a @if( request()->url() == route('branch.create') )
                                        { class="active" } @endif href="{{ route('branch.create') }}">
                                        <i class="simple-icon-credit-card"></i> <span class="d-inline-block">Create New Branch</span>
                                    </a>
                                </li>
                                <li>
                                    <a @if( request()->url() == route('type.index') )
                                        { class="active" } @endif href="{{ route('type.index') }}">
                                        <i class="simple-icon-list"></i> <span class="d-inline-block">Create Branch Type</span>
                                    </a>
                                </li>
                                <li>
                                    <a @if( request()->url() == route('brands_types.index') )
                                        { class="active" } @endif href="{{ route('brands_types.index') }}">
                                        <i class="simple-icon-list"></i> <span class="d-inline-block">Assign Branch Type</span>
                                    </a>
                                </li>
                                <li>
                                    <a @if( request()->url() == route('branch.index') )
                                        { class="active" } @endif href="{{ route('branch.index') }}">
                                        <i class="simple-icon-book-open"></i> <span class="d-inline-block">Branch Management</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endcan
                    @can('Location access')
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseForms" aria-expanded="true"
                            aria-controls="collapseForms" class="rotate-arrow-icon opacity-50">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Locations</span>
                        </a>
                        <div id="collapseForms" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                @can('Location access')
                                <li>
                                <a @if( request()->url() == route('location.index') )
                             { class="active" } @endif href="{{ route('location.index') }}">
                                        <i class="simple-icon-user-follow"></i> <span
                                            class="d-inline-block">Branches</span>
                                    </a>
                                </li>
                                
                                @endcan
                            </ul>
                        </div>
                    </li>
                    @endcan
                </ul>
                <ul class="list-unstyled" data-link="productmanagement">
                <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseAuthorization" aria-expanded="true"
                            aria-controls="collapseAuthorization" class="rotate-arrow-icon opacity-50">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Products</span>
                        </a>
                        <div id="collapseAuthorization" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                            @can('Product create')
                                <li>
                                <a @if( request()->url() == route('products.create') )
                                { class="active" } @endif href="{{ route('products.create') }}">
                                        <i class="simple-icon-user-following"></i> <span
                                            class="d-inline-block">Create Product</span>
                                    </a>
                                </li>
                                @endcan
                                @can('Product access')
                                <li>
                                <a @if( request()->url() == route('products.index') )
                             { class="active" } @endif href="{{ route('products.index') }}">
                                        <i class="simple-icon-user-follow"></i> <span
                                            class="d-inline-block">List of products</span>
                                    </a>
                                </li>
                                @endcan
                                
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseForms" aria-expanded="true"
                            aria-controls="collapseForms" class="rotate-arrow-icon opacity-50">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Packing</span>
                        </a>
                        <div id="collapseForms" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                @can('Packing access')
                                <li>
                                <a @if( request()->url() == route('packings.create') )
                             { class="active" } @endif href="{{ route('packings.create') }}">
                                        <i class="simple-icon-user-follow"></i> <span
                                            class="d-inline-block">Create Packing</span>
                                    </a>
                                </li>
                                @endcan
                                @can('Packing access')
                                <li>
                                <a @if( request()->url() == route('packings.index') )
                             { class="active" } @endif href="{{ route('packings.index') }}">
                                        <i class="simple-icon-user-follow"></i> <span
                                            class="d-inline-block">List of Packing</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseDataTables" aria-expanded="true"
                            aria-controls="collapseDataTables" class="rotate-arrow-icon opacity-50">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Stock</span>
                        </a>
                        <div id="collapseDataTables" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                @can('Stock access')
                                <li>
                                <a @if( request()->url() == route('stocks.index') )
                             { class="active" } @endif href="{{ route('stocks.index') }}">
                                        <i class="simple-icon-user-follow"></i> <span
                                            class="d-inline-block">Stocks</span>
                                    </a>
                                </li>
                                
                                @endcan
                            </ul>
                        </div>
                    </li>
                    

                </ul>

                
                <ul class="list-unstyled" data-link="incidentmanagement">
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseForms" aria-expanded="true"
                            aria-controls="collapseForms" class="rotate-arrow-icon opacity-50">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Incidents</span>
                        </a>
                        <div id="collapseForms" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                
                                @can('Survay access')
                                <li>
                                <a @if( request()->url() == route('incident.index') )
                                    { class="active" } @endif href="{{ route('incident.index') }}">
                                        <i class="simple-icon-user-follow"></i> <span
                                            class="d-inline-block">Incidents</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseForms" aria-expanded="true"
                            aria-controls="collapseForms" class="rotate-arrow-icon opacity-50">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">General</span>
                        </a>
                        <div id="collapseForms" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                @can('Survay access')
                                <li>
                                <a @if( request()->url() == route('complaint.index') )
                                    { class="active" } @endif href="{{ route('complaint.index') }}">
                                        <i class="simple-icon-user-follow"></i> <span
                                            class="d-inline-block">Complaint</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                </ul>
                <ul class="list-unstyled" data-link="customer">
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseForms" aria-expanded="true"
                            aria-controls="collapseForms" class="rotate-arrow-icon opacity-50">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">customers</span>
                        </a>
                        <div id="collapseForms" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                                @can('Salary access')
                                <li>    
                                <a @if( request()->url() == route('salaries.index') )
                                 { class="active" } @endif href="{{ route('salaries.index') }}">
                                        <i class="simple-icon-user-follow"></i> <span
                                            class="d-inline-block">Employee Salary</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                            <ul class="list-unstyled inner-level-menu">
                                @can('Expense access')
                                <li>
                                <a @if( request()->url() == route('payments.index') )
                             { class="active" } @endif href="{{ route('payments.index') }}">
                                        <i class="simple-icon-user-follow"></i> <span
                                            class="d-inline-block">Payment</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                            <ul class="list-unstyled inner-level-menu">
                                @can('Expense access')
                                <li>
                                <a @if( request()->url() == route('vendors.index') )
                             { class="active" } @endif href="{{ route('vendors.index') }}">
                                        <i class="simple-icon-user-follow"></i> <span
                                            class="d-inline-block">Vendors</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                            <ul class="list-unstyled inner-level-menu">
                                @can('Expense access')
                                <li>
                                <a @if( request()->url() == route('purchases.index') )
                             { class="active" } @endif href="{{ route('purchases.index') }}">
                                        <i class="simple-icon-user-follow"></i> <span
                                            class="d-inline-block">Purchases</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </div>
                    </li>                    
                </ul>

                <ul class="list-unstyled" data-link="sale">
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseForms" aria-expanded="true"
                            aria-controls="collapseForms" class="rotate-arrow-icon opacity-50">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">customers</span>
                        </a>
                        <div id="collapseForms" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                                @can('Sale access')
                                <li @if( $data['sideMenu'] == 'sale' ) class="active" @endif >
                                    <a  @if( request()->url() == route('sales.index') )
                                        { class="active" } @endif href="{{ route('sales.index') }}">
                                        <i class="iconsminds-sunglasses-w-3"></i> Sales
                                    </a>
                                </li>
                                @can('Customer access')
                                <li>
                                    <a @if( request()->url() == route('customers.index') )
                                        { class="active" } @endif href="{{ route('customers.index') }}">
                                        <i class="simple-icon-user-follow"></i> <span
                                            class="d-inline-block">Customer</span>
                                    </a>
                                </li>
                                @endcan
                                

                                <li>
                                    <a @if( request()->url() == route('employees.index') )
                                        { class="active" } @endif href="{{ route('employees.index') }}">
                                        <i class="simple-icon-user-follow"></i> <span
                                            class="d-inline-block">Employees</span>
                                    </a>
                                </li>
                                <li>
                                    <a @if( request()->url() == route('salespeople.index') )
                                        { class="active" } @endif href="{{ route('salespeople.index') }}">
                                        <i class="simple-icon-user-follow"></i> <span
                                            class="d-inline-block">Sales people</span>
                                    </a>
                                </li>
                                @endcan
                                @can('Salary access')
                                <li>    
                                <a @if( request()->url() == route('salaries.index') )
                                 { class="active" } @endif href="{{ route('salaries.index') }}">
                                        <i class="simple-icon-user-follow"></i> <span
                                            class="d-inline-block">Employee Salary</span>
                                    </a>
                                </li>
                                
                                @endcan
                            </ul>
                            <ul class="list-unstyled inner-level-menu">
                                @can('Expense access')
                                <li>
                                <a @if( request()->url() == route('expenses.index') )
                                    { class="active" } @endif href="{{ route('expenses.index') }}">
                                        <i class="simple-icon-user-follow"></i> <span
                                            class="d-inline-block">Expense</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                            
                        </div>
                    </li>                    
                </ul>

                <ul class="list-unstyled" data-link="obervation">
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseForms" aria-expanded="true"
                            aria-controls="collapseForms" class="rotate-arrow-icon opacity-50">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Obervations</span>
                        </a>
                        <div id="collapseForms" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                
                                @can('Survay access')
                                <li>
                                <a @if( request()->url() == route('touchpoint.index') )
                             { class="active" } @endif href="{{ route('touchpoint.index') }}">
                                        <i class="simple-icon-user-follow"></i> <span
                                            class="d-inline-block">Obervations</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </div>
                    </li>                    
                </ul>
                <ul class="list-unstyled" data-link="inspection">
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseForms" aria-expanded="true"
                            aria-controls="collapseForms" class="rotate-arrow-icon opacity-50">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Inspections</span>
                        </a>
                        <div id="collapseForms" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                
                                @can('Survay access')
                                <li>
                                <a @if( request()->url() == route('touchpoint.index') )
                             { class="active" } @endif href="{{ route('touchpoint.index') }}">
                                        <i class="simple-icon-user-follow"></i> <span
                                            class="d-inline-block">Inspections</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </div>
                    </li>                    
                </ul>

                <ul class="list-unstyled" data-link="menu" id="menuTypes">
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseMenuTypes" aria-expanded="true"
                            aria-controls="collapseMenuTypes" class="rotate-arrow-icon">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Menu Types</span>
                        </a>
                        <div id="collapseMenuTypes" class="collapse show" data-parent="#menuTypes">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="Menu.Default.html">
                                        <i class="simple-icon-control-pause"></i> <span
                                            class="d-inline-block">Default</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Menu.Subhidden.html">
                                        <i class="simple-icon-arrow-left mi-subhidden"></i> <span
                                            class="d-inline-block">Subhidden</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Menu.Hidden.html">
                                        <i class="simple-icon-control-start mi-hidden"></i> <span
                                            class="d-inline-block">Hidden</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Menu.Mainhidden.html">
                                        <i class="simple-icon-control-rewind mi-hidden"></i> <span
                                            class="d-inline-block">Mainhidden</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseMenuLevel" aria-expanded="true"
                            aria-controls="collapseMenuLevel" class="rotate-arrow-icon collapsed">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Menu Levels</span>
                        </a>
                        <div id="collapseMenuLevel" class="collapse" data-parent="#menuTypes">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="#">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">Sub
                                            Level</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="collapse" data-target="#collapseMenuLevel2"
                                        aria-expanded="true" aria-controls="collapseMenuLevel2"
                                        class="rotate-arrow-icon collapsed">
                                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Another
                                            Level</span>
                                    </a>
                                    <div id="collapseMenuLevel2" class="collapse">
                                        <ul class="list-unstyled inner-level-menu">
                                            <li>
                                                <a href="#">
                                                    <i class="simple-icon-layers"></i> <span class="d-inline-block">Sub
                                                        Level</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseMenuDetached" aria-expanded="true"
                            aria-controls="collapseMenuDetached" class="rotate-arrow-icon collapsed">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Detached</span>
                        </a>
                        <div id="collapseMenuDetached" class="collapse">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="#">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">Sub
                                            Level</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="dont-close-menu">
                            <a href="#">
                                <i class="simple-icon-arrow-right"></i> <span class="d-inline-block">Keep Sub Open</span>
                            </a>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </div>