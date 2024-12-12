<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->

<link rel="stylesheet" href="<?php echo asset('css/core.css');?>"class="template-customizer-core-css"/>
<link rel="stylesheet" href="<?php echo asset('css/theme-default.css');?>" class="template-customizer-theme-css"/>
<link rel="stylesheet" href="<?php echo asset('css/demo.css');?>"/>
<link rel="stylesheet" href="<?php echo asset('css/perfect-scrollbar.css');?>"/>
<link rel="stylesheet" href="<?php echo asset('css/apex-charts.css');?>"/>
<link rel="stylesheet" href="<?php echo asset('css/boxicons.css');?>"/>
<link rel="stylesheet" href="<?php echo asset('css/blogpost.css');?>"/>
<link rel="stylesheet" href="<?php echo asset('css/bloglist.css');?>"/>
<link rel="stylesheet" href="<?php echo asset('css/addmore.css');?>"/>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>



  </head>

  <body>
    <style>
      .menu {
    display: flex;
    gap:10px;
    flex-direction: column;
    }
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f9f9f9;
    }

    .menu {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .menu-item {
    animation: slideIn 0.6s ease, fadeIn 0.6s ease;
    margin-left: 14px;
    width: 235px;
    border-radius: 9px;
}
.menu-item {
    position: relative;
    overflow: hidden;
    margin-bottom: 10px;
    transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
}

/* Menu link with gradient background */
.menu-link {
    display: flex;
    align-items: center;
    padding: 15px 20px;
    text-decoration: none;
    color: #444;
    font-size: 16px;
    background: linear-gradient(135deg, #ffffff, #f3f3f3);
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.4s ease, box-shadow 0.4s ease, background 0.4s, color 0.4s ease;
    text-decoration:none;
}

/* Hover effect on menu link */
.menu-link:hover {
    background: linear-gradient(135deg, #e6f7ff, #ccf2ff);
    transform: scale(1.05);
    box-shadow: 0 8px 20px rgba(0, 123, 255, 0.3);
    color: #007bff;
    text-decoration:none;

}

/* Submenu styling */
.menu-sub {
    list-style: none;
    padding-left: 20px;
    margin: 0;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.6s ease-in-out, opacity 0.6s ease-in-out, transform 0.6s ease-in-out;
    opacity: 0;
    transform: translateY(-10px);
}

/* Show submenu when the item is open */
.menu-item.open > .menu-sub {
    max-height: 1000px;
    opacity: 1;
    transform: translateY(0);
}

/* Menu icon */
.menu-icon {
    margin-right: 15px;
    font-size: 18px;
    color: #666;
    transition: transform 0.4s ease, color 0.4s ease;
}

/* Toggle icon transition */
.menu-toggle::after {
    content: '\25BC'; /* Down arrow */
    margin-left: auto;
    font-size: 12px;
    transition: transform 0.4s ease, color 0.4s ease;
    color: #999;
}

/* Change toggle icon when menu is open */
.menu-item.open > .menu-link .menu-toggle::after {
    transform: rotate(180deg);
    color: #007bff;
}

/* Hover Glow Effect */
.menu-link:hover {
    box-shadow: 0 12px 30px rgba(0, 123, 255, 0.4);
}

/* Submenu animation */
.menu-sub {
    animation: submenuSlide 0.5s ease forwards;
}

/* Submenu slide animation */
@keyframes submenuSlide {
    from {
        transform: translateY(-20px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

/* Smooth color transition for links */
.menu-link {
    transition: color 0.3s ease;
}

.menu-link:hover {
    color: #007bff;
    background: linear-gradient(135deg, #e6f7ff, #ccf2ff); /* Smooth hover effect */
}

/* Entry animation for menu items */
@keyframes slideIn {
    from {
        transform: translateX(-20px);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

.menu-item {
    animation: slideIn 0.5s ease-out;
}

/* Fade in effect */
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

    </style>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <svg
                  width="25"
                  viewBox="0 0 25 42"
                  version="1.1"
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                >
                  <defs>
                    <path
                      d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                      id="path-1"
                    ></path>
                    <path
                      d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                      id="path-3"
                    ></path>
                    <path
                      d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                      id="path-4"
                    ></path>
                    <path
                      d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                      id="path-5"
                    ></path>
                  </defs>
                  <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                      <g id="Icon" transform="translate(27.000000, 15.000000)">
                        <g id="Mask" transform="translate(0.000000, 8.000000)">
                          <mask id="mask-2" fill="white">
                            <use xlink:href="#path-1"></use>
                          </mask>
                          <use fill="#696cff" xlink:href="#path-1"></use>
                          <g id="Path-3" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-3"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                          </g>
                          <g id="Path-4" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-4"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                          </g>
                        </g>
                        <g
                          id="Triangle"
                          transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) "
                        >
                          <use fill="#696cff" xlink:href="#path-5"></use>
                          <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2">Admin Panel </span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
      
            <li class="menu-item active">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <!-- Layouts -->
             <!-- start  -->
                <ul class="menu">
        @foreach($menu->json_output as $item)
        <li class="menu-item">
            <a href="{{ $item['href'] ? route($item['href']) : 'javascript:void(0);' }}" class="menu-link menu-toggle">
            <i class="menu-icon {{ $item['icon'] ?? 'fas fa-circle' }}"></i>
            <div data-i18n="{{ $item['title'] ?? '' }}">{{ $item['text'] }}</div>
        </a>
        @if(!empty($item['children']))
        <ul class="menu-sub">
            @foreach($item['children'] as $child)
            <li class="menu-item">
                <a href="{{ $child['href'] ? route($child['href']) : 'javascript:void(0);' }}" class="menu-link">
                    <i class="menu-icon {{ $child['icon'] ?? 'fas fa-circle' }}"></i>
                    <div data-i18n="{{ $child['title'] ?? '' }}">{{ $child['text'] }}</div>
                </a>
                @if(!empty($child['children']))
                <ul class="menu-sub">
                    @foreach($child['children'] as $subChild)
                    <li class="menu-item">
                        <a href="{{ $subChild['href'] ? route($subChild['href']) : 'javascript:void(0);' }}" class="menu-link">
                            <i class="menu-icon {{ $subChild['icon'] ?? 'fas fa-circle' }}"></i>
                            <div data-i18n="{{ $subChild['title'] ?? '' }}">{{ $subChild['text'] }}</div>
                        </a>
                    </li>
                    @endforeach
                </ul>
                @endif
            </li>
            @endforeach
        </ul>
        @endif
    </li>
    @endforeach
</ul>

<!-- end  -->

        </aside>
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <h2>{{ Session::get('user.First_Name') }}</h2>
              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
           

                <!-- User -->
                <a href="{{ route('ui') }}" style="margin-right:130px;">front</a>
                <li class="nav-item navbar-dropdown dropdown-user dropdown"style="
               width: 107px;
                margin-right: 21px;
                background-color: dodgerblue;
                color: white;
                border-radius: 7px;
                ">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <span style="
                      color:white;
                      margin-left:5px;
                      padding-left:5px;
                      ">Account</span>
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">{{ Session::get('user.First_Name') }}</span>
                            <small class="text-muted">{{ Session::get('user.last_Name') }}</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a href="{{ route('myprofile') }}" class="dropdown-item" href="#">
                   
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                          <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                          <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                  
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                    <a href="{{ route('logout') }}" href="auth-login-basic.html" style="
                    padding-left:10px;
                    ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z"/>
                      <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
                      </svg>
                        <span class="align-middle" style="
                            margin-left: 17px;
                           color: black;

                        ">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper" style="
              width: 97%;
          ">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                @yield('content')
              <div class="row">
              
                
                <!-- Total Revenue -->
                <!-- <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
               
                  </div>
                </div> -->
                <!--/ Total Revenue -->
                <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                  <div class="row">
        
               
                  </div>
                </div>
              </div>
              <div class="row">
             
           
              </div>
            </div>
       
            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

   
    <script src="<?php echo asset('js/jquery.js');?>"></script>
    <script src="<?php echo asset('js/bootstrap.js');?>"></script>
    <script src="<?php echo asset('js/menu.js');?>"></script>
    <script src="<?php echo asset('js/popper.js');?>"></script>
    <script src="<?php echo asset('js/perfect-scrollbar.js');?>"></script>
    <script src="<?php echo asset('js/apexcharts.js');?>"></script>
    <script src="<?php echo asset('js/perfect-scrollbar.js');?>"></script>
    <script src="<?php echo asset('js/config.js');?>"></script>
    <script src="<?php echo asset('js/menu.js');?>"></script>
    <script src="<?php echo asset('js/dashboards-analytics.js');?>"></script>
    <script src="<?php echo asset('js/helpers.js');?>"></script>
    <script src="<?php echo asset('js/main.js');?>"></script>


    <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <script src="<?php echo asset('bootstrap-iconpicker/js/iconset/fontawesome5-3-1.min.js'); ?>"></script>
    <script src="<?php echo asset('bootstrap-iconpicker/js/bootstrap-iconpicker.min.js');?>"></script>
    <script src="<?php echo asset('bootstrap-iconpicker/js/jquery-menu-editor.min.js');?>"></script>

    @yield('js')
  </body>
</html>


