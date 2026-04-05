<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>

    <div class="container">
        <div class="header-section">
            <h1>Product Inventory</h1>
            <div class="actions">
                <a href="{{ route('category.index') }}" class="btn btn-secondary">Manage Categories</a>
            </div>
        </div>

        <div class="card">
            <h3>Add New Product</h3>
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div style="display: grid; grid-template-columns: 2fr 1fr 1fr; gap: 20px; align-items: end;">
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="name" placeholder="e.g., C2 na Green" required>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" required>
                            <option value="" disabled selected>Select...</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" step="0.01" name="price" placeholder="0.00" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-success" style="margin-top: 15px;">Add Product</button>
            </form>
        </div>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $product)
                        <tr>
                            <td>#{{ $product->id }}</td>
                            <td><strong>{{ $product->name }}</strong></td>
                            <td>
                                <span
                                    style="background: var(--border); padding: 4px 8px; border-radius: 4px; font-size: 11px;">
                                    {{ $product->category->name ?? 'Unassigned' }}
                                </span>
                            </td>
                            <td>₱{{ number_format($product->price, 2) }}</td>
                            <td style="text-align: right; white-space: nowrap;">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn-edit">
                                    Edit
                                </a>

                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Delete this product?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>