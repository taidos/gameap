@php($title = 'File Manager')

@extends('layouts.main')

@section('breadclumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">GameAP</a></li>
        <li class="breadcrumb-item"><a href="{{ route('servers') }}">Servers</a></li>
        <li class="breadcrumb-item"><a href="{{ route('servers.control', ['server' => $server->id]) }}">{{ $server->name }}</a></li>
        <li class="breadcrumb-item active">File Manager</li>
    </ol>
@endsection

@section('content')
    <file-manager server-id="{{ $server->id }}">
    </file-manager>
@endsection