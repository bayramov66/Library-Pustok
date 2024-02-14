<!DOCTYPE html>
<html lang="zxx">

<head>
    @include("layouts/partials/head")

</head>

<body>
    
 <x-front-header-component/>

       @yield("content")
   
    <x-front-footer-component/>
    @include('layouts/partials/foot')
</body>

</html>