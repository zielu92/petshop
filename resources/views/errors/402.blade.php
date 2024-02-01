@extends('errors::minimal')

@section('title', $exception->getMessage() ?? __('Payment Required'))
@section('code', '402')
@section('message', $exception->getMessage() ?? __('Payment Required'))
