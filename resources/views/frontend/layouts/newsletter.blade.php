
<!-- Start Shop Newsletter 
<section class="shop-newsletter section"> -->
    <div class="container">
        <div class="inner-top">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-12">
                    <!-- Start Newsletter Inner -->
                    <div class="inner">
                        <h4>Boletin informativo</h4>
                        <p> Suscríbete a nuestra newsletter y consigue un <span>10%</span> de descuento en tu primera compra</p>
                        <form action="{{route('subscribe')}}" method="post" class="newsletter-inner">
                            @csrf
                            <input name="email" placeholder="Su dirección de correo electrónico" required="" type="email">
                            <button class="btn" type="submit">Suscríbete</button>
                        </form>
                    </div>
                    <!-- End Newsletter Inner -->
                </div>
            </div>
        </div>
    </div>
<!--</section>
 End Shop Newsletter -->