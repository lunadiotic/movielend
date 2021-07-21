<form action="{{ $data->exists ? route('movie.update', $data->id) : route('movie.store')}}" method="POST">
    @method($data->exists ? 'PUT' : 'POST')
    @csrf
    <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" id="title" value="{{ $data->title }}" class="form-control">
    </div>
    <div class="form-group">
        <label>Genre</label>
        <input type="text" name="genre" id="genre" value="{{ $data->genre }}" class="form-control">
    </div>
    <div class="form-group">
        <label>Released</label>
        <input type="date" name="released" id="released" value="{{ $data->released }}" class="form-control">
    </div>
</form>
