@extends("admin.layouts.partials.head")


<body>
    <div class="container-fluid position-relative d-flex p-0">
        
    @include("admin.layouts.partials.spinner")


       <x-admin-header-component/>

        @yield("content")


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

   
       <x-admin-footer-component/>

@extends("admin.layouts.partials.foot")

</body>

</html>