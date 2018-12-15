<!DOCTYPE html>
<html lang="en">


@include('Theme2.partials.head')
@include('Theme2.partials.nav')
{{-- @include('Theme2.partials.footer') --}}
@include('Theme2.partials.cart-modal')


<!--Main Layout-->
<main>

    <!-- Main Container -->
    <div class="container">

        <!-- Section cart -->
        <section class="section my-5 pb-5">

            <div class="card card-ecommerce">
                <div class="card-body">

                    <!-- Shopping Cart table -->
                    <div class="table-responsive">
                        @if (session()->has('success_message'))
                            <div class="alert alert-success">
                                {{ session()->get('success_message') }}
                            </div>
                        @endif

                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <table class="table product-table">

                            <!-- Table head -->
                            <thead class="mdb-color lighten-5">
                            <tr>
                                <th></th>
                                <th class="font-weight-bold">
                                    <strong>نام محصول</strong>
                                </th>
                                {{-- <th class="font-weight-bold">
                                    <strong>Color</strong>
                                </th> --}}
                                <th></th>
                                <th class="font-weight-bold">
                                    <strong>قیمت محصول</strong>
                                </th>
                                <th class="font-weight-bold">
                                    <strong>تعداد محصول </strong>
                                </th>
                                <th class="font-weight-bold">
                                    <strong>هزینه نهایی محصول</strong>
                                </th>
                                <th></th>
                            </tr>
                            </thead>
                            <!-- /.Table head -->

                            <!-- Table body -->
                            <tbody>
                            @if(Cart::count()>0)
                                @foreach(Cart::content() as $item)
                                    <!-- First row -->
                                    <tr>
                                        <th scope="row">
                                            <img src="/storage/{{$item->model->image}}"
                                                 alt="" class="img-fluid z-depth-0">
                                        </th>
                                        <td>
                                            <h5 class="mt-3">
                                                <strong>{{$item->model->name}}</strong>
                                            </h5>
                                            <p class="text-muted">{{$item->model->name}}</p>
                                        </td>
                                        {{-- <td>White</td> --}}
                                        <td></td>
                                        <td>{{$item->model->price}}</td>
                                        <td class="text-center text-md-left">
                                            <span class="qty"  id="number"  data-id="{{$item->rowId}}">{{$item->qty}}</span>
                                            {{--<input type="number" id="number" value="0" />--}}
                                            <div class="btn-group radio-group ml-2" data-toggle="buttons">
                                                <label class="btn btn-sm btn-primary btn-rounded" id="decrease" onclick="decreaseValue()" value="Decrease Value">
                                                    <input type="radio" name="options" id="option1">&mdash;
                                                </label>
                                                <label class="btn btn-sm btn-primary btn-rounded" id="increase" onclick="increaseValue()" value="Increase Value">
                                                    <input type="radio" name="options" id="option2">+
                                                </label>
                                            </div>
                                        </td>

                                        <td class="font-weight-bold">
                                            <strong>{{Cart::subtotal()}}</strong>
                                        </td>
                                        <td>
                                            <form action="{{route('cart.destroy',$item->rowId)}}" method="post">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-sm btn-primary" data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="Remove item">X
                                            </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <!-- /.First row -->
                                @endforeach

                                <tr>

                                    <td>
                                        <h6 class="mt-2 text-center">
                                            <strong>مالیات</strong>
                                        </h6>
                                    </td>
                                    <td class="text-right">
                                        <h6 class="mt-2 float-left">
                                            <strong>{{Cart::tax()}}</strong>
                                        </h6>
                                    </td>
                                    <td colspan="2"></td>

                                    <td>
                                        <h4 class="mt-2">
                                            <strong>Total</strong>
                                        </h4>
                                    </td>
                                    <td class="text-right">
                                        <h4 class="mt-2">
                                            <strong>{{Cart::total()}}</strong>
                                        </h4>
                                    </td>

                                    <td colspan="3" class="text-right">
                                        <a href="{{route('checkout.index')}}">
                                        <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light" style="font-size:18px;">تکمیل خرید
                                        </button>
                                        </a>
                                    </td>
                                </tr>
                            @else
                                <h3>سبد خرید شما خالیست</h3>
                            @endif
                            </tbody>
                            <!-- /.Table body -->

                        </table>

                    </div>
                    <!-- /.Shopping Cart table -->

                </div>

            </div>

        </section>
        <!-- /Section cart -->

        <!-- Section products -->
        {{-- <section>
            <h4 class="font-weight-bold mt-4 title-1">
                <strong>YOU MAY BE INTERESTED IN</strong>
            </h4>
            <hr class="blue mb-5">

            <!-- Grid row -->
            <div class="row mb-3">

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4">

                    <!--Card-->
                    <div class="card card-ecommerce">

                        <!--Card image-->
                        <div class="view overlay">
                            <img src="../../../../../img/Photos/Horizontal/E-commerce/Products/12.jpg" class="img-fluid"
                                 alt="">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <!--Card image-->

                        <!--Card content-->
                        <div class="card-body">
                            <!--Category & Title-->

                            <h5 class="card-title mb-1">
                                <strong>
                                    <a href="#" class="dark-grey-text">Sony D74v</a>
                                </strong>
                            </h5>
                            <span class="badge badge-info mb-2">new</span>
                            <!-- Rating -->
                            <ul class="rating">
                                <li>
                                    <i class="fa fa-star blue-text"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star blue-text"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star blue-text"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star blue-text"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star blue-text"></i>
                                </li>
                            </ul>

                            <!--Card footer-->
                            <div class="card-footer pb-0">
                                <div class="row mb-0">
                    <span class="float-left">
                      <strong>1439$</strong>
                    </span>
                                    <span class="float-right">
                      <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart">
                        <i class="fa fa-shopping-cart ml-3"></i>
                      </a>
                    </span>
                                </div>
                            </div>

                        </div>
                        <!--Card content-->

                    </div>
                    <!--Card-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4">

                    <!--Card-->
                    <div class="card card-ecommerce">

                        <!--Card image-->
                        <div class="view overlay">
                            <img src="../../../../../img/Photos/Horizontal/E-commerce/Products/8.jpg" class="img-fluid"
                                 alt="">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <!--Card image-->

                        <!--Card content-->
                        <div class="card-body">
                            <!--Category & Title-->

                            <h5 class="card-title mb-1">
                                <strong>
                                    <a href="#" class="dark-grey-text">Samsung V54</a>
                                </strong>
                            </h5>
                            <span class="badge badge-info mb-2">new</span>
                            <!-- Rating -->
                            <ul class="rating">
                                <li>
                                    <i class="fa fa-star blue-text"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star blue-text"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star blue-text"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star blue-text"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star blue-text"></i>
                                </li>
                            </ul>

                            <!--Card footer-->
                            <div class="card-footer pb-0">
                                <div class="row mb-0">
                    <span class="float-left">
                      <strong>1439$</strong>
                    </span>
                                    <span class="float-right">
                      <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart">
                        <i class="fa fa-shopping-cart ml-3"></i>
                      </a>
                    </span>
                                </div>
                            </div>

                        </div>
                        <!--Card content-->

                    </div>
                    <!--Card-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4">
                    <!--Card-->
                    <div class="card card-ecommerce">

                        <!--Card image-->
                        <div class="view overlay">
                            <img src="../../../../../img/Photos/Horizontal/E-commerce/Products/7.jpg" class="img-fluid"
                                 alt="">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <!--Card image-->

                        <!--Card content-->
                        <div class="card-body">
                            <!--Category & Title-->

                            <h5 class="card-title mb-1">
                                <strong>
                                    <a href="#" class="dark-grey-text">Dell 786i</a>
                                </strong>
                            </h5>
                            <span class="badge badge-info mb-2">new</span>
                            <!-- Rating -->
                            <ul class="rating">
                                <li>
                                    <i class="fa fa-star blue-text"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star blue-text"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star blue-text"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star blue-text"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star grey-text"></i>
                                </li>
                            </ul>

                            <!--Card footer-->
                            <div class="card-footer pb-0">
                                <div class="row mb-0">
                    <span class="float-left">
                      <strong>1439$</strong>
                    </span>
                                    <span class="float-right">
                      <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart">
                        <i class="fa fa-shopping-cart ml-3"></i>
                      </a>
                    </span>
                                </div>
                            </div>

                        </div>
                        <!--Card content-->

                    </div>
                    <!--Card-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4">

                    <!--Card-->
                    <div class="card card-ecommerce">

                        <!--Card image-->
                        <div class="view overlay">
                            <img src="../../../../../img/Photos/Horizontal/E-commerce/Products/9.jpg" class="img-fluid"
                                 alt="">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <!--Card image-->

                        <!--Card content-->
                        <div class="card-body">
                            <!--Category & Title-->

                            <h5 class="card-title mb-1">
                                <strong>
                                    <a href="#" class="dark-grey-text">Canon 675-D</a>
                                </strong>
                            </h5>
                            <span class="badge badge-info mb-2">new</span>
                            <span class="badge badge-success mb-2 ml-2">SALE</span>
                            <!-- Rating -->
                            <ul class="rating">
                                <li>
                                    <i class="fa fa-star blue-text"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star blue-text"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star blue-text"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star blue-text"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star blue-text"></i>
                                </li>
                            </ul>

                            <!--Card footer-->
                            <div class="card-footer pb-0">
                                <div class="row mb-0">
                                    <h5 class="mb-0 pb-0 mt-1 font-weight-bold">
                      <span class="red-text">
                        <strong>$1199</strong>
                      </span>
                                        <span class="grey-text">
                        <small>
                          <s>$1520</s>
                        </small>
                      </span>
                                    </h5>

                                    <span class="float-right">

                      <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart">
                        <i class="fa fa-shopping-cart ml-3"></i>
                      </a>
                    </span>
                                </div>
                            </div>

                        </div>
                        <!--Card content-->

                    </div>
                    <!--Card-->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->


            <!--Grid row-->
            <div class="row flex-center mb-5">

                <p>
                    <a class="btn btn-primary btn-rounded mb-5" data-toggle="collapse" href="#collapseExample1"
                       aria-expanded="false"
                       aria-controls="collapseExample1">More products</a>
                </p>
                <div class="collapse" id="collapseExample1">

                    <!-- Grid row -->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-lg-3 col-md-6 mb-4">

                            <!--Card-->
                            <div class="card card-ecommerce">

                                <!--Card image-->
                                <div class="view overlay">
                                    <img src="../../../../../img/Photos/Horizontal/E-commerce/Products/3.jpg"
                                         class="img-fluid"
                                         alt="">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <!--Card image-->

                                <!--Card content-->
                                <div class="card-body">
                                    <!--Category & Title-->

                                    <h5 class="card-title mb-1">
                                        <strong>
                                            <a href="#" class="dark-grey-text">Asus GR-597</a>
                                        </strong>
                                    </h5>
                                    <span class="badge badge-danger mb-2">bestseller</span>
                                    <!-- Rating -->
                                    <ul class="rating text-left">
                                        <li>
                                            <i class="fa fa-star blue-text"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star blue-text"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star blue-text"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star blue-text"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star blue-text"></i>
                                        </li>
                                    </ul>

                                    <!--Card footer-->
                                    <div class="card-footer pb-0">
                                        <div class="row mb-0">
                        <span class="float-left">
                          <strong>1439$</strong>
                        </span>
                                            <span class="float-right">
                          <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart">
                            <i class="fa fa-shopping-cart ml-3"></i>
                          </a>
                        </span>
                                        </div>
                                    </div>

                                </div>
                                <!--Card content-->

                            </div>
                            <!--Card-->

                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-lg-3 col-md-6 mb-4">

                            <!--Card-->
                            <div class="card card-ecommerce">

                                <!--Card image-->
                                <div class="view overlay">
                                    <img src="../../../../../img/Photos/Horizontal/E-commerce/Products/5.jpg"
                                         class="img-fluid"
                                         alt="">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <!--Card image-->

                                <!--Card content-->
                                <div class="card-body">
                                    <!--Category & Title-->

                                    <h5 class="card-title mb-1">
                                        <strong>
                                            <a href="#" class="dark-grey-text">Asus CT-567</a>
                                        </strong>
                                    </h5>
                                    <span class="badge badge-danger mb-2">bestseller</span>
                                    <!-- Rating -->
                                    <ul class="rating text-left">
                                        <li>
                                            <i class="fa fa-star blue-text"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star blue-text"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star blue-text"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star blue-text"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star blue-text"></i>
                                        </li>
                                    </ul>

                                    <!--Card footer-->
                                    <div class="card-footer pb-0">
                                        <div class="row mb-0">
                        <span class="float-left">
                          <strong>1439$</strong>
                        </span>
                                            <span class="float-right">
                          <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart">
                            <i class="fa fa-shopping-cart ml-3"></i>
                          </a>
                        </span>
                                        </div>
                                    </div>

                                </div>
                                <!--Card content-->

                            </div>
                            <!--Card-->

                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-lg-3 col-md-6 mb-4">
                            <!--Card-->
                            <div class="card card-ecommerce">

                                <!--Card image-->
                                <div class="view overlay">
                                    <img src="../../../../../img/Photos/Horizontal/E-commerce/Products/2.jpg"
                                         class="img-fluid"
                                         alt="">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <!--Card image-->

                                <!--Card content-->
                                <div class="card-body">
                                    <!--Category & Title-->

                                    <h5 class="card-title mb-1">
                                        <strong>
                                            <a href="#" class="dark-grey-text">iPad PRO</a>
                                        </strong>
                                    </h5>
                                    <span class="badge badge-danger mb-2">bestseller</span>
                                    <span class="badge badge-success mb-2 ml-2">SALE</span>
                                    <!-- Rating -->
                                    <ul class="rating text-left">
                                        <li>
                                            <i class="fa fa-star blue-text"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star blue-text"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star blue-text"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star blue-text"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star grey-text"></i>
                                        </li>
                                    </ul>

                                    <!--Card footer-->
                                    <div class="card-footer pb-0">
                                        <div class="row mb-0">
                                            <h5 class="mb-0 pb-0 mt-1 font-weight-bold">
                          <span class="red-text">
                            <strong>$699</strong>
                          </span>
                                                <span class="grey-text">
                            <small>
                              <s>$920</s>
                            </small>
                          </span>
                                            </h5>

                                            <span class="float-right">

                          <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart">
                            <i class="fa fa-shopping-cart ml-3"></i>
                          </a>
                        </span>
                                        </div>
                                    </div>

                                </div>
                                <!--Card content-->

                            </div>
                            <!--Card-->

                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-lg-3 col-md-6 mb-4">

                            <!--Card-->
                            <div class="card card-ecommerce">

                                <!--Card image-->
                                <div class="view overlay">
                                    <img src="../../../../../img/Photos/Horizontal/E-commerce/Products/4.jpg"
                                         class="img-fluid"
                                         alt="">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <!--Card image-->

                                <!--Card content-->
                                <div class="card-body">
                                    <!--Category & Title-->

                                    <h5 class="card-title mb-1">
                                        <strong>
                                            <a href="#" class="dark-grey-text">Dell V-964i</a>
                                        </strong>
                                    </h5>
                                    <span class="badge badge-danger mb-2">bestseller</span>
                                    <!-- Rating -->
                                    <ul class="rating text-left">
                                        <li>
                                            <i class="fa fa-star blue-text"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star blue-text"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star blue-text"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star blue-text"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star blue-text"></i>
                                        </li>
                                    </ul>

                                    <!--Card footer-->
                                    <div class="card-footer pb-0">
                                        <div class="row mb-0">
                        <span class="float-left">
                          <strong>1439$</strong>
                        </span>
                                            <span class="float-right">

                          <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart">
                            <i class="fa fa-shopping-cart ml-3"></i>
                          </a>
                        </span>
                                        </div>
                                    </div>

                                </div>
                                <!--Card content-->

                            </div>
                            <!--Card-->

                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->

                </div>

            </div>
            <!--Grid row-->

        </section> --}}
        <!-- Section products -->

    </div>
    <!-- /.Main Container -->

</main>
<!--Main Layout-->




<!-- SCRIPTS -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script type="text/javascript">

    function increaseValue() {
        //var x=document.getElementById('number').innerHTML;
        var value = parseInt(document.getElementById('number').innerHTML, 10);
        //console.log(x);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('number').innerHTML = value;
        const id =document.getElementById('number').getAttribute('data-id');
        axios.patch('/cart/${id}', {
            qty:value
        })
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });

    }

    function decreaseValue() {
        var value = parseInt(document.getElementById('number').innerHTML, 10);
        value = isNaN(value) ? 0 : value;
        value < 2 ? value = 2 : '';
        value--;
        document.getElementById('number').innerHTML = value;
    }

</script>


<!-- JQuery -->
<script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>

<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../../js/popper.min.js"></script>

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../../js/bootstrap.min.js"></script>

<!-- MDB core JavaScript -->
<script type="text/javascript" src="../../js/mdb.min.js"></script>
<script type="text/javascript">
    /* WOW.js init */
    new WOW().init();

    // MDB Lightbox Init
    $(function () {
        $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
    });

    // Tooltips Initialization
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    // SideNav Initialization
    $(".button-collapse").sideNav();

    // Material Select Initialization
    $(document).ready(function () {
        $('.mdb-select').material_select();
    });

</script>
<!-- SCRIPTS -->


</body>


</html>
