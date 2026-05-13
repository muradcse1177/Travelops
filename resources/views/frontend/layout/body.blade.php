<!doctype html>
<html lang="en">
@include('frontend.layout.header')
@yield('css')
<body>
<div class="floating-buttons">
  <a href="{{ url('universal-payment') }}" target="_blank" class="float-btn payment">
    <img src="https://cdn-icons-png.flaticon.com/512/1611/1611179.png" alt="Money">
  </a>
  <!-- WhatsApp -->
  <a href="https://wa.me/+8801707011562" target="_blank" class="float-btn whatsapp">
    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
  </a>

  <!-- Messenger (Inline SVG — Guaranteed Working) -->
  <a href="https://m.me/tripdesigner.xyz" target="_blank" class="float-btn messenger">
    <svg width="30" height="30" viewBox="0 0 24 24" fill="#0084FF" xmlns="http://www.w3.org/2000/svg">
      <path d="M12 2C6.486 2 2 6.177 2 11.184c0 2.863 1.436 5.433 3.723 7.129V22l3.408-1.869c.92.254 1.89.39 2.869.39 5.514 0 10-4.177 10-9.184S17.514 2 12 2zm1.018 12.439l-2.234-2.385-4.396 2.385 4.835-5.146 2.234 2.385 4.396-2.385-4.835 5.146z"/>
    </svg>
  </a>

</div>

<div id="site-loader" class="loader-overlay" style="display:none;">
<div class="loader-spinner"></div>
</div>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WX9PDZHD"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
@include('frontend.layout.navbar')
@yield('content')
@include('frontend.layout.footer')
@yield('js')
