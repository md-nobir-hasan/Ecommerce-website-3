<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $company_info->title }}</title>
    <link rel="icon" type="image/png" href="{{ url('public/product/' . $company_info->logo) }}" />
    {{-- online css link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    {{-- custom css link --}}
    <link rel="stylesheet" href="{{ asset('css/css/style.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/css/style1.css') }}"> --}}
</head>

<body>
    <!-- Navbar  -->
    <div class="row text-center justify-content-center bg-success shadow-lg p-4 fixed-top rounded">
        <div class="col-md-8">
            <a class="navbar-brand" href="#">
                {{-- logo --}}
                <img class="rounded-pill" src="{{ url('public/product/' . $company_info->logo) }}" alt=""
                    style="width: 60px">
                {{-- Copany Name --}}
                <span style="font-size: 22px">{{ $company_info->name }}</span>
            </a>
        </div>
    </div>
    {{-- <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img class="rounded-pill" src="{{ url('public/product/' . $company_info->logo) }}" alt=""
                    style="width: 60px">
                <span style="font-size: 22px">{{ $company_info->name }}</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar-right" id="navbarSupportedContent">
                <ul class="navbar-nav navbar-right ml-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> --}}
    {{-- {{ url('public/product/' . $company_info->logo) }} --}}
    <!-- End Navbar  -->

    {{-- Body content --}}
    <div class="container-fluid">
        {{-- Paragrap div --}}
        <div class="row m-4 justify-content-md-center ">
            <div class="col-md-8 text-wrap text-center">
                <p class="text-wrap">🔰শৈশবের ডায়েরী / আমার স্মৃতিময় শৈশব। 😊
                    অনেকেই ডায়েরী ২ টার খোঁজ করেছেন কিন্তু পাননি। 🧐🧐 তাইতো
                    ডায়েরী নিজেই আপনাদের খোঁজ করার জন্য তাইতাই ডটকমের কাছে হাজির হয়েছে। 😎😎
                    খুঁজে না পাওয়া এমন অনেক বাচ্চাদের পণ্য পেতে আমাদের সাথেই থাকুন।🥰
                    বিস্তারিত জানতে নিচের ভিডিও টি সম্পূর্ণ দেখুন।</p>
            </div>
        </div>

        {{-- video section --}}
        <div class="video m-4 shadow p-4 mb-4 bg-white ">
            <iframe class="shadow-lg p-3 mb-5 bg-body rounded" width="560" height="315"
                src="https://www.youtube.com/embed/JnX7Oc8LqD8" title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        </div>

        {{-- product section --}}
        <section class="products" id="products">
            <h1 class="heading"><span>products</span> </h1>
            <div class="box-container">
                @foreach ($product_lists as $data)
                    <div class="box">
                        <span class="discount">-{{ $data->discount }}৳</span>
                        <div class="image">
                            <img class="img-fluid rounded-4 shadow-2-strong"
                                src="{{ url('public/product/' . $data->photo) }}" alt="Product Image">
                            <div class="icons">
                                <a href="#" class="fas fa-heart"></a>
                                <a href="#" class="cart-btn" data-bs-toggle="collapse"
                                    data-bs-target="#product-{{ $data->id }}" aria-expanded="false"
                                    aria-controls="product-{{ $data->id }}">Buy Now</a>
                                <a href="#" class="fas fa-shopping-cart"></a>
                            </div>
                        </div>
                        <div class="content">
                            <h3>{{ $data->title }}</h3>
                            <div class="price"> {{ $data->price }}৳ <span>{{ $data->discount }}৳</span> </div>
                        </div>
                    </div>

                    {{-- Order form --}}
                    <div class="collapse" id="product-{{ $data->id }}">
                        <div class="card card-body">
                            <form action="{{ route('order.store') }}" method="POST" class="row g-3 needs-validation">
                                @csrf
                                <div class="col-12 text-center">
                                    {{-- <label> Product Name <span class="text-danger"> {{ $data->title }}</span> --}}
                                    <input type="text" name="product_title" value="{{ $data->title }}" hidden>

                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label for="name" class="form-label">Name <span
                                            style="color: red;">*</span></label>
                                    <input name="first_name" type="text" class="form-control" id="name"
                                        placeholder="Enter your name" required>
                                    @if ($errors->has('first_name'))
                                        <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <label for="address1" class="form-label" placeholder="Enter your Address">Address
                                        <span style="color: red;">*</span></label>
                                    <textarea name="address1" id="address1" class="form-control" aria-label="With textarea" required></textarea>
                                </div>

                                <div class="col-md-4">
                                    <label for="phone" class="form-label">Phone Number
                                        <span style="color: red;">*</span>
                                    </label>
                                    <input type="tel" name="phone" class="form-control" id="phone"
                                        aria-describedby="inputGroupPrepend" required
                                        placeholder="Enter your phone number">
                                </div>

                                <div class="col-md-4">
                                    <label for="address" class="form-label">Email(optional)</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Enter your address">
                                </div>
                                <div class="col-md-4">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="number" name="quantity" value="1" id="quantity"
                                        class="form-control" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="address" class="form-label">Shipping</label>
                                    <select name="shipping_id" id="" class="form-control select" required>
                                        <option value="">Select Shipping Method</option>
                                        @foreach ($shipping as $n)
                                            <option value="{{ $n->id }}">{{ $n->type }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label>Payment method:</label>
                                <div class="form-check">
                                    <input class="pamyment_method form-check-input" type="radio"
                                        name="pamyment_methods" id="flexRadioDefault1" value="Bkash"
                                        autocomplete="off">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Bkash
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="pamyment_method form-check-input" type="radio"
                                        name="pamyment_methods" id="flexRadioDefault2"value="Nagad"
                                        autocomplete="off">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Nagad
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="pamyment_method form-check-input" type="radio"
                                        name="pamyment_methods" id="checkbox3" value="CashonDelivery"
                                        autocomplete="off">
                                    <label class="form-check-label" for="checkbox3">
                                        Cash On
                                        Delivary
                                    </label>
                                </div>


                                <div class="row text-center">
                                    <div class="col-md-4" id="bkash" style="display:none">
                                        <label>আপনার বিকাশ নাম্বারঃ
                                            <input type="number" name="payment_number" id="bkash_input"
                                                class="form-control" placeholder="যে নাম্বার থেকে টাকা পাঠিয়েছেন"
                                                required>
                                        </label>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-md-4" id="nagad" style="display:none">
                                        <label>আপনার নগদ নাম্বারঃ
                                            <input type="number" name="payment_number" id="nagad_input"
                                                class="form-control" placeholder="যে নাম্বার থেকে টাকা পাঠিয়েছেন"
                                                required>
                                        </label>
                                    </div>
                                </div>



                                <div class="col-12 text-center">
                                    <button class="btn btn-primary">Confirm Order</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <section class="why-us">
            <div class="row text-center shadow-lg p-3 mb-5 bg-body rounded justify-content-md-center">
                {{-- align-self-center --}}
                <div class="col-md-8 text-center ">
                    <p><i class="fas fa-check-double"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Quisquam quasi labore sint, voluptatem quae itaque!</p>
                    <p><i class="fas fa-check-double"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Quisquam quasi labore sint, voluptatem quae itaque!</p>
                    <p><i class="fas fa-check-double"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Quisquam quasi labore sint, voluptatem quae itaque!</p>
                    <p><i class="fas fa-check-double"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Quisquam quasi labore sint, voluptatem quae itaque!</p>
                    <p><i class="fas fa-check-double"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Quisquam quasi labore sint, voluptatem quae itaque!</p>
                    <p><i class="fas fa-check-double"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Quisquam quasi labore sint, voluptatem quae itaque!</p>
                    <p><i class="fas fa-check-double"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Quisquam quasi labore sint, voluptatem quae itaque!</p>
                </div>
            </div>
        </section>

        {{-- review sectio --}}
        <section>
            <div class="row text-center shadow-lg p-3 mb-5 bg-body rounded ">
                <h1>Customer Review</h1>
                @foreach ($posts as $n)
                    <div class="col-md-6 about">
                        <img src="{{ url($n->photo) }}" alt="" width="100px">
                    </div>
                @endforeach
            </div>
        </section>
        {{-- review sectio end --}}
    </div>


    {{-- End Body content --}}
    <div class="info-details">
        <div class="custom-info">
            <p style="text-align: center;">
                <strong>ডেলিভারি চার্জ</strong> <br>
                ঢাকার ভিতরঃ ৬০ টাকা<br>
                ঢাকার বাহিরেঃ ১০০ টাকা
            </p>

        </div>

        <div>
            <p style="text-align: justify;">
                উভয় ডায়েরীতে সন্তানের জন্ম থেকে শুরু করে একটা নির্দিষ্ট বয়স পর্যন্ত প্রতিটা ধাপে ধাপে তার বেড়ে
                ওঠা,যেকোনো মুহূর্তের স্মৃতিময় ছবি,পরিবারের পরিচিতি সবকিছুই একই ডাইরিতে সংরক্ষণ করতে পারবেন। আজকাল
                মোবাইল ফোনের কারণে আমাদের কোনো কিছুই আর আলাদাভাবে সংরক্ষণ করা হয় না । তবে এই ডায়েরিটি আপনার
                সন্তানের সকল সুখ স্মৃতি গুলোকে খুব সুন্দর এবং সাবলীলভাবে সংরক্ষিত অবস্থায় রাখবে।
            </p>
        </div>
    </div>

    <div>
        <div class="row justify-content-center social-icon">

            <div class="col-md-4">
                <a href="tel:{{ $company_contact_info->phone }}"><i class="fas fa-phone-alt"></i></a>
                <p><a href="tel:{{ $company_contact_info->phone }}">{{ $company_contact_info->phone }}</a></p>
            </div>
            <div class="col-md-4">
                <a href="{{ $company_contact_info->facebook_page_link }}"><i class="fab fa-facebook"></i>
                    <p>আমাদের ফেসবুক পেজ</p>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ $company_contact_info->facebook_group_link }}"><i class="fab fa-youtube"></i>
                    <p>আমাদের ইউটিউব চ্যানেল</p>
                </a>
            </div>


        </div>
    </div>

    <div class="footer-top">
        <p>আপনাকে অনেক ধন্যবাদ আমদের ওয়েবসাইট টি ভিজিট করার জন্য</p>
    </div>
    <footer class="footer">
        <p> All Right Reserved by <a href="TaiTaikids.com" class="text-warning">{{ $company_info->name }}</a>
            Copyright © 2022 <br> Website Design and
            Develop by MDNH</p>
    </footer>

    </div>
    @if (session()->has('script_msg'))
        {!! session()->get('script_msg') !!}
    @endif



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        // $(document).ready(function({
        //     $('#payment_method').on()(function() {
        //         var value = $(this).val();
        //         alert(value);
        //     });
        // }));
        $(document).ready(function() {
            $('.pamyment_method').each(function(index) {
                $(this).on('click', function() {

                    var value = $(this).val();
                    if (value == 'Bkash') {
                        $('#bkash').css('display', 'block');
                        $('#bkash_input').prop('disabled', false);
                        $('#nagad_input').prop('disabled', true);
                        $('#nagad').css('display', 'none');
                    } else if (value == 'Nagad') {
                        $('#bkash_input').prop('disabled', true);
                        $('#nagad_input').prop('disabled', false);
                        $('#bkash').css('display', 'none');
                        $('#nagad').css('display', 'block');
                    } else {
                        $('#bkash_input').prop('disabled', true);
                        $('#nagad_input').prop('disabled', true);
                        $('#bkash').css('display', 'none');
                        $('#nagad').css('display', 'none');
                    }

                })
            });
        });
    </script>
</body>

</html>
