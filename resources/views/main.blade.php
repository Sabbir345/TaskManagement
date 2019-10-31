<!DOCTYPE html>
<html lang="en">

<head>
    <title>Task Application</title>
    @include('layouts.meta')
    @include('layouts.styles')

</head>

  <body>

   @include('layouts.nav')

     <div class="">
        @yield('content')
     </div>

     @include('layouts.footer') 

     @include('layouts.scripts')

     @stack('scripts')
   
  </body>

</html>