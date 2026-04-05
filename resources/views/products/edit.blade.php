<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product | Inventory</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body style="display: flex; align-items: center; justify-content: center; min-height: 100vh;">

    <div class="card" style="width: 100%; max-width: 650px;">
        <h2>Update Product Information</h2>
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="name" value="{{ $product->name }}" required>
            </div>

            <div class="form-group">
                <label>Brand / Supplier</label>
                <input type="text" name="brand" value="{{ $product->brand }}" required>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px;">
                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="number" step="0.01" name="price" value="{{ $product->price }}" required>
                </div>
                <div class="form-group">
                    <label>Current Stock</label>
                    <input type="number" name="stock" value="{{ $product->stock }}" required>
                </div>
            </div>

            <div style="display: flex; gap: 10px; margin-top: 20px;">
                <button type="submit" class="btn btn-primary" style="flex: 2; padding: 12px;">
                    Update Product
                </button>

                <a href="{{ route('products.index') }}" class="btn btn-secondary"
                    style="flex: 1; padding: 12px; text-align: center;">
                    Cancel
                </a>
            </div>
        </form>
    </div>

</body>

</html>