@if (count($errors) > 0)
<div class="alert alert-danger" role="alert">
    @foreach($errors->all() as $error)
    <div>{{ $error }}</div>
    @endforeach
</div>
@endif