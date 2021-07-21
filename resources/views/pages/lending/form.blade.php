<form action="{{ $data->exists ? route('lending.update', $data->id) : route('lending.store')}}" method="POST">
    @method($data->exists ? 'PUT' : 'POST')
    @csrf
    <div class="form-group">
        <label>Date of Joined</label>
        <input type="date" name="joined" id="joined" value="" class="form-control">
    </div>
    <div class="form-group">
        <label>Member</label>
        <select name="member_id" id="member_id" class="form-control">
        </select>
    </div>
    <div class="form-group">
        <label>Movie</label>
        <select name="movie_id" id="movie_id" class="form-control">
        </select>
    </div>
</form>

<script type="text/javascript">
    $('#member_id').select2({
        placeholder: 'Select member',
        theme: "bootstrap",
        ajax: {
            url: '/api/member',
            data: function (params) {
                var query = {
                    search: params.term,
                }
                return query;
            },
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
            return {
                results:  $.map(data, function (item) {
                    return {
                        text: item.name,
                        id: item.id
                    }
                })
            };
            },
            cache: true
        }
    });
</script>
<script type="text/javascript">
    $('#movie_id').select2({
        placeholder: 'Select movie',
        theme: "bootstrap",
        ajax: {
            url: '/api/movie',
            data: function (params) {
                var query = {
                    search: params.term,
                }
                return query;
            },
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
            return {
                results:  $.map(data, function (item) {
                    return {
                        text: item.title,
                        id: item.id
                    }
                })
            };
            },
            cache: true
        }
    });
</script>
