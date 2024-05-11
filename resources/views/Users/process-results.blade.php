<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Processing Results</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
        /* Estilos CSS personalizados */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
<h1>User Processing Results</h1>

@if (count($processedUsers) > 0 || count($createdUsers) > 0 || count($updatedUsers) > 0)
    <table id="userTable">
        <thead>
        <tr>
            <th>User Type</th>
            <th>UID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Phone Number</th>
            <th>Social Insurance Number</th>
            <th>Date of Birth</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($processedUsers as $user)
            <tr>
                <td>Processed</td>
                <td>{{ $user->uid }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->gender }}</td>
                <td>{{ $user->phone_number }}</td>
                <td>{{ $user->social_insurance_number }}</td>
                <td>{{ $user->date_of_birth }}</td>
            </tr>
        @endforeach

        @foreach ($createdUsers as $userCreated)
            <tr>
                <td>Created</td>
                <td>{{ $userCreated->uid }}</td>
                <td>{{ $userCreated->first_name }}</td>
                <td>{{ $userCreated->last_name }}</td>
                <td>{{ $userCreated->username }}</td>
                <td>{{ $userCreated->email }}</td>
                <td>{{ $userCreated->gender }}</td>
                <td>{{ $userCreated->phone_number }}</td>
                <td>{{ $userCreated->social_insurance_number }}</td>
                <td>{{ $userCreated->date_of_birth }}</td>
            </tr>
        @endforeach

        @foreach ($updatedUsers as $userUpdated)
            <tr>
                <td>Updated</td>
                <td>{{ $userUpdated->uid }}</td>
                <td>{{ $userUpdated->first_name }}</td>
                <td>{{ $userUpdated->last_name }}</td>
                <td>{{ $userUpdated->username }}</td>
                <td>{{ $userUpdated->email }}</td>
                <td>{{ $userUpdated->gender }}</td>
                <td>{{ $userUpdated->phone_number }}</td>
                <td>{{ $userUpdated->social_insurance_number }}</td>
                <td>{{ $userUpdated->date_of_birth }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>No users were processed.</p>
@endif

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    // Inicializar DataTables con opciones de búsqueda y filtrado
    $(document).ready(function() {
        $('#userTable').DataTable({
            searching: true, // Activar búsqueda
            paging: true, // Activar paginación
            ordering: true, // Activar ordenamiento
            info: true // Mostrar información de la tabla
        });
    });
</script>
</body>
</html>
