<div class="menu-wrap">
  <nav class="menu-content">
    <div class="icon-list">
      <a href="#" id="close-button" title="close"><i class="las la-times"></i></a>
      <a href="/p/{{ Auth::user()->id }}"><i class="las la-user-circle"></i></a>
      <a href="/settings"><i class="las la-cog"></i></a>
      <a href="/about-us"><i class="las la-question"></i></a>
      <a href="{{ route('logout') }}" 
         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="las la-door-open"></i>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
    </div>
  </nav>
</div>