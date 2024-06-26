@php
    $settingfirst = DB::table('settings')->first();
@endphp
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-12">
            <!-- Start Single Service -->
            <div class="single-service">
                <i class="ti-truck"></i>
                <h4>Envío gratis</h4>
                <p>Pedidos superiores a <br> <strong>S/. {{$settingfirst->deliveryfree}}</strong></p>
            </div>
            <!-- End Single Service -->
        </div>
        <div class="col-lg-3 col-md-6 col-12">
            <!-- Start Single Service -->
            <div class="single-service">
                <i class="ti-reload"></i>
                <h4>Devolución gratuita</h4>
                <p>Devoluciones en 30 días</p>
            </div>
            <!-- End Single Service -->
        </div>
        <div class="col-lg-3 col-md-6 col-12">
            <!-- Start Single Service -->
            <div class="single-service">
                <i class="ti-lock"></i>
                <h4>Pago seguro</h4>
                <p>Pago 100% seguro</p>
            </div>
            <!-- End Single Service -->
        </div>
        <div class="col-lg-3 col-md-6 col-12">
            <!-- Start Single Service -->
            <div class="single-service">
                <i class="ti-wallet"></i>
                <h4>Mejor precio</h4>
                <p>Precio garantizado</p>
            </div>
            <!-- End Single Service -->
        </div>
    </div>
</div>