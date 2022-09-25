<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elequent Relationship : Relasi one to one</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <h3 class="text-center">RELATIONSHIP</h3>
                <h5 class="text-center my-4">One To One</h5>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama User</th>
                            <th>Nomor Telepon</th>
                            <th>Roles</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                        <tr>

                            <td>{{ $item->name}}</td>
                            <td>{{ $item->phone->phone }}</td>
                            <td>
                                @foreach ($item->roles()->get() as $role)
                                <button class="btn btn-primary btn-sm me-2">{{ $role->name }}</button>
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>

</html>