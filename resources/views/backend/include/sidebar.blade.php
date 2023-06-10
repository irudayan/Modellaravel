<div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open">
          <ul class="nav nav-treeview"> 
            <li class="nav-item">
              <a href="{{url('mainsection')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Section</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('question')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Question</p>
              </a>
            </li>
          </ul>
        </li>
        
        <li class="nav-item">

            <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                            <i class="nav-icon far fa-circle text-danger"></i>
             <p>{{ __('Logout') }}</p>
         </a>

         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
         </form>


        </li>
       
       
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>