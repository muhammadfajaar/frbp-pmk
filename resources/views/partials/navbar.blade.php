<nav class="navbar navbar-light bg-light">
   <div class="container-fluid">
    <div class="col-md-11">
      <a class="navbar-brand" href="#">
        <img src="/img/logo-frpb.png" alt="" width="40" height="40" class="d-inline-block align-text-top">
        <Forum class="text-wrap text-uppercase">Forum Relawan Penanggulangan Bencana Pamekasan</span>
      </a>
    </div>
    <div class="col-md-0">
      <a href="#" class="text-dark text-decoration-none">Login</a>
    </div>
   </div>
 </nav>
<nav class="navbar navbar-expand-lg navbar-light navbar-custom" style="background-color: #14b8a6">
   <div class="container-fluid">
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button> 
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
         <li class="nav-item">
           <a class="nav-link nav-text {{ ($active === "/") ? 'active' : '' }}" aria-current="page" href="/">Beranda</a>
         </li>
         <li class="nav-item">
           <a class="nav-link nav-text {{ ($active === "disaster") ? 'active' : '' }}" href="/disaster">Data Bencana</a>
         </li>
         <li class="nav-item">
           <a class="nav-link nav-text {{ ($active === "posts") ? 'active' : '' }}" href="/posts">Berita</a>
         </li>
         <li class="nav-item">
           <a class="nav-link nav-text {{ ($active === "agenda") ? 'active' : '' }}" href="/agenda">Agenda</a>
         </li>
         <li class="nav-item dropdown" style="bottom: -5px">
           <a class="nav-link nav-text dropdown-toggle {{ ($active === "profile") ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             Profil
           </a>
           <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
             <li><a class="nav-link dropdown-item {{ ($active === "profile") ? 'active' : '' }}" href="/profile">Sejarah FRPB</a></li>
           </ul>
         </li>
         <li class="nav-item">
            <a class="nav-link nav-text {{ ($active === "galery") ? 'active' : '' }}" href="/galery">Galeri</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-text {{ ($active === "contact") ? 'active' : '' }}" href="/contact">Kontak</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-text {{ ($active === "categories") ? 'active' : '' }}" href="/categories">Kategori</a>
          </li>
       </ul>
     </div>
   </div>
 </nav>