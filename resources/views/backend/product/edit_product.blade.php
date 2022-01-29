@extends('admin.admin_master')

@section('main-content')


<div class="container-full">

    <!-- Main content -->
    <section class="content">

     <!-- Basic Forms -->
      <div class="box">
        <div class="box-header with-border">
          <h4 class="box-title">Edit Product</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col">
                <form method="POST" action="{{ route('product.update') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                  <div class="row">
                    <div class="col-12">

                        <div class="row"> <!-- start 1st row -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Brand Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="brand_id" id="select" class="form-control" required>
                                            <option value="" selected disabled>Select Brand</option>
                                            @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ ($brand->id==$product->brand_id)? 'selected' : '' }}>{{ $brand->brand_name_en }}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Category Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" id="select" class="form-control" required>
                                            <option value="" selected disabled>Select Category</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ ($category->id==$product->category_id)? 'selected' : '' }}>{{ $category->category_name_en }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subcategory_id" id="select" class="form-control">
                                            <option value="" selected disabled>Select SubCategory</option>
                                            @foreach($subcategories as $sub)
                                            <option value="{{ $sub->id }}" {{ ($sub->id==$product->subcategory_id)? 'selected' : '' }}>{{ $sub->subcategory_name_en }}</option>
                                            @endforeach
                                        </select>
                                        @error('subcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end 1st row -->

                        <div class="row"> <!-- start 2nd row -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Sub-SubCategory Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subsubcategory_id" id="select" class="form-control">
                                            <option value="" selected disabled>Select Sub-SubCategory</option>
                                            @foreach($subsubcategories as $subsub)
                                            <option value="{{ $subsub->id }}" {{ ($subsub->id==$product->subsubcategory_id)? 'selected' : '' }}>{{ $subsub->subsubcategory_name_en }}</option>
                                            @endforeach
                                        </select>
                                        @error('subsubcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_name_en" class="form-control" required value="{{ $product->product_name_en }}">
                                        @error('product_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Name Arabic <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_name_ar" class="form-control" required value="{{ $product->product_name_ar }}">
                                        @error('product_name_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end 2nd row -->

                        <div class="row"> <!-- start 3rd row -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Code <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_code" class="form-control" required value="{{ $product->product_code }}">
                                        @error('product_code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Quantity <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_qty" class="form-control" required value="{{ $product->product_qty }}">
                                        @error('product_qty')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end 3rd row -->

                        <div class="row"> <!-- start 4th row -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Size English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_size_en" data-role="tagsinput" required value="{{ $product->product_size_en }}" />
                                        @error('product_tags_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Size Arabic <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_size_ar" data-role="tagsinput" required value="{{ $product->product_size_ar }}" />
                                        @error('product_size_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end 4th row -->

                        <div class="row"> <!-- start 5th row -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Color English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_color_en" data-role="tagsinput" required value="{{ $product->product_color_en }}" />
                                        @error('product_color_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Color Arabic <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_color_ar" data-role="tagsinput" required value="{{ $product->product_color_ar }}" />
                                        @error('product_color_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end 5th row -->

                        <div class="row"> <!-- start 6th row -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="selling_price" class="form-control" required value="{{ $product->selling_price }}">
                                        @error('selling_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Discount Price <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="discount_price" class="form-control" required value="{{ $product->discount_price }}">
                                        @error('discount_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end 6th row -->

                        <div class="row"> <!-- start 7th row -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Short Description English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_descp_en" id="textarea" class="form-control" placeholder="Short Description English" required>{!! htmlspecialchars_decode($product->short_descp_en) !!}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Short Description Arabic <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_descp_ar" id="textarea" class="form-control" placeholder="Short Description Arabic" required>{!! htmlspecialchars_decode($product->short_descp_ar) !!}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end 7th row -->

                        <div class="row"> <!-- start 8th row -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Long Description English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="long_descp_en" id="editor1" class="form-control" placeholder="Long Description English">{!! htmlspecialchars_decode($product->long_descp_en) !!}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Long Description Arabic <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="long_descp_ar" id="editor2" class="form-control" placeholder="وصف طويل عربي">{!! htmlspecialchars_decode($product->long_descp_ar) !!}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end 8th row -->

                        <hr>

                    </div>
                  </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" name="hot_deals" id="checkbox_1" value="1" {{ ($product->hot_deals == 1)? 'checked': '' }}>
                                        <label for="checkbox_1">Hot Deals</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" name="featured" id="checkbox_2" value="1" {{ ($product->featured == 1)? 'checked': '' }}>
                                        <label for="checkbox_2">Featured</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" name="special_offer" id="checkbox_3" value="1" {{ ($product->special_offer == 1)? 'checked': '' }}>
                                        <label for="checkbox_3">Special Offer</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" name="special_deals" id="checkbox_4" value="1" {{ ($product->special_deals == 1)? 'checked': '' }}>
                                        <label for="checkbox_4">Special Deals</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" name="best_seller" id="checkbox_5" value="1" {{ ($product->best_seller == 1)? 'checked': '' }}>
                                        <label for="checkbox_5">Best Seller</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" name="daily_sales" id="checkbox_6" value="1" {{ ($product->daily_sales == 1)? 'checked': '' }}>
                                        <label for="checkbox_6">Daily Sales</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" name="new_arrivals" id="checkbox_7" value="1" {{ ($product->new_arrivals == 1)? 'checked': '' }}>
                                        <label for="checkbox_7">New Arrivals</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Product" />
                    </div>
                </form>

            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->

    <!-- ///////////////// Start Multiple Image Edit ////////////////// -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box bt-3 border-info">
                    <div class="box-header">
                      <h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
                    </div>

                    <div class="box-body">
                        <form action="{{ route('product.image.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row row-sm">
                                @foreach($multiple_imags as $img)
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="{{ URL::to($img->photo_name) }}" class="card-img-top up_image_multi">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a id="delete" href="{{ route('delete.product.image', $img->id) }}" class="btn btn-danger btn-sm" title="Delete Image"><i class="fa fa-trash"></i></a>
                                            </h5>
                                            <p class="card-text">
                                                <label for="" class="form-control-label">Change Image <span class="text-danger">*</span></label>
                                                <input type="file" name="multiple_img[{{ $img->id }}]" class="form-control">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image" />
                            </div>
                        </form>
                    </div>
                  </div>
            </div>
        </div>
    </section>
    <!-- ///////////////// End Multiple Image Edit ////////////////// -->

    <!-- ///////////////// Start Thumbnail Image Edit ////////////////// -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box bt-3 border-info">
                    <div class="box-header">
                      <h4 class="box-title">Product Thumbnail Image <strong>Update</strong></h4>
                    </div>

                    <div class="box-body">
                        <form action="{{ route('product.thumbnail.image.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="old_image" value="{{ $product->product_thumbnail }}">

                            <div class="row row-sm">

                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="{{ URL::to($product->product_thumbnail) }}" class="card-img-top up_image_multi">
                                        <div class="card-body">
                                            <p class="card-text">
                                                <label for="" class="form-control-label">Change Image <span class="text-danger">*</span></label>
                                                <input type="file" name="product_thumbnail" class="form-control" onchange="mainThamUrl(this)" />
                                                <img src="" id="mainThmb" alt="">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image" />
                            </div>
                        </form>
                    </div>
                  </div>
            </div>
        </div>
    </section>
    <!-- ///////////////// End Thumbnail Image Edit ////////////////// -->


  </div>
  <script type="text/javascript">
    $(document).ready(function() {

        // sub category find
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        $('select[name="subsubcategory_id"]').html('');
                        var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                            });
                    },
                });
            } else {
                alert('danger');
            }
        });

        // sub sub category find
        $('select[name="subcategory_id"]').on('change', function(){
            var subcategory_id = $(this).val();
            if(subcategory_id) {
                $.ajax({
                    url: "{{  url('/category/subsubcategory/ajax') }}/"+subcategory_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        var d =$('select[name="subsubcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                            });
                    },
                });
            } else {
                alert('danger');
            }
        });

  });
  </script>

<script type="text/javascript">
	function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>


<script>

  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data

          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });

      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });

  </script>


@endsection
