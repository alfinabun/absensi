<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('judul')</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous"> --}}
    <style>
        .dashboard{
            margin-left: -20%;
            font-size: 80%;
            color: rgb(49, 48, 48);
        }
        .kehadiran{
            margin-left: -5%;
            font-size: 80%;
            color: rgb(37, 37, 37);
        }
        .masterdata{
            margin-left: -10%;
            font-size: 80%;
            color: rgb(37, 37, 37);
        }
        .kar{
            margin-left: -22%;
            font-size: 80%;
            color: rgb(37, 37, 37);
        }
        .cuti{
            margin-left: -80%;
            font-size: 80%;
            color: rgb(37, 37, 37);
        }
        .setting{
            margin-left: -23%;
            font-size: 80%;
            color: rgb(37, 37, 37);
        }
        .judul{
            font-size: 14px;
            margin-left: -20%;
        }
        .navlog{
            width: 60px;
            margin-left: -26%;
        }
        .jamw{
         color: #ffffff;
        }
        .bgheader{
            background-color: #ab58f8;
        }
        
        @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");:root{--header-height: 3rem;--nav-width: 68px;--first-color: #a195c7;--first-color-light: #AFA5D9;--white-color: #DFCDE1;--body-font: 'Nunito', sans-serif;--normal-font-size: 1rem;--z-fixed: 100}*,::before,::after{box-sizing: border-box}body{position: relative;margin: var(--header-height) 0 0 0;padding: 0 1rem;font-family: var(--body-font);font-size: var(--normal-font-size);transition: .5s}a{text-decoration: none}.header{width: 100%;height: var(--header-height);position: fixed;top: 0;left: 0;display: flex;align-items: center;justify-content: space-between;padding: 0 1rem;background-color: var(--white-color);z-index: var(--z-fixed);transition: .5s}.header_toggle{color: var(--first-color);font-size: 1.5rem;cursor: pointer}.header_img{width: 35px;height: 35px;display: flex;justify-content: center;border-radius: 50%;overflow: hidden}.header_img img{width: 40px}.l-navbar{position: fixed;top: 0;left: -30%;width: var(--nav-width);height: 100vh;background-color: var(--first-color);padding: .5rem 1rem 0 0;transition: .5s;z-index: var(--z-fixed)}.nav{height: 100%;display: flex;flex-direction: column;justify-content: space-between;overflow: hidden}.nav_logo, .nav_link{display: grid;grid-template-columns: max-content max-content;align-items: center;column-gap: 5px;padding: .10px 0 .10px 1.5rem}.nav_logo{margin-bottom: 1px}.nav_logo-icon{font-size: 1.25rem;color: var(--white-color)}.nav_logo-name{color: var(--white-color);font-weight: 700}.nav_link{position: relative;color: var(--first-color-light);margin-bottom: 1.5rem;transition: .3s}.nav_link:hover{color: var(--white-color)}.nav_icon{font-size: 1.25rem}.show{left: 0}.body-pd{padding-left: calc(var(--nav-width) + 1rem)}.active{color: var(--white-color)}.active::before{content: '';position: absolute;left: 0;width: 2px;height: 32px;background-color: var(--white-color)}.height-100{height:100vh}@media screen and (min-width: 768px){body{margin: calc(var(--header-height) + 1rem) 0 0 0;padding-left: calc(var(--nav-width) + 2rem)}.header{height: calc(var(--header-height) + 1rem);padding: 0 2rem 0 calc(var(--nav-width) + 2rem)}.header_img{width: 40px;height: 40px}.header_img img{width: 45px}.l-navbar{left: 0;padding: 1rem 1rem 0 0}.show{width: calc(var(--nav-width) + 156px)}.body-pd{padding-left: calc(var(--nav-width) + 188px)}}
    </style>
  </head>
  <body id="body-pd" style="background-color: #F5F5F5;">
    <!--Container Main start-->
    @include('admin.nav')
    @include('admin.side')
    @yield('content')
    
    <!--Container Main end-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script> --}}
    <script>
    
        document.addEventListener("DOMContentLoaded", function(event) {
   
   const showNavbar = (toggleId, navId, bodyId, headerId) =>{
   const toggle = document.getElementById(toggleId),
   nav = document.getElementById(navId),
   bodypd = document.getElementById(bodyId),
   headerpd = document.getElementById(headerId)
   
   // Validate that all variables exist
   if(toggle && nav && bodypd && headerpd){
   toggle.addEventListener('click', ()=>{
   // show navbar
   nav.classList.toggle('show')
   // change icon
   toggle.classList.toggle('bx-x')
   // add padding to body
   bodypd.classList.toggle('body-pd')
   // add padding to header
   headerpd.classList.toggle('body-pd')
   })
   }
   }
   
   showNavbar('header-toggle','nav-bar','body-pd','header')
   
   /*===== LINK ACTIVE =====*/
   const linkColor = document.querySelectorAll('.nav_link')
   
   function colorLink(){
   if(linkColor){
   linkColor.forEach(l=> l.classList.remove('active'))
   this.classList.add('active')
   }
   }
   linkColor.forEach(l=> l.addEventListener('click', colorLink))
   
  
   });
    </script>
    <script>
        function tampilkanWaktu() {
          const sekarang = new Date();
    
          const tanggal = sekarang.toLocaleDateString("id-ID", {
            weekday: "long",
            year: "numeric",
            month: "long",
            day: "numeric"
          });
    
          const waktu = sekarang.toLocaleTimeString("id-ID");
    
          document.getElementById("waktu").innerHTML = `${tanggal}, ${waktu}`;
        }
    
        // Update waktu setiap 1 detik
        setInterval(tampilkanWaktu, 1000);
        tampilkanWaktu(); // panggil sekali di awal
      </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // Mengambil elemen toggle link dan submenu
  const toggleLink = document.querySelector('[data-bs-toggle="collapse"]');
  const submenu = document.getElementById('submenuMasterData');
  const icon = toggleLink.querySelector('.toggle-icon');  // Mengambil ikon toggle

  // Event listener saat submenu dibuka
  submenu.addEventListener('show.bs.collapse', function () {
    icon.classList.remove('bi-chevron-left');  // Menghilangkan ikon chevron-left
    icon.classList.add('bi-chevron-down');    // Menambahkan ikon chevron-down
  });

  // Event listener saat submenu ditutup
  submenu.addEventListener('hide.bs.collapse', function () {
    icon.classList.remove('bi-chevron-down');  // Menghilangkan ikon chevron-down
    icon.classList.add('bi-chevron-left');     // Menambahkan ikon chevron-left
    // toggleLink.querySelector('[data-bs-toggle="expand"]');
  });
</script>



  </body>
</html>
