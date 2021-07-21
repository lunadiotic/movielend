<form action="{{ $data->exists ? route('return.update', $data->id) : route('return.store')}}" method="POST">
    @method($data->exists ? 'PUT' : 'POST')
    @csrf
    <div class="form-group">
        <label>Date of Joined</label>
        <input type="date" name="lending" id="lending" value="{{ $data->lending }}" class="form-control">
    </div>
    <div class="form-group">
        <label>Member</label>
        <select name="member_id" id="member_id" class="form-control" disabled>
            <option value="{{ $data->member_id }}">{{ $data->member->name }}</option>
        </select>
    </div>
    <div class="form-group">
        <label>Movie</label>
        <select name="movie_id" id="movie_id" class="form-control" disabled>
            <option value="{{ $data->movie_id }}">{{ $data->movie->title }}</option>
        </select>
    </div>
    <div class="form-group">
        <label>Date of Joined</label>
        <input type="date" name="returned" id="returned" value="{{ $data->returned }}" class="form-control">
    </div>
    <div class="form-group">
        <label>Lateness Charge</label>
        <input type="number" name="lateness_charge" id="lateness_charge" value="{{ $data->lateness_charge }}"
            class="form-control">
    </div>
</form>
