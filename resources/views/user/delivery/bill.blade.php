<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@extends("user.layout.layout")
@section("page")
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Confirmation</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Confirmation</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Order Details Area =================-->
    <section class="order_details section_gap">
        <div class="container">
            <h3 class="title_confirmation">Thank you. Your order has been received.</h3>
            <div class="order_details_table">
                <h2>Order Details</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <p>Pixelstore fresh Blackberry</p>
                            </td>
                            <td>
                                <h5>x 02</h5>
                            </td>
                            <td>
                                <p>$720.00</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Pixelstore fresh Blackberry</p>
                            </td>
                            <td>
                                <h5>x 02</h5>
                            </td>
                            <td>
                                <p>$720.00</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Pixelstore fresh Blackberry</p>
                            </td>
                            <td>
                                <h5>x 02</h5>
                            </td>
                            <td>
                                <p>$720.00</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Subtotal</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>$2160.00</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Shipping</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>Flat rate: $50.00</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Total</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>$2210.00</p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Order Details Area =================-->

@endsection
</body>
</html>
