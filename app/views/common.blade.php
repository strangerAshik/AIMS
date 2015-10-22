
@section('print')
<a class="btn btn-primary hidden-print"id='printOption'href="javascript:void();" onclick=" myFunction(); return true;">Print/Save</a>
<script>
function myFunction() {
    window.print();
}
</script>
@stop