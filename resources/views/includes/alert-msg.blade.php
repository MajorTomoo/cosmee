
@if(session()->has('message'))
    <div class="alert alert-success">
    {{ session()->get('message') }}
    </div>
@endif

<script>
$('.alert').fadeOut(3000);

</script>