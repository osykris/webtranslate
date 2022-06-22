<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">IMT</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">IMT for Admin</li>
      <li class="{{ Request::is('*home*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
      <li class="{{ Request::is('*kelola-web*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('kelola-web') }}"><i class="far fa-square"></i> <span>Kelola Web</span></a></li>
    </ul>
  </aside>
</div>