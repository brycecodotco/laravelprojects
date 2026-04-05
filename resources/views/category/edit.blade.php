<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body style="display: flex; align-items: center; justify-content: center; min-height: 100vh;">

    <div class="card" style="max-width: 400px; margin: auto;">
        <h2>Update Category</h2>
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="action-group">
                <label>Category Name</label>
                <input type="text" name="name" value="{{ $category->name }}" required>
            </div>

            <div style="display: flex; gap: 10px; margin-top: 15px;">
                <button type="submit" class="btn btn-primary" style="flex: 2;">
                    Update Name
                </button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary"
                    style="flex: 1; text-align: center;">
                    Cancel
                </a>
            </div>
        </form>
    </div>

</body>

</html>