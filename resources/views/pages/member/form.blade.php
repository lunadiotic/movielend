<form action="{{ $data->exists ? route('member.update', $data->id) : route('member.store')}}" method="POST">
    @method($data->exists ? 'PUT' : 'POST')
    @csrf
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $data->name }}">
    </div>
    <div class="form-group">
        <label>Age</label>
        <input type="number" name="age" id="age" value="{{ $data->age }}" class="form-control">
    </div>
    <div class="form-group">
        <label>Telephone</label>
        <input type="text" name="telephone" id="telephone" value="{{ $data->telephone }}" class="form-control">
    </div>
    <div class="form-group">
        <label>Address</label>
        <textarea name="address" id="address" cols="30" rows="5" class="form-control">{{ $data->address }}</textarea>
    </div>
    <div class="form-group">
        <label>Identity Number</label>
        <input type="text" name="identity_number" id="identity_number" value="{{ $data->identity_number }}"
            class="form-control">
    </div>
    <div class="form-group">
        <label>Date of Joined</label>
        <input type="date" name="joined" id="joined" value="{{ $data->joined }}" class="form-control">
    </div>
    <div class="form-group">
        <label>Status</label>
        <select name="is_active" id="is_active" class="form-control">
            <option value=1 {{ $data->is_active == 1 ? 'selected' : ''}}>Active</option>
            <option value=0 {{ $data->is_active == 0 ? 'selected' : ''}}>Deactive</option>
        </select>
    </div>
</form>
