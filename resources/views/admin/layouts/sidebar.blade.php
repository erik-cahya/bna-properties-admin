 <div class="main-menu">

    <!-- Brand Logo -->
    <div class="logo-box">
        <!-- Brand Logo Light -->
        <a href="{{ route('dashboard') }}" class="logo-light pad-t-32 pad-b-8">
            <img src="{{ asset('admin') }}/assets/images/new-bna-light.png" alt="logo" class="logo-lg pad-8" height="100">
            <img src="{{ asset('admin') }}/assets/images/new-bna-light.png" alt="small logo" class="logo-sm" height="30">
        </a>

        <!-- Brand Logo Dark -->
        <a href="{{ route('dashboard') }}" class="logo-dark">
            <img src="{{ asset('admin') }}/assets/images/bna-new-dark.png" alt="dark logo" class="logo-lg pad-8" height="100">
            <img src="{{ asset('admin') }}/assets/images/bna-new-dark.png" alt="small logo" class="logo-sm" height="30">
        </a>
    </div>


     <!--- Menu -->
     <div data-simplebar>
         <ul class="app-menu pad-t-16">

             <li class="menu-title">Menu</li>

             <li class="menu-item">
                 <a href="{{ route('dashboard') }}" class="menu-link waves-effect">
                     <span class="menu-icon"><i data-lucide="airplay "></i></span>
                     <span class="menu-text"> Dashboards </span>
                 </a>
             </li>

            <li class="menu-item">
                 <a href="{{ route('booking.index') }}" class="menu-link waves-effect">
                     <span class="menu-icon"><i class="mdi mdi-ballot-outline"></i></span>
                     <span class="menu-text">Bookings</span>
                 </a>
             </li>

             <li class="menu-title">Management</li>

             <li class="menu-item">
                 <a href="#menuExpages" data-bs-toggle="collapse" class="menu-link waves-effect">
                     <span class="menu-icon"><i data-lucide="copy"></i></span>
                     <span class="menu-text"> Properties </span>
                     <span class="menu-arrow"></span>
                 </a>
                 <div class="collapse" id="menuExpages">
                     <ul class="sub-menu">
                         <li class="menu-item">
                             <a href="{{ route('properties.index') }}" class="menu-link">
                                 <span class="menu-text">List Properties</span>
                             </a>
                         </li>
                         <li class="menu-item">
                             <a href="{{ route('properties.create') }}" class="menu-link">
                                 <span class="menu-text">Create Properties</span>
                             </a>
                         </li>
                     </ul>
                 </div>
             </li>

             <li class="menu-item">
                 <a href="{{ route('features.index') }}" class="menu-link waves-effect">
                     <span class="menu-icon"><i class="mdi mdi-fan"></i></span>
                     <span class="menu-text">Properties Feature</span>
                 </a>
             </li>



             <li class="menu-item">
                 <a href="{{ route('customers.index') }}" class="menu-link waves-effect">
                     <span class="menu-icon"><i class="mdi mdi-account-multiple"></i></span>
                     <span class="menu-text">Customers</span>
                 </a>
             </li>

         </ul>
     </div>
 </div>
