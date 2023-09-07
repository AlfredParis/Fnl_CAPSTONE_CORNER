@extends('layout.dashboardLayout')

@section('title')
    Admin Dashboard
@endsection

@section('topnav')

<a href="{{ route('admin.archives') }}" class="inactive">Return</a>



@endsection

@section('main')
    This is view
    {{$show->acctype}}
@endsection
