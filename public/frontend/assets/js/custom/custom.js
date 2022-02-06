
    //Produc Add to Cart Script
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })

    // Product add to cart modal
    function productAddToCart(id){
        // alert(id);

        $.ajax({
            type: 'GET',
            url: '/product/add-to-cart/modal/'+id,
            dataType:'json',
            success:function(data){
                // console.log(data);
                $('.pimg-cart').empty();

                $('.pname_cart-en').text(data.product.product_name_en);
                $('.pname_cart-ar').text(data.product.product_name_ar);
                $('.pcode_cart').text(data.product.product_code);
                $('.pcat_cart-en').text(data.product.category.category_name_en);
                $('.pcat_cart-ar').text(data.product.category.category_name_ar);
                $('.pbrand_cart-en').text(data.product.brand.brand_name_en);
                $('.pbrand_cart-ar').text(data.product.brand.brand_name_ar);

                $('#product_id').val(id);
                $('#qty').val(1);

                $('.pstock-cart').empty;
                if(data.product.product_qty > 0){
                    $('.pstock-cart').html('<span id="available" class="badge badge-pill badge-success bg-success">Available</span>');
                }else {
                    $('.pstock-cart').html('<span id="available" class="badge badge-pill badge-danger bg-danger">Stockout</span>');
                }

                if(data.product.discount_price == null){
                    $('.product-price_cart').html('$'+data.product.selling_price);

                }else {
                    $('.product-price_cart').html(`$`+data.product.discount_price+` <del>$`+data.product.selling_price+`</del>`);
                }

                let amount = data.product.selling_price - data.product.discount_price;
                let discount = Math.round((amount/data.product.selling_price) * 100);
                if(data.product.discount_price == null){
                    $('.product-status__cart').text('New');
                }else {
                    $('.product-status__cart').text(discount+'%');
                }
                $('.pimg-cart').html(`
                        <div class="item">
                            <img src="/${data.product.product_thumbnail}" alt="product">
                        </div>`);

                $('.product-color-en').empty();
                $.each(data.color_en, function(key,value){
                    $('.product-color-en').append('<option value="'+value+'">'+value+'</option>');
                });

                $('.product-color-ar').empty();
                $.each(data.color_ar, function(key,value){
                    $('.product-color-ar').append('<option value="'+value+'">'+value+'</option>');
                });

                $('.product-size-en').empty();
                $.each(data.size_en, function(key,value){
                    $('.product-size-en').append('<option value="'+value+'">'+value+'</option>');
                });

                $('.product-size-ar').empty();
                $.each(data.size_ar, function(key,value){
                    $('.product-size-ar').append('<option value="'+value+'">'+value+'</option>');
                });


            }
        });

    }// End Product add to cart modal

    // Add to Cart function
    function addToCart(){
        let product_name_en = $('.pname_cart-en').text();
        let product_name_ar = $('.pname_cart-ar').text();
        let product_code = $('.pcode_cart').text();
        let color_en = $('.product-color-en option:selected').text();
        let color_ar = $('.product-color-ar option:selected').text();
        let size_en = $('.product-size-en option:selected').text();
        let size_ar = $('.product-size-ar option:selected').text();
        let id = $('#product_id').val();
        let quantity = $('#qty').val();

        $.ajax({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            dataType:'json',
            data: {
                product_name_en:product_name_en, product_name_ar:product_name_ar, product_code:product_code, color_en:color_en, color_ar:color_ar, size_en:size_en, size_ar:size_ar, quantity:quantity
            },
            url: "/cart/data/store/"+id,
            success: function(data){
                miniCart();
                cart();
                $('#closeCartModal').click();
                // console.log(data);

                  // Start Message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'bottom-right',
                    showConfirmButton: false,
                    timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message

            }
        });

    }// End Add to Cart function



     // Start Add to Whishlist function
     function productAddToWishlist(product_id){

        $.ajax({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            dataType: 'json',
            url: "/add-to-wishlist/"+product_id,
            success:function(data) {
                wishlist();

                // Start Message
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'bottom-right',
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message

            }
        });

    }
    // End Add to Whishlist function

    // Start Mini Add to Cart function
    function miniCart(){

        $.ajax({
            type: 'GET',
            url: '/product/mini/cart',
            dataType: 'json',
            success: function(response){
                // console.log(response);

                $('#cart_qty').text(response.cartQty);
                $('#cart_sub_totla').text(response.cartTotal);

                let miniCart = "";

                $.each(response.carts, function(key,value){
                    // console.log(value);
                    miniCart += `<div class="cart-modal-product">
                                    <div class="cart-product-info">
                                        <a href="single-shop.html">
                                            <div class="cart-product-thumb">
                                                <img src="/${value.options.image}" alt="product">
                                            </div>
                                            <div class="cart-product-details">
                                                <h3>
                                                    ${
                                                        (() => {
                                                            if(value.options.size_ar == null) {
                                                                return value.name;

                                                            } else {
                                                                return value.options.name_ar;

                                                            }

                                                        })()

                                                    }
                                                </h3>
                                                <p>Price: <span>$${value.price}</span></p>
                                                <p>Qty: <span>${value.qty} pcs</span></p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="cart-product-remove">
                                        <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)">
                                        <i class="flaticon-delete"></i>
                                        </button>
                                    </div>
                                </div>`;
                });

                $('#midiCart').html(miniCart);

            }
        });
    }
    // End Mini Add to Cart function
    miniCart();


    // Start Mini Cart Remove
    function miniCartRemove(rowId){

        $.ajax({
            type:"GET",
            url:"/minicart/product-remove/"+rowId,
            dataType:"json",
            success:function(data){
                miniCart();

                 // Start Message
                 const Toast = Swal.mixin({
                    toast: true,
                    position: 'bottom-right',
                    showConfirmButton: false,
                    timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message

            }
        });

    }
    // End Mini Cart Remove


    // Start Get Wishlist Data function
    function wishlist(){

        $.ajax({
            type: 'GET',
            url: '/user/get-wishlist-product',
            dataType: 'json',
            success: function(response){
                // console.log(response);
                $('#wishlist_count').text(response.count);

                let rows = "";

                $.each(response.wishlist, function(key,value){
                    // console.log(value);
                    rows += `<tr>
                                <td>
                                    <div class="product-table-thumb">
                                        <img src="/${value.product.product_thumbnail}" alt="product">
                                    </div>
                                </td>
                                <td>${value.product.product_name_en}</td>
                                <td class="color-secondary">
                                    ${
                                        value.product.discount_price == null ?
                                        `$${value.product.selling_price}` :
                                        `$${value.product.discount_price} <span class="text-secondary"><del>$${value.product.selling_price}</del></span>`
                                    }
                                </td>
                                <td>
                                    <a href="/product/detials/${value.product_id}/${value.product.product_slug_en}" class="btn main-btn main-btn-secondary">Add To Cart</a>
                                </td>
                                <td class="cancel">
                                    <button type="button" id="${value.id}" onclick="removeWishlist(this.id)"><i class="flaticon-delete"></i></button>
                                </td>
                            </tr>`;
                });

                $('#wishlist').html(rows);

            }
        });
    }
    // End Get Wishlist Data function
    wishlist();


    // Start Wishlist Remove
    function removeWishlist(id){

        $.ajax({
            type:"GET",
            url:"/user/wishlist-remove/"+id,
            dataType:"json",
            success:function(data){
                wishlist();

                // Start Message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'bottom-right',
                    showConfirmButton: false,
                    timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message

            }
        });

    }
    // End Wishlist Remove



     // Start Get MyCart Data function
     function cart(){

        $.ajax({
            type: 'GET',
            url: '/user/get-mycart-product',
            dataType: 'json',
            success: function(response){
                // console.log(response);
                $('#cart_count').text(response.cartQty);

                let rows = "";

                $.each(response.carts, function(key,value){
                    // console.log(value);
                    rows += `
                            <tr>
                                <td>
                                    <div class="product-table-thumb">
                                        <img src="/${value.options.image}" alt="product">
                                    </div>
                                </td>
                                <td>
                                    ${
                                        (() => {
                                            if(value.options.size_ar == null) {
                                                return value.name;

                                            } else {
                                                return value.options.name_ar;
                                            }

                                        })()

                                    }
                                </td>
                                <td class="color-secondary">$${value.price}</td>
                                <td>
                                    ${
                                        (() => {
                                            if(value.options.color_ar == null) {
                                                return value.options.color_en;

                                            } else {
                                                return value.options.color_ar;
                                            }

                                        })()

                                    }
                                </td>
                                <td>
                                    ${
                                        (() => {
                                            if(value.options.size_ar == null) {
                                                return value.options.size_en;

                                            } else {
                                                return value.options.size_ar;
                                            }

                                        })()

                                    }
                                </td>
                                <td>
                                    <div class="cart-quantity">
                                    ${
                                    value.qty > 1 ?
                                        `<button class="qu-btn dec" id="${value.rowId}" onclick="cartDecrease(this.id)">-</button>`
                                            :
                                        `<button class="qu-btn dec" disabled>-</button>`
                                    }
                                        <input type="text" class="qu-input" value="${value.qty}">
                                        <button class="qu-btn inc" id="${value.rowId}" onclick="cartIncrease(this.id)">+</button>
                                    </div>
                                </td>
                                <td class="color-secondary">$${value.subtotal}</td>
                                <td class="cancel">
                                    <a href="javascript:void(0)" id="${value.rowId}" onclick="removeCart(this.id)"><i class="flaticon-close"></i></a>
                                </td>
                            </tr>
                            `;
                });

                $('#mycart').html(rows);

            }
        });
    }
    // End Get My Cart Data function
    cart();


    // Start Cart Remove
    function removeCart(id){

        $.ajax({
            type:"GET",
            url:"/user/cart-remove/"+id,
            dataType:"json",
            success:function(data){
                cart();
                miniCart();

                couponCalculation();
                $('.coupon-btn').show();
                $('#coupon_name').val('');

                // Start Message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'bottom-right',
                    showConfirmButton: false,
                    timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message

            }
        });

    }
    // End Cart Remove


    //---------- Start Cart Increase ----------//
    function cartIncrease(rowId){

        $.ajax({
            type:"GET",
            url:"/cart-increase/"+rowId,
            dataType:"json",
            success:function(data){
                couponCalculation();
                cart();
                miniCart();
            }
        });

    }
    //---------- End Cart Increase ----------//


    //---------- Start Cart Decrease ----------//
    function cartDecrease(rowId){

        $.ajax({
            type:"GET",
            url:"/cart-decrease/"+rowId,
            dataType:"json",
            success:function(data){
                couponCalculation();
                cart();
                miniCart();
            }
        });

    }
    //---------- End Cart Decrease ----------//


    //---------- Start Apply Coupon ----------//
    function applyCoupon(){
        let coupon_name = $('#coupon_name').val();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {coupon_name:coupon_name},
            url: "/apply-coupon",
            success: function(data){
                // console.log(data);
                $(".coupon-popup-wrapepr").removeClass("active");
                couponCalculation();
                if(data.validity == true){
                    $('.coupon-btn').hide();
                }

                 // Start Message
                 const Toast = Swal.mixin({
                    toast: true,
                    position: 'bottom-right',
                    showConfirmButton: false,
                    timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message

            }
        });
    }
    //---------- End Apply Coupon ----------//

    //======== Start Coupon Calculation ========//
    function couponCalculation(){
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '/coupon-calculation',
            success: function(data){
                if(data.total){
                    $('#coupon_calculation').html(`
                        <div class="cart-total-item">
                            <h4>Subtotal</h4>
                            <p>$${data.total}</p>
                        </div>
                        <div class="cart-total-item">
                            <h4>Total</h4>
                            <p>$${data.total}</p>
                        </div>
                    `);
                }else {
                    $('#coupon_calculation').html(`
                        <div class="cart-total-item">
                            <h4>Subtotal</h4>
                            <p>$${data.subtotal}</p>
                        </div>
                        <div class="cart-total-item">
                            <h4>Coupon</h4>
                            <p>${data.coupon_name}</p>
                            <Button type="submit" onclick="couponRemove()"><i class="flaticon-close"></i></Button>
                        </div>
                        <div class="cart-total-item">
                            <h4>Discount Amount</h4>
                            <p>$${data.coupon_amount}</p>
                        </div>
                        <div class="cart-total-item">
                            <h4>Total</h4>
                            <p>$${data.total_amount}</p>
                        </div>
                    `);
                }
            }
        });
    }
    couponCalculation();
    //======== End Coupon Calculation ========//

    //======== Start Coupon Remove ========//
    function couponRemove(){
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '/coupon-remove',
            success: function(data){
                couponCalculation();
                $('.coupon-btn').show();
                $('#coupon_name').val('');

                 // Start Message
                 const Toast = Swal.mixin({
                    toast: true,
                    position: 'bottom-right',
                    showConfirmButton: false,
                    timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message

            }
        });
    }
    //======== End Coupon Remove ========//
