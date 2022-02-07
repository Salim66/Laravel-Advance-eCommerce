@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{ url('/') }}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">
						  <img class="backend_logo" src="{{ URL::to('/backend/') }}/images/favicon.png" alt="">
						  <h3><b>Elegant Furnitur QR</h3>
					 </div>
				</a>
			</div>
        </div>

      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">

		<li class="{{ ($route == 'admin.dashboard')? 'active' : '' }}">
          <a href="{{ route('admin.dashboard') }}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>

        <li class="treeview {{ ($prefix == '/brand')? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-superpowers" aria-hidden="true"></i>
            <span>Brands</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'all.brand')? 'active' : '' }}"><a href="{{ route('all.brand') }}"><i class="ti-more"></i>All Brand</a></li>
          </ul>
        </li>

        <li class="treeview {{ ($prefix == '/category')? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-codiepie" aria-hidden="true"></i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'all.category')? 'active' : '' }}"><a href="{{ route('all.category') }}"><i class="ti-more"></i>All Category</a></li>
            <li class="{{ ($route == 'all.subcategory')? 'active' : '' }}"><a href="{{ route('all.subcategory') }}"><i class="ti-more"></i>All SubCategory</a></li>
            <li class="{{ ($route == 'all.subsubcategory')? 'active' : '' }}"><a href="{{ route('all.subsubcategory') }}"><i class="ti-more"></i>All Sub->SubCategory</a></li>
          </ul>
        </li>

        <li class="treeview {{ ($prefix == '/product')? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-product-hunt" aria-hidden="true"></i>
            <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'add.product')? 'active' : '' }}"><a href="{{ route('add.product') }}"><i class="ti-more"></i>Add Product</a></li>
            <li class="{{ ($route == 'manage.product')? 'active' : '' }}"><a href="{{ route('manage.product') }}"><i class="ti-more"></i>Manage Product</a></li>
          </ul>
        </li>

        <li class="treeview {{ ($prefix == '/slider')? 'active' : '' }}">
            <a href="#">
            <i class="fa fa-slideshare" aria-hidden="true"></i>
              <span>Slider</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'manage.slider')? 'active' : '' }}"><a href="{{ route('manage.slider') }}"><i class="ti-more"></i>Manage Slider</a></li>
            </ul>
        </li>


        <li class="treeview {{ ($prefix == '/coupons')? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-diamond" aria-hidden="true"></i>
              <span>Coupon</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'manage.coupon')? 'active' : '' }}"><a href="{{ route('manage.coupon') }}"><i class="ti-more"></i>Manage Coupon</a></li>
            </ul>
        </li>


        <li class="treeview {{ ($prefix == '/shipping')? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-truck" aria-hidden="true"></i>
              <span>Shipping</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'manage.division')? 'active' : '' }}"><a href="{{ route('manage.division') }}"><i class="ti-more"></i>Ship Division</a></li>
              <li class="{{ ($route == 'manage.district')? 'active' : '' }}"><a href="{{ route('manage.district') }}"><i class="ti-more"></i>Ship District</a></li>
              <li class="{{ ($route == 'manage.state')? 'active' : '' }}"><a href="{{ route('manage.state') }}"><i class="ti-more"></i>Ship State</a></li>
            </ul>
        </li>


        <li class="treeview {{ ($prefix == '/settings')? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-cog" aria-hidden="true"></i>
              <span>Settings</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'manage.logo')? 'active' : '' }}"><a href="{{ route('manage.logo') }}"><i class="ti-more"></i>Logo</a></li>
              <li class="{{ ($route == 'manage.favicon')? 'active' : '' }}"><a href="{{ route('manage.favicon') }}"><i class="ti-more"></i>Favicon</a></li>
              <li class="{{ ($route == 'manage.contact-info')? 'active' : '' }}"><a href="{{ route('manage.contact-info') }}"><i class="ti-more"></i>Contact Info</a></li>
              <li class="{{ ($route == 'manage.social')? 'active' : '' }}"><a href="{{ route('manage.social') }}"><i class="ti-more"></i>Social Media</a></li>
            </ul>
        </li>


        <li class="treeview {{ ($prefix == '/pages')? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-file-text" aria-hidden="true"></i>
              <span>Pages</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'manage.privacy-policy')? 'active' : '' }}"><a href="{{ route('manage.privacy-policy') }}"><i class="ti-more"></i>Privacy Policy</a></li>
              <li class="{{ ($route == 'manage.return-policy')? 'active' : '' }}"><a href="{{ route('manage.return-policy') }}"><i class="ti-more"></i>Return Policy</a></li>
              <li class="{{ ($route == 'manage.terms')? 'active' : '' }}"><a href="{{ route('manage.terms') }}"><i class="ti-more"></i>Terms & Conditions</a></li>
            </ul>
        </li>
        
        <li class="treeview {{ ($prefix == '/contacts')? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-envelope" aria-hidden="true"></i>
              <span>Contact Us</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'manage.contact-us')? 'active' : '' }}"><a href="{{ route('manage.contact-us') }}"><i class="ti-more"></i>All Contacts</a></li>
            </ul>
        </li>

        <li class="header nav-small-cap">User Interface</li>

        <li class="treeview {{ ($prefix == '/orders')? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-first-order" aria-hidden="true"></i>
              <span>Orders</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'pending.orders')? 'active' : '' }}"><a href="{{ route('pending.orders') }}"><i class="ti-more"></i>Pending Orders</a></li>
              <li class="{{ ($route == 'confirmed.orders')? 'active' : '' }}"><a href="{{ route('confirmed.orders') }}"><i class="ti-more"></i>Confirmed Orders</a></li>
              <li class="{{ ($route == 'processing.orders')? 'active' : '' }}"><a href="{{ route('processing.orders') }}"><i class="ti-more"></i>Processing Orders</a></li>
              <li class="{{ ($route == 'picked.orders')? 'active' : '' }}"><a href="{{ route('picked.orders') }}"><i class="ti-more"></i>picked Orders</a></li>
              <li class="{{ ($route == 'shipped.orders')? 'active' : '' }}"><a href="{{ route('shipped.orders') }}"><i class="ti-more"></i>Shipped Orders</a></li>
              <li class="{{ ($route == 'delivered.orders')? 'active' : '' }}"><a href="{{ route('delivered.orders') }}"><i class="ti-more"></i>Delivered Orders</a></li>
              <li class="{{ ($route == 'cancel.orders')? 'active' : '' }}"><a href="{{ route('cancel.orders') }}"><i class="ti-more"></i>Cancel Orders</a></li>
              <li class="{{ ($route == 'return.orders')? 'active' : '' }}"><a href="{{ route('return.orders') }}"><i class="ti-more"></i>Return Orders</a></li>
            </ul>
        </li>


        <li class="treeview {{ ($prefix == '/reports')? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-bug" aria-hidden="true"></i>
              <span>Reports</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'all.reports')? 'active' : '' }}"><a href="{{ route('all.reports') }}"><i class="ti-more"></i>All Reports</a></li>
            </ul>
        </li>


        <li class="treeview {{ ($prefix == '/alluser')? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-users" aria-hidden="true"></i>
              <span>Users</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'all.user')? 'active' : '' }}"><a href="{{ route('all.user') }}"><i class="ti-more"></i>All User</a></li>
            </ul>
        </li>

      </ul>
    </section>

	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>
