 <div class="main-menu">
     <!-- Brand Logo -->
     <div class="logo-box">
         <!-- Brand Logo Light -->
         <a href="index.html" class="logo-light">
             <img src="{{ asset('bna-assets/logo-bna-light.png') }}" alt="logo" class="logo-lg" height="80">
             <img src="{{ asset('bna-assets/logo-bna-light.png') }}" alt="small logo" class="logo-sm" height="30">
         </a>

         <!-- Brand Logo Dark -->
         <a href="index.html" class="logo-dark">
             <img src="{{ asset('admin') }}/assets/images/logo-dark.png" alt="dark logo" class="logo-lg" height="18">
             <img src="{{ asset('admin') }}/assets/images/logo-sm.png" alt="small logo" class="logo-sm" height="24">
         </a>
     </div>

     <!--- Menu -->
     <div data-simplebar>
         <ul class="app-menu">

             <li class="menu-title">Menu</li>

             <li class="menu-item">
                 <a href="{{ route('dashboard') }}" class="menu-link waves-effect">
                     <span class="menu-icon"><i data-lucide="airplay "></i></span>
                     <span class="menu-text"> Dashboards </span>
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
                 <a href="{{ route('booking.index') }}" class="menu-link waves-effect">
                     <span class="menu-icon"><i class="mdi mdi-ballot-outline"></i></span>
                     <span class="menu-text">Booking</span>
                 </a>
             </li>

         </ul>
     </div>
 </div>
