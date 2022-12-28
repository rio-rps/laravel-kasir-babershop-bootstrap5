@extends('layout.main')


@section('isi')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Content</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ -</span>
        </div>
    </div>
    <div class="d-flex my-xl-auto right-content">
        <div class="pe-1 mb-xl-0">
            <button type="button" class="btn btn-danger btn-icon me-2"><i class="mdi mdi-star"></i></button>
        </div>
        <div class="pe-1 mb-xl-0">
            <button type="button" class="btn btn-warning  btn-icon me-2"><i class="mdi mdi-refresh"></i></button>
        </div>
    </div>
</div>
<!-- breadcrumb -->

<!-- row -->
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    Basic Wizard With Validation
                </div>
                <p class="mg-b-20">It is Very Easy to Customize and it uses in your website
                    apllication.</p>
                <div id="wizard2">
                    <h3>Personal Information</h3>
                    <section>
                        <p class="mg-b-20">Try the keyboard navigation by clicking arrow left or
                            right!</p>
                        <div class="row row-sm">
                            <div class="col-md-5 col-lg-4">
                                <label class="form-control-label">Firstname: <span class="tx-danger">*</span></label> <input class="form-control" id="firstname" name="firstname" placeholder="Enter firstname" required="" type="text">
                            </div>
                            <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
                                <label class="form-control-label">Lastname: <span class="tx-danger">*</span></label> <input class="form-control" id="lastname" name="lastname" placeholder="Enter lastname" required="" type="text">
                            </div>
                        </div>
                    </section>
                    <h3>Billing Information</h3>
                    <section>
                        <p>Wonderful transition effects.</p>
                        <div class="form-group wd-xs-300">
                            <label class="form-control-label">Email: <span class="tx-danger">*</span></label> <input class="form-control" id="email" name="email" placeholder="Enter email address" required="" type="email">
                        </div>
                    </section>
                    <h3>Payment Details</h3>
                    <section>
                        <div class="form-group">
                            <label class="form-label">CardHolder Name</label>
                            <input type="text" class="form-control" id="name11" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Card number</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-text bg-transparent border-0 p-0">
                                    <button class="btn btn-info" type="button"><i class="fab fa-cc-visa"></i> &nbsp; <i class="fab fa-cc-amex"></i> &nbsp;
                                        <i class="fab fa-cc-mastercard"></i></button>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group mb-sm-0">
                                    <label class="form-label">Expiration</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" placeholder="MM" name="expiremonth">
                                        <input type="number" class="form-control" placeholder="YY" name="expireyear">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 ">
                                <div class="form-group mb-0">
                                    <label class="form-label">CVV <i class="fa fa-question-circle"></i></label>
                                    <input type="number" class="form-control" required="">
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /row -->
@endsection