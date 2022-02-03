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
				 <a href="{{ route('dashboard') }}">
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

		<li class="{{ ($route == 'dashboard')? 'active' : '' }}">
          <a href="{{ route('dashboard') }}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>

        <li class="treeview {{ ($prefix == '/brand')? 'active' : '' }}">
          <a href="#">
            <i data-feather="message-circle"></i>
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
            <i data-feather="mail"></i> <span>Category</span>
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
            <i data-feather="file"></i>
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
              <i data-feather="message-circle"></i>
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
              <i data-feather="message-circle"></i>
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
              <i data-feather="message-circle"></i>
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
              <i data-feather="message-circle"></i>
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
              <i data-feather="message-circle"></i>
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
              <i data-feather="message-circle"></i>
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

        <li class="treeview">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Components</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
            <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
            <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
            <li><a href="components_sliders.html"><i class="ti-more"></i>Sliders</a></li>
            <li><a href="components_dropdown.html"><i class="ti-more"></i>Dropdown</a></li>
            <li><a href="components_modals.html"><i class="ti-more"></i>Modal</a></li>
            <li><a href="components_nestable.html"><i class="ti-more"></i>Nestable</a></li>
            <li><a href="components_progress_bars.html"><i class="ti-more"></i>Progress Bars</a></li>
          </ul>
        </li>

		<li class="treeview">
          <a href="#">
            <i data-feather="credit-card"></i>
            <span>Cards</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
			<li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
			<li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
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
