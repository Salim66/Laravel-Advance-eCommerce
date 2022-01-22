<div class="nav-main">
    <div class="topbar">
       <div class="container">
          <div class="topbar-inner">
             <div class="row align-items-center justify-content-center justify-content-lg-between">
                <div class="topbar-item">
                   <div class="topbar-brand">
                      <a href="index.html">
                      <img src="{{ asset('frontend/') }}/assets/images/logo-secondary.png" alt="logo">
                      </a>
                   </div>
                </div>
                <div class="topbar-item">
                   <div class="topbar-search topbar-search-secondcolor">
                      <form>
                         <input type="text" class="form-control" placeholder="Search product">
                         <button class="btn main-btn main-btn-secondary" type="submit">Search</button>
                      </form>
                   </div>
                </div>
                <div class="topbar-item topbar-item-rightside">
                   <div class="topbar-action">
                      <div class="topbar-action-item topbar-action-item-secondcolor">
                        @auth
                        <a href="login.html">
                           <i class="flaticon-user"></i>
                           <span>User Profile</span>
                        </a>
                        @else
                        <a href="{{ route('login') }}">
                           <i class="flaticon-user"></i>
                           <span>Login</span>
                        </a>
                        @endauth
                      </div>
                      <div class="topbar-action-item topbar-action-item-secondcolor">
                         <a href="wishlist.html">
                         <i class="flaticon-like"></i>
                         <span>Wishlist</span>
                         <span class="topbar-action-counter">05</span>
                         </a>
                      </div>
                      <div class="topbar-action-item topbar-action-item-secondcolor cart-option-dropdown">
                         <a href="#" class="cartbtn">
                         <i class="flaticon-shopping-cart"></i>
                         <span>Cart</span>
                         <span class="topbar-action-counter">02</span>
                         </a>
                         <div class="cart-modal cart-modal-secondcolor">
                            <div class="cart-close-btn close-btn">
                               <i class="flaticon-close"></i>
                            </div>
                            <div class="cart-modal-products">
                               <div class="cart-modal-product">
                                  <div class="cart-product-info">
                                     <a href="single-shop.html">
                                        <div class="cart-product-thumb">
                                           <img src="assets/images/products/product-13.png" alt="product">
                                        </div>
                                        <div class="cart-product-details">
                                           <h3>Stylish Chair</h3>
                                           <p>Price: <span>$200.0</span></p>
                                           <p>Qty: <span>2 pcs</span></p>
                                        </div>
                                     </a>
                                  </div>
                                  <div class="cart-product-remove">
                                     <a href="#">
                                     <i class="flaticon-delete"></i>
                                     </a>
                                  </div>
                               </div>
                               <div class="cart-modal-product">
                                  <div class="cart-product-info">
                                     <a href="single-shop.html">
                                        <div class="cart-product-thumb">
                                           <img src="assets/images/products/product-15.png" alt="product">
                                        </div>
                                        <div class="cart-product-details">
                                           <h3>Furnished Sofa</h3>
                                           <p>Price: <span>$300.0</span></p>
                                           <p>Qty: <span>1 pc</span></p>
                                        </div>
                                     </a>
                                  </div>
                                  <div class="cart-product-remove">
                                     <a href="#">
                                     <i class="flaticon-delete"></i>
                                     </a>
                                  </div>
                               </div>
                            </div>
                            <div class="cart-details">
                               <div class="cart-total-box">
                                  <div class="cart-total-item">
                                     <h4>Subtotal</h4>
                                     <p>$500.0</p>
                                  </div>
                                  <div class="cart-total-item">
                                     <h4>Vat <span>(2%)</span></h4>
                                     <p>$40.0</p>
                                  </div>
                                  <div class="cart-total-item">
                                     <h4>Total</h4>
                                     <p>$540.0</p>
                                  </div>
                               </div>
                               <a href="cart.html" class="btn main-btn main-btn-secondary full-width">Add To Cart</a>
                               <a href="checkout.html" class="btn main-btn main-btn-secondary full-width main-btn-secondary-bgless">Checkout</a>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="navbar-area navbar-area-two">
       <div class="container">
           <div class="mobile-nav">
               <div class="mobile-nav-category">
                  <div class="navbar-category">
                     <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                         <ul class="navbar-nav mx-auto">
                          <li class="nav-item">
                             <div class="category-button">
                                 <i class="flaticon-menu"></i>
                                 <a href="#" class="nav-link dropdown-toggle">Categories</a>
                              </div>
                              <ul class="dropdown-menu">
                                 <li class="nav-item">
                                    <a href="faqs.html" class="nav-link">FAQ's</a>
                                 </li>
                                 <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">Users</a>
                                    <ul class="dropdown-menu">
                                       <li class="nav-item">
                                          <a href="login.html" class="nav-link">Login</a>
                                       </li>
                                       <li class="nav-item">
                                          <a href="register.html" class="nav-link dropdown-toggle">Registration</a>
                                          <ul class="dropdown-menu">
                                              <li class="nav-item">
                                                 <a href="login.html" class="nav-link">Login</a>
                                              </li>
                                              <li class="nav-item">
                                                 <a href="register.html" class="nav-link">Registration</a>
                                              </li>
                                              <li class="nav-item">
                                                 <a href="forget-password.html" class="nav-link">Forget Password</a>
                                              </li>
                                              <li class="nav-item">
                                                 <a href="my-account.html" class="nav-link">My Account</a>
                                              </li>
                                              <li class="nav-item">
                                                 <a href="my-orders.html" class="nav-link">My Orders</a>
                                              </li>
                                              <li class="nav-item">
                                                 <a href="my-addresses.html" class="nav-link">My Addresses</a>
                                              </li>
                                           </ul>
                                       </li>
                                       <li class="nav-item">
                                          <a href="forget-password.html" class="nav-link">Forget Password</a>
                                       </li>
                                       <li class="nav-item">
                                          <a href="my-account.html" class="nav-link">My Account</a>
                                       </li>
                                       <li class="nav-item">
                                          <a href="my-orders.html" class="nav-link">My Orders</a>
                                       </li>
                                       <li class="nav-item">
                                          <a href="my-addresses.html" class="nav-link">My Addresses</a>
                                       </li>
                                    </ul>
                                 </li>
                                 <li class="nav-item">
                                    <a href="order-tracking.html" class="nav-link">Order Tracking</a>
                                 </li>
                                 <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">Others</a>
                                    <ul class="dropdown-menu">
                                       <li class="nav-item">
                                          <a href="terms-conditions.html" class="nav-link">Terms & Conditions</a>
                                       </li>
                                       <li class="nav-item">
                                          <a href="privacy-policy.html" class="nav-link">Privacy Policy</a>
                                       </li>
                                       <li class="nav-item">
                                          <a href="search-page.html" class="nav-link">Search Page</a>
                                       </li>
                                    </ul>
                                 </li>
                                 <li class="nav-item">
                                    <a href="404.html" class="nav-link">404 Error Page</a>
                                 </li>
                                 <li class="nav-item">
                                    <a href="coming-soon-page.html" class="nav-link">Coming Soon Page</a>
                                 </li>
                              </ul>
                           </li>
                         </ul>
                      </div>
                  </div>
               </div>
               <a href="index.html" class="mobile-brand d-lg-none">
               <img src="{{ asset('frontend/') }}/assets/images/logo.png" alt="logo" class="logo">
               </a>
               <div class="navbar-option">
                  <div class="navbar-option-item d-none mobile-nav-sidebar">
                     <a href="#" class="mobile-option-dot">
                     <i class="flaticon-more"></i>
                     </a>
                     <div class="mobile-option-dropdown">
                        <div class="navbar-option-item">
                           <div class="navbar-language dropdown language-option">
                              <button class="dropdown-toggle" type="button" id="language2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="flaticon-worldwide"></i>
                              <span class="lang-name"></span>
                              </button>
                              <div class="dropdown-menu language-dropdown-menu" aria-labelledby="language2">
                                 <a class="dropdown-item" href="#">
                                 <img src="assets/images/uk.png" alt="flag">
                                 English
                                 </a>
                                 <a class="dropdown-item" href="#">
                                 <img src="assets/images/china.png" alt="flag">
                                 简体中文
                                 </a>
                                 <a class="dropdown-item" href="#">
                                 <img src="assets/images/uae.png" alt="flag">
                                 العربيّة
                                 </a>
                              </div>
                           </div>
                        </div>
                        <div class="navbar-option-item">
                           <a href="login.html">
                           <i class="flaticon-user"></i>
                           </a>
                        </div>
                        <div class="navbar-option-item dropdown">
                           <button type="button" id="search2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="flaticon-search"></i>
                           </button>
                           <div class="dropdown-menu mobile-search" aria-labelledby="search2">
                              <form>
                                 <input type="text" class="form-control" placeholder="Search product">
                                 <button class="btn main-btn" type="submit">Search</button>
                              </form>
                           </div>
                        </div>
                        <div class="navbar-option-item">
                           <a href="wishlist.html" class="navbar-add-cart">
                           <i class="flaticon-like"></i>
                           <span class="topbar-action-counter">05</span>
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="navbar-option-item d-none d-md-block">
                     <div class="navbar-language dropdown language-option">
                        <button class="dropdown-toggle" type="button" id="language1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="flaticon-worldwide"></i>
                        <span class="lang-name"></span>
                        </button>
                        <div class="dropdown-menu language-dropdown-menu" aria-labelledby="language1">
                           <a class="dropdown-item" href="#">
                           <img src="assets/images/uk.png" alt="flag">
                           English
                           </a>
                           <a class="dropdown-item" href="#">
                           <img src="assets/images/china.png" alt="flag">
                           简体中文
                           </a>
                           <a class="dropdown-item" href="#">
                           <img src="assets/images/uae.png" alt="flag">
                           العربيّة
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="navbar-option-item d-none d-lg-none d-md-block">
                     <a href="login.html">
                     <i class="flaticon-user"></i>
                     </a>
                  </div>
                  <div class="navbar-option-item d-none d-lg-none d-md-block">
                     <button type="button" id="search1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="flaticon-search"></i>
                     </button>
                     <div class="dropdown-menu mobile-search" aria-labelledby="search1">
                        <form>
                           <input type="text" class="form-control" placeholder="Search product">
                           <button class="btn main-btn" type="submit">Search</button>
                        </form>
                     </div>
                  </div>
                  <div class="navbar-option-item d-none d-lg-none d-md-block">
                     <a href="wishlist.html" class="navbar-add-cart">
                     <i class="flaticon-like"></i>
                     <span class="topbar-action-counter">05</span>
                     </a>
                  </div>
                  <div class="navbar-option-item d-lg-none d-md-block cart-option-dropdown">
                     <a href="#" class="navbar-add-cart cartbtn">
                     <i class="flaticon-shopping-cart"></i>
                     <span class="topbar-action-counter">02</span>
                     </a>
                     <div class="cart-modal">
                        <div class="cart-close-btn close-btn">
                           <i class="flaticon-close"></i>
                        </div>
                        <div class="cart-modal-products">
                           <div class="cart-modal-product">
                              <div class="cart-product-info">
                                 <a href="single-shop.html">
                                    <div class="cart-product-thumb">
                                       <img src="assets/images/products/product-13.png" alt="product">
                                    </div>
                                    <div class="cart-product-details">
                                       <h3>Stylish Chair</h3>
                                       <p>Price: <span>$200.0</span></p>
                                       <p>Qty: <span>2 pcs</span></p>
                                    </div>
                                 </a>
                              </div>
                              <div class="cart-product-remove">
                                 <a href="#">
                                 <i class="flaticon-delete"></i>
                                 </a>
                              </div>
                           </div>
                           <div class="cart-modal-product">
                              <div class="cart-product-info">
                                 <a href="single-shop.html">
                                    <div class="cart-product-thumb">
                                       <img src="assets/images/products/product-15.png" alt="product">
                                    </div>
                                    <div class="cart-product-details">
                                       <h3>Furnished Sofa</h3>
                                       <p>Price: <span>$300.0</span></p>
                                       <p>Qty: <span>1 pc</span></p>
                                    </div>
                                 </a>
                              </div>
                              <div class="cart-product-remove">
                                 <a href="#">
                                 <i class="flaticon-delete"></i>
                                 </a>
                              </div>
                           </div>
                        </div>
                        <div class="cart-details">
                           <div class="cart-total-box">
                              <div class="cart-total-item">
                                 <h4>Subtotal</h4>
                                 <p>$500.0</p>
                              </div>
                              <div class="cart-total-item">
                                 <h4>Vat <span>(2%)</span></h4>
                                 <p>$40.0</p>
                              </div>
                              <div class="cart-total-item">
                                 <h4>Total</h4>
                                 <p>$540.0</p>
                              </div>
                           </div>
                           <a href="cart.html" class="btn main-btn full-width">Add To Cart</a>
                           <a href="checkout.html" class="btn main-btn full-width main-btn-bgless">Checkout</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
       </div>
       <div class="main-nav">
          <div class="container">
             <nav class="navbar navbar-expand-md navbar-light">
                <div class="navbar-category navbar-category-secondcolor">
                   <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                       <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                           <div class="category-button">
                               <i class="flaticon-menu"></i>
                               <a href="#" class="nav-link dropdown-toggle">Categories</a>
                            </div>
                            <ul class="dropdown-menu">
                               <li class="nav-item">
                                  <a href="faqs.html" class="nav-link">FAQ's</a>
                               </li>
                               <li class="nav-item">
                                  <a href="#" class="nav-link dropdown-toggle">Users</a>
                                  <ul class="dropdown-menu">
                                     <li class="nav-item">
                                        <a href="login.html" class="nav-link">Login</a>
                                     </li>
                                     <li class="nav-item">
                                        <a href="register.html" class="nav-link dropdown-toggle">Registration</a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item">
                                               <a href="login.html" class="nav-link">Login</a>
                                            </li>
                                            <li class="nav-item">
                                               <a href="register.html" class="nav-link">Registration</a>
                                            </li>
                                            <li class="nav-item">
                                               <a href="forget-password.html" class="nav-link">Forget Password</a>
                                            </li>
                                            <li class="nav-item">
                                               <a href="my-account.html" class="nav-link">My Account</a>
                                            </li>
                                            <li class="nav-item">
                                               <a href="my-orders.html" class="nav-link">My Orders</a>
                                            </li>
                                            <li class="nav-item">
                                               <a href="my-addresses.html" class="nav-link">My Addresses</a>
                                            </li>
                                         </ul>
                                     </li>
                                     <li class="nav-item">
                                        <a href="forget-password.html" class="nav-link">Forget Password</a>
                                     </li>
                                     <li class="nav-item">
                                        <a href="my-account.html" class="nav-link">My Account</a>
                                     </li>
                                     <li class="nav-item">
                                        <a href="my-orders.html" class="nav-link">My Orders</a>
                                     </li>
                                     <li class="nav-item">
                                        <a href="my-addresses.html" class="nav-link">My Addresses</a>
                                     </li>
                                  </ul>
                               </li>
                               <li class="nav-item">
                                  <a href="order-tracking.html" class="nav-link">Order Tracking</a>
                               </li>
                               <li class="nav-item">
                                  <a href="#" class="nav-link dropdown-toggle">Others</a>
                                  <ul class="dropdown-menu">
                                     <li class="nav-item">
                                        <a href="terms-conditions.html" class="nav-link">Terms & Conditions</a>
                                     </li>
                                     <li class="nav-item">
                                        <a href="privacy-policy.html" class="nav-link">Privacy Policy</a>
                                     </li>
                                     <li class="nav-item">
                                        <a href="search-page.html" class="nav-link">Search Page</a>
                                     </li>
                                  </ul>
                               </li>
                               <li class="nav-item">
                                  <a href="404.html" class="nav-link">404 Error Page</a>
                               </li>
                               <li class="nav-item">
                                  <a href="coming-soon-page.html" class="nav-link">Coming Soon Page</a>
                               </li>
                            </ul>
                         </li>
                       </ul>
                    </div>
               </div>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                   <ul class="navbar-nav mx-auto">
                      <li class="nav-item">
                         <a href="#" class="nav-link dropdown-toggle">Home</a>
                         <ul class="dropdown-menu">
                            <li class="nav-item  nav-item-1">
                               <a href="index.html" class="nav-link">Home Demo 1</a>
                            </li>
                            <li class="nav-item  nav-item-2">
                               <a href="index-2.html" class="nav-link">Home Demo 2</a>
                            </li>
                            <li class="nav-item  nav-item-3">
                               <a href="index-3.html" class="nav-link">Home Demo 3</a>
                            </li>
                         </ul>
                      </li>
                      <li class="nav-item">
                         <a href="about-us.html" class="nav-link">About Us</a>
                      </li>
                      <li class="nav-item">
                         <a href="#" class="nav-link dropdown-toggle active">Shop</a>
                         <ul class="dropdown-menu">
                            <li class="nav-item">
                               <a href="shops-grid.html" class="nav-link">Shop Grid</a>
                            </li>
                            <li class="nav-item">
                               <a href="shops-full.html" class="nav-link">Shop Full</a>
                            </li>
                            <li class="nav-item">
                               <a href="shops-grid-best-seller.html" class="nav-link">Shop Grid Best Seller</a>
                            </li>
                            <li class="nav-item">
                               <a href="shops-grid-daily-sales.html" class="nav-link">Shop Grid Daily Sales</a>
                            </li>
                            <li class="nav-item">
                               <a href="shops-grid-new.html" class="nav-link">Shop Grid New</a>
                            </li>
                            <li class="nav-item">
                               <a href="single-shop.html" class="nav-link">Single Shop</a>
                            </li>
                            <li class="nav-item">
                               <a href="cart.html" class="nav-link active">Cart</a>
                            </li>
                            <li class="nav-item">
                               <a href="wishlist.html" class="nav-link">Wishlist</a>
                            </li>
                            <li class="nav-item">
                               <a href="checkout.html" class="nav-link">Checkout</a>
                            </li>
                         </ul>
                      </li>
                      <li class="nav-item">
                         <a href="#" class="nav-link dropdown-toggle">Pages</a>
                         <ul class="dropdown-menu">
                            <li class="nav-item">
                               <a href="faqs.html" class="nav-link">FAQ's</a>
                            </li>
                            <li class="nav-item">
                               <a href="#" class="nav-link dropdown-toggle">Users</a>
                               <ul class="dropdown-menu">
                                  <li class="nav-item">
                                     <a href="login.html" class="nav-link">Login</a>
                                  </li>
                                  <li class="nav-item">
                                     <a href="register.html" class="nav-link">Registration</a>
                                  </li>
                                  <li class="nav-item">
                                     <a href="forget-password.html" class="nav-link">Forget Password</a>
                                  </li>
                                  <li class="nav-item">
                                     <a href="my-account.html" class="nav-link">My Account</a>
                                  </li>
                                  <li class="nav-item">
                                     <a href="my-orders.html" class="nav-link">My Orders</a>
                                  </li>
                                  <li class="nav-item">
                                     <a href="my-addresses.html" class="nav-link">My Addresses</a>
                                  </li>
                               </ul>
                            </li>
                            <li class="nav-item">
                               <a href="order-tracking.html" class="nav-link">Order Tracking</a>
                            </li>
                            <li class="nav-item">
                               <a href="#" class="nav-link dropdown-toggle">Others</a>
                               <ul class="dropdown-menu">
                                  <li class="nav-item">
                                     <a href="terms-conditions.html" class="nav-link">Terms & Conditions</a>
                                  </li>
                                  <li class="nav-item">
                                     <a href="privacy-policy.html" class="nav-link">Privacy Policy</a>
                                  </li>
                                  <li class="nav-item">
                                     <a href="search-page.html" class="nav-link">Search Page</a>
                                  </li>
                               </ul>
                            </li>
                            <li class="nav-item">
                               <a href="404.html" class="nav-link">404 Error Page</a>
                            </li>
                            <li class="nav-item">
                               <a href="coming-soon-page.html" class="nav-link">Coming Soon Page</a>
                            </li>
                         </ul>
                      </li>
                      <li class="nav-item">
                         <a href="#" class="nav-link dropdown-toggle">Blogs</a>
                         <ul class="dropdown-menu">
                            <li class="nav-item">
                               <a href="blogs-grid.html" class="nav-link">Blogs Grid</a>
                            </li>
                            <li class="nav-item">
                               <a href="blogs-full.html" class="nav-link">Blogs Full</a>
                            </li>
                            <li class="nav-item">
                               <a href="single-blog.html" class="nav-link">Single Blog</a>
                            </li>
                         </ul>
                      </li>
                      <li class="nav-item">
                         <a href="contact.html" class="nav-link">Contact</a>
                      </li>
                   </ul>
                </div>
                <div class="navbar-option">
                   <div class="navbar-option-item navbar-language dropdown language-option">
                      <button class="dropdown-toggle" type="button" id="language3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="flaticon-worldwide"></i>
                      <span class="lang-name"></span>
                      </button>
                      <div class="dropdown-menu language-dropdown-menu" aria-labelledby="language3">
                         <a class="dropdown-item" href="#">
                         <img src="assets/images/uk.png" alt="flag">
                         English
                         </a>
                         <a class="dropdown-item" href="#">
                         <img src="assets/images/china.png" alt="flag">
                         简体中文
                         </a>
                         <a class="dropdown-item" href="#">
                         <img src="assets/images/uae.png" alt="flag">
                         العربيّة
                         </a>
                      </div>
                   </div>
                </div>
             </nav>
          </div>
       </div>
    </div>
 </div>

