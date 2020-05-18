
<!--Para ver si hay una sesion abierta ya.-->
@if(session('status')) 
<div class="alert alert-info alert-dismissible fade show" role="alert">
    {{ session('status') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif