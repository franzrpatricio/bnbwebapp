@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container light-style flex-grow-1 container-p-y">
  <div class="card overflow-hidden mt-3">
    <div class="row no-gutters row-bordered row-border-light">
      <div class="card-body pb-2">
        @include('users.logsForm')

        {{-- display msg after redirecting --}}
        @if (isset($msg))
          <div class="alert alert-info">{{ $msg }}</div>
        @endif

        @include('users.logsTable')

        <div class="float-end">
          {{-- {{ $logs->onEachSide(2)->links() }} --}}
          {{ $logs->links() }}
        </div>
      </div>  
    </div>
  </div>
</div>
@endsection