@extends('frontend.layouts.master')

@section('title', config('app.name', 'Talitek') . ' || Seguimiento de pedidos')
@section('main-content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">Inicio<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">Seguimiento de pedidos</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
<section class="tracking_box_area section_gap py-5">
    <div class="container">
        <div class="tracking_box_inner">
            <p>Para realizar un seguimiento de su pedido, ingrese su ID de pedido en el cuadro a continuación y haga clic en el botón "Seguimiento". esto fue dado
                en su recibo y en el correo electrónico de confirmación que debería haber recibido o puede obtener su identificación de pedido desde su panel de usuario.</p>
            <form class="row tracking_form my-4" action="{{route('product.track.order')}}" method="post" novalidate="novalidate">
              @csrf
                <div class="col-md-8 form-group">
                    <input type="text" class="form-control p-2"  name="order_number" placeholder="Ingrese su número de pedido">
                </div>
                <div class="col-md-8 form-group">
                    <button type="submit" value="submit" class="btn submit_btn">Seguimiento</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection