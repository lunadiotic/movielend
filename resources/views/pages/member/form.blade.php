<form action="{{ $model->exists ? route('member.update', $model->id) : route('member.store')}}" method="POST">
    @method($model->exists ? 'PUT' : 'POST')
    @csrf
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" id="name" class="form-control">
    </div>
    <div class="form-group">
        <label>Age</label>
        <input type="number" name="age" id="age" class="form-control">
    </div>
    <div class="form-group">
        <label>Telephone</label>
        <input type="number" name="telephone" id="telephone" class="form-control">
    </div>
    <div class="form-group">
        <label>Address</label>
        <textarea name="address" id="address" cols="30" rows="5" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label>Identity Number</label>
        <input type="number" name="identity_number" id="identity_number" class="form-control">
    </div>
    <div class="form-group">
        <label>Date of Joined</label>
        <input type="date" name="joined" id="joined" class="form-control">
    </div>
    <div class="form-group">
        <label>Status</label>
        <select name="is_active" id="is_active" class="form-control">
            <option value="1" selected>Active</option>
            <option value="0">Deactive</option>
        </select>
    </div>
</form>
