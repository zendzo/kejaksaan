<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ Auth::user()->profile ? asset(Auth::user()->avatar) : Auth::user()->avatar }}" class="img-circle" alt="User Image" />
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->fullName() }}</p>
        <p>{{ Auth::user()->role->name }}</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Type: {{ Auth::user()->role->name }}</a>
      </div>
    </div>

    <!-- search form (Optional) -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search..."/>
        <span class="input-group-btn">
          <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">MENU</li>
      <!-- if user is admin show menu -->
      @if(Auth::user()->role_id === 1)
        @include('admin.menu_admin')
        @include('admin.menu_master_data')
      @endif

      <!-- kajati user menu -->
      @if(Auth::user()->role_id === 2)
        @include('user.menu_kajati')
      @endif

      <!-- kajati penyidik menu -->
      @if(Auth::user()->role_id === 3)
        @include('user.menu_bidang_inteligent')
      @endif

      <!-- kajati penyidik menu -->
      @if(Auth::user()->role_id === 4)
        @include('user.menu_team_penyidik')
      @endif

      <!-- kajati penyidik menu -->
      @if(Auth::user()->role_id === 5)
        @include('user.menu_team_penyidik')
      @endif

    </ul><!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>