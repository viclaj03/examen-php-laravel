@extends('layouts.gangaBatoi')
@section('content')
<div class="row">
    <div @class('col-12')>
        <h1>Contacto</h1>
    </div>
<div class="col-12">
<table>
    <thead>
    <th>Telefono</th>
    <th>Email</th>
    </thead>
    <tbody>
    <td><i class="ti-mobile ti-"><?=config('menu')['telefono']?> </i> </td>
    <td><i class="bi ti-email "><?=config('menu')['email']?></td>
    </tbody>
</table>
</div>
</div>
@endsection
