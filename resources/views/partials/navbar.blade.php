<nav class="navbar navbar-light bg-light">
   <div class="container">
     <a class="navbar-brand" href="#">
       <img src="/img/logo-frpb.png" alt="" width="40" height="40" class="d-inline-block align-text-top">
       <span>FORUM RELAWAN PEANANGGULANGAN BENCANA PAMEKASAN</span>
     </a>
   </div>
 </nav>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #14b8a6">
   <div class="container">
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button> 
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav me-auto mb-2 mb-lg-0">
         <li class="nav-item">
           <a class="nav-link {{ ($active === "/") ? 'active' : '' }}" aria-current="page" href="/">Beranda</a>
         </li>
         <li class="nav-item">
           <a class="nav-link {{ ($active === "disaster") ? 'active' : '' }}" href="/disaster">Data Bencana</a>
         </li>
         <li class="nav-item">
           <a class="nav-link {{ ($active === "posts") ? 'active' : '' }}" href="/posts">Berita</a>
         </li>
         <li class="nav-item">
           <a class="nav-link {{ ($active === "agenda") ? 'active' : '' }}" href="/agenda">Agenda</a>
         </li>
         <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle {{ ($active === "profile") ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             Profil
           </a>
           <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
             <li><a class="nav-link dropdown-item {{ ($active === "proflie") ? 'active' : '' }}" href="/profile">Sejarah FRPB</a></li>
           </ul>
         </li>
         <li class="nav-item">
            <a class="nav-link {{ ($active === "galery") ? 'active' : '' }}" href="/galery">Galeri</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "contact") ? 'active' : '' }}" href="/contact">Kontak</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "categories") ? 'active' : '' }}" href="/categories">Kategori</a>
          </li>
       </ul>
     </div>
   </div>
 </nav>