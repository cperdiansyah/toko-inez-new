 @php
     $links = [
         [
             'url' => '/profile',
             'title' => 'Profil Saya',
             'icon' => 'fas fa-user',
             'role' => 'user',
         ],
         [
             'url' => '/setting',
             'title' => 'Pengaturan',
             'icon' => 'fas fa-cog',
             'role' => 'user',
         ],
     ];
     $profileLink = array_to_object($links);
     
 @endphp
 <div class="icons">
     {{-- <button class='navbar-icons btn btn-transparent fs-5 p-1 me-2  shadow-none wistlist position-relative'>
         <i class="bi bi-heart-fill text-white"></i>

         @if (isset($user->wishlist->first()->product_id))
             <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger px-2 py-1 mt-1"
                 id="wishlist-counter">

                {{ $user->wishlist->count() }}
             </span>
         @else
             <span
                 class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger px-2 py-1 mt-1  d-none"
                 id="wishlist-counter">
             </span>

         @endif
     </button>



     <button type="button" class="navbar-icons btn btn-transparent fs-5 p-1  me-2 shadow-none cart position-relative">
         <i class="bi bi-cart-fill text-white"></i>
         @if (isset($user->cart->first()->product_id))
             <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger px-2 py-1 mt-1"
                 id="cart-counter">
                 {{ $user->cart->sum('qty') }}
             </span>
         @else
             <span
                 class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger px-2 py-1 mt-1  d-none"
                 id="cart-counter">

             </span>

         @endif

     </button> --}}

     <button class='navbar-icons btn btn-transparent fs-5 p-1  me-3 shadow-none search'>
         <i class="bi bi-search text-white"></i>
     </button>
 </div>
 <div class="user-dropdown">

     <div class="button-wrapper">
         <div class="dropdown">
             <button class="btn dropdown-toggle p-0 border-0 text-white shadow-none d-flex align-items-center"
                 type="button" id="user-dropdown" data-toggle="dropdown" aria-expanded="false">
                 <img src="{{ Auth::user()->profile_picture != null ? Auth::user()->profile_picture : 'https://t4.ftcdn.net/jpg/00/64/67/63/360_F_64676383_LdbmhiNM6Ypzb3FM4PPuFP9rHe7ri8Ju.jpg' }}"
                     alt="profile-picture" class="img-thumbnail rounded-circle border-0 bg-transparent">
             </button>

             <ul class="dropdown-menu  dropdown-menu-start animate slideIn" aria-labelledby="dropdownMenuButton1"
                 style="left:-120px">

                 @if (auth()->user()->is_admin == 1)
                     <li><a class="dropdown-item" href="/dashboard">
                             <i class="fas fa-desktop pr-3 icon"></i>
                             </i>Dashboard Admin</a>
                     </li>
                     <hr class="dropdown-divider">
                 @endif


                 @foreach ($profileLink as $link)
                     <li>
                         <a class="dropdown-item" href="{{ $link->url }}">
                             <i class="{{ $link->icon }} pr-3"></i>
                             {{ $link->title }}</a>
                     </li>
                 @endforeach
                 <li>
                     <form method="POST" action="{{ route('logout') }}">
                         @csrf

                         <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"
                             onclick="event.preventDefault();this.closest('form').submit();">
                             <i class="fas fa-sign-out-alt"></i> Keluar
                         </a>
                     </form>
                 </li>

             </ul>
         </div>


     </div>
 </div>
 </div>
