<table class="table">
    <tbody>
        <tr>
            <th>Date</th>
            <td>{{ $data->created_at }}</td>
        </tr>
        <tr>
            <th>Lending Date</th>
            <td>{{ $data->lending }}</td>
        </tr>
        <tr>
            <th>Member</th>
            <td>{{ $data->member->name }}</td>
        </tr>
        <tr>
            <th>Movie</th>
            <td>{{ $data->movie->title }}</td>
        </tr>
    </tbody>
</table>
