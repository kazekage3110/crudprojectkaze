<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel 9 CRUD Tutorial Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <style>
        body {
            font-family: sans-serif;
            background-color: white;
        }

        .container {
            font-family: sans-serif;
            margin-top: 2rem;
        }

        h2 {
            margin-top: 0;
        }

        .btn-success {
            margin-bottom: 1rem;
            padding: 5px 30px;
            border: none;
            outline: none;
            background-color: aquamarine;
            color: white;
            cursor: pointer;
            border-radius: 4px;
            font-size: 20px;
            display: block;
            margin: 0 auto;
            transition: 0.2s all;

        }

        .table {
            margin-bottom: 1rem;
            background-color: lightblue;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Laravel 9 CRUD Example Tutorial</h2>
                    
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('companies.create') }}">Create Company</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Company Name</th>
                    <th>Company Email</th>
                    <th>Company Address</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->address }}</td>
                        <td>
                            <form action="{{ route('companies.destroy',$company->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('companies.edit',$company->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $companies->links() !!}
    </div>
</body>
</html>
