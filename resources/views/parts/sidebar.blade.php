<!--Main Navigation-->
<header>
  <!-- Sidebar -->
  <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">
          @include('parts.menuItems', ['items' => $menu->roots()])
      </div>
    </div>
  </nav>
  <!-- Sidebar -->
</header>
<!--Main Navigation-->
