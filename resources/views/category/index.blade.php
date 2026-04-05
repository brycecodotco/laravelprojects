<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Management</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>

    <div class="container">
        <div class="header-section">
            <h1>Categories</h1>
            <div class="actions">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">← Back to Products</a>
            </div>
        </div>

        <div class="card">
            <h3>Create New Category</h3>
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="form-group" style="max-width: 400px;">
                    <label>Category Name</label>
                    <input type="text" name="name" placeholder="e.g., Produce, Dairy..." required>
                </div>
                <button type="submit" class="btn btn-success">Save Category</button>
            </form>
        </div>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th style="width: 80px;">ID</th>
                        <th>Category Name</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>#{{ $category->id }}</td>
                            <td><strong>{{ $category->name }}</strong></td>
                            <td>
                                <div class="action-group">
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn-edit">
                                        Edit
                                    </a>

                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST"
                                        onsubmit="return confirm('Delete this category?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>