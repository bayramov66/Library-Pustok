@extends("layouts.master")

@section("title", 'Contact')

@section("content")
<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('client.index')}}">Home</a></li>
                    <li class="breadcrumb-item active">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<!-- Cart Page Start -->
<main class="contact_area inner-page-sec-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="google-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3038.4953244848157!2d49.836773875715494!3d40.39787655678707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307d7b10b31bbf%3A0xb8a84dda46c78a5!2sADAS%2F%20Azerbaijan%20Digital%20Arts%20School!5e0!3m2!1saz!2saz!4v1700567933054!5m2!1saz!2saz" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <div class="row mt--60 ">
            <div class="col-lg-5 col-md-5 col-12">
                <div class="contact_adress">
                    <div class="ct_address">
                        <h3 class="ct_title">Bizimlə Əlaqə</h3>
                    </div>
                    <div class="address_wrapper">
                        <div class="address">
                            <div class="icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-info-text">
                                <p><span>Address:</span> New York</p>
                            </div>
                        </div>
                        <div class="address">
                            <div class="icon">
                                <i class="far fa-envelope"></i>
                            </div>
                            <div class="contact-info-text">
                                <p><span>Email: </span> bayramovkamran_66gmail.com</p>
                            </div>
                        </div>
                        <div class="address">
                            <div class="icon">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <div class="contact-info-text">
                                <p><span>Phone:</span> +994503882665 </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-12 mt--30 mt-md--0">
                <div class="contact_form">
                    <h3 class="ct_title">Send Us a Message</h3>
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <form id="contact-form" action="{{ route('client.contact.send') }}" method="POST" class="contact-form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Your Name <span class="required">*</span></label>
                                    <input type="text" id="con_name" name="con_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Your Email <span class="required">*</span></label>
                                    <input type="email" id="con_email" name="con_email" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Your Phone*</label>
                                    <input type="text" id="con_phone" name="con_phone" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Your Message</label>
                                    <textarea id="con_message" name="con_message" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-btn">
                                    <button type="submit" value="submit" id="submit" class="btn btn-black" name="submit">send</button>
                                </div>
                                <div class="form__output"></div>
                            </div>
                        </div>
                    </form>
                    <div class="form-output">
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Cart Page End -->
</div>
<!--=================================
  Brands Slider
===================================== -->

@endsection
