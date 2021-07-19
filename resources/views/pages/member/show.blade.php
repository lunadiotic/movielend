<table class="table">
    <tbody>
        <tr>
            <th>Name</th>
            <td>{{ $data->name }}</td>
        </tr>
        <tr>
            <th>Age</th>
            <td>{{ $data->age }}</td>
        </tr>
        <tr>
            <th>Address</th>
            <td>{{ $data->address }}</td>
        </tr>
        <tr>
            <th>Telephone</th>
            <td>{{ $data->telephone }}</td>
        </tr>
        <tr>
            <th>Identity Number</th>
            <td>{{ $data->identity_number }}</td>
        </tr>

        <tr>
            <th>Joined</th>
            <td>{{ $data->joined }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $data->is_active ? 'Active' : 'Deactive' }}</td>
        </tr>
    </tbody>
</table>
