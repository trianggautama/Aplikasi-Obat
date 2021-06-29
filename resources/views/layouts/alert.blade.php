<script>
        @foreach ($errors->all() as $error)
            toastr.error('{{$error}}');
         @endforeach

        @if(Session::has('success'))             
            toastr.success('{{ Session::get('success') }}');
        @endif

        @if(Session::has('warning'))
            toastr.warning('{{ Session::get('warning') }}');
        @endif
</script>