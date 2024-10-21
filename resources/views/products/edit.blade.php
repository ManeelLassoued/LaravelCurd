<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>laravel curd  </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="bg-dark py-3">
     <h5 class="text-white text-center">Hello, laravel curd!</h5>

    </div>
    <div class="container">

     <div class="row  d-flex justify-content-center">
      <div class="col-md-10 mt-4">
        <div class="card borde-0 shadow-lg" >
          <div class="card-header bg-warning ">
          Update Product
          </div>
        <div class="card-body">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="name">Product Name</label>
                        <input type="text" value="{{ old('name', $product->name) }}" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter product name">
                        @error('name')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="price">Price</label>
                        <input type="number" value="{{ old('price', $product->price) }}" min="1" step="1" name="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Enter product price" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        @error('price')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description" rows="3" placeholder="Enter product description">{{ old('description', $product->description) }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="image">Product Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                        <small>Leave blank if you do not want to change the image.</small>
                    </div>

                    @if($product->image)
                    <div class="mb-3">
                        <label class="form-label">Current Image</label>
                        <div>
                            <center>
                            <img src="{{ asset('uploads/products/'  . $product->image) }}" alt="Current Product Image" width="400" height="250">
                            </center>
                        </div>
                    </div>
                    @endif

                    <div class="form-group mb-3">
                        <label for="qty">Quantity</label>
                        <input type="number" value="{{ old('qty', $product->qty) }}" name="qty" class="form-control" id="qty" placeholder="Enter quantity">
                    </div>

                    <div class="form-group mb-3">
                        <label for="sku">SKU</label>
                        <input type="text" value="{{ old('sku', $product->sku) }}" name="sku" class="form-control @error('sku') is-invalid @enderror" id="sku" placeholder="Enter SKU">
                        @error('sku')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-warning">Update</button>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
 </div>
 </div>
     </div>
       </div>
         </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>