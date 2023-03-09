<!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        

       

       
        <link rel="stylesheet" href="{{url('css/style.css')}}" />
        <link rel="stylesheet" href="{{url('css/sidebar.component.css')}}" />
        <link rel="stylesheet" href="{{url('css/widget.css')}}" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet" />
    
       
    </head>
<body>
    <div class="wrapper d-flex align-items-stretch" style="height: 100vh;">
            <nav id="sidebar">
              
                  <div class="user-logo m-5 wrapper d-flex">
                     
                      <span class="h1 text-uppercase text-dark bg-light px-2">Fin</span>
                      <span class="h1 text-uppercase text-light bg-primary px-2 ">tech</span>
                  </div>
              
        <ul class="list-unstyled components mb-5">
          <li >
            <a href="{{url('/admin')}}" ><span class="fa fa-home mr-3"></span> Home</a>
          </li>
          <li>
            <a href="{{url('admin/users')}}" ><span class="fa-solid fa-user mr-3"></span>Users</a>
          </li>
          <li>
            <a href="{{url('admin/vendors')}}" ><span class="fa-solid fa-store mr-3"></span>Vendors</a>
          </li>
          <li>
            <a href="{{url('admin/transactions')}}" ><span class="fa-solid fa-money-bill-transfer mr-3"></span>Transactions</a>
          </li>
          <li class="ml-3">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <x-responsive-nav-link :href="route('logout')"
              onclick="event.preventDefault();
                          this.closest('form').submit();"><span class="fa-solid fa-sign-out mr-3"></span>{{ __('Log Out') }}
            </x-responsive-nav-link>
          </form>
          </li>
       
        </ul>
    
        </nav>
        @yield('users')
    </div>
        <!-- Page Content  -->
    