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
    <div class="d-flex justify-content-end  mt-4">

    <a href="{{ route('products.create') }}" class="btn btn-primary">Create Product</a>
     </div>
     <div class="row  d-flex justify-content-center">
     @if (Session::has('success'))
    <div class="col-md-10 mt-4">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif
    <br>

      <div class="col-md-12 mt-4">

      <div class="card borde-0 shadow-lg" >
          <div class="card-header bg-dark text-white">
        Products
          </div>
        <div class="card-body">

        <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>sku</th>
                               <th>Quantity</th>
                               <th>date</th>

                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <td> @if($product->image)
                                        <img src="{{ asset('uploads/products/' . $product->image) }}" alt="Product Image" width="90" height="60">
                                    @else
                                        No image
                                    @endif
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->sku }}</td>
                                <td>{{ $product->qty }}</td>
                                <td>{{ $product->created_at }}</td>


                                <td>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('products.remove', $product->id) }}" method="GET" style="display:inline-block;">
                                        @csrf

                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">No products available</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-3">
            {{ $products->links('pagination::bootstrap-5') }} <!-- Specify Bootstrap 4 view for pagination -->
        </div>
 </div>
 </div>
     </div>
       </div>
         </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
