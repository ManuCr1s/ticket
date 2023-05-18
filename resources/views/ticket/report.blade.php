@extends('template.template')
@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('container')
<div id="env" data-api-url="{{env('APP_ROUTE')}}"></div>
<form id="form_date">
    <select name="anio" id="anio">
        <option selected>Seleccione Año</option>
        <option value="2021">2021</option>
        <option value="2022">2022</option>
        <option value="2023">2023</option>
    </select>
    <input type="text" name="ticket" id="ticket">
    <input type="submit" value="CONSULTAR">
</form>
@endsection
