@extends('layout')
@section('content')
<section style="padding: 90px;">
<h3> Thank you for being with us.</h3>
</section>
<script>
    @if (session('status'))
        alertify.set('notifier','position','bottom-right');
        alertify.success("{{ session('status') }}");

    @endif
</script>
@endsection
