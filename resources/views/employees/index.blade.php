<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Form</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Employee Form</h1>
        <form action="/employeeform" method="POST" class="product-form">
            @csrf
            <div class="form-group">
                <label for="FirstName">First Name:</label>
                <input type="text" id="FirstName" name="FirstName">
            </div>
            <div class="form-group">
                <label for="LastName">Last Name:</label>
                <input type="text" id="LastName" name="LastName">
            </div>
            <div class="form-group">
                <label for="Job">Job:</label>
                <input type="text" id="Job" name="Job">
            </div>
            <div class="form-group">
                <label for="Salary">Salary:</label>
                <input type="text" id="Salary" name="Salary">
            </div>
            <button type="submit" class="btn-submit">Save</button>
        </form>
        <hr>
        <table class="product-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Job</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->FirstName }}</td>
                        <td>{{ $employee->LastName }}</td>
                        <td>{{ $employee->Job }}</td>
                        <td>₱{{ $employee->Salary }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>