
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('images/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('images/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

<!-- Sidebar Menu -->
 <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <!-- category -->
          <li class="nav-item     {{Route::is('admin.categories.index')||Route::is('admin.categories.create')?'menu-open ': ''}}">
            <a href="#" class="nav-link {{Route::is('admin.categories.index')||Route::is('admin.categories.create')?'active ': ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Categories
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.categories.index')}}" class="nav-link {{Route::is('admin.categories.index')?'active': ''}}">
                  <i class="far fa fa-list-alt  nav-icon"></i>
                  <p>List Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.categories.create')}}" class="nav-link {{Route::is('admin.categories.create')?'active': ''}}">
                  <i class="far fa-plus nav-icon"></i>
                  <p>Create Category</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- tag -->

          <li class="nav-item     {{Route::is('admin.tags.index')||Route::is('admin.tags.create')?'menu-open ': ''}}">
            <a href="#" class="nav-link {{Route::is('admin.tags.index')||Route::is('admin.tags.create')?'active ': ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Tags
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.tags.index')}}" class="nav-link {{Route::is('admin.tags.index')?'active': ''}}">
                  <i class="far fa fa-list-alt  nav-icon"></i>
                  <p>List Tags</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.tags.create')}}" class="nav-link {{Route::is('admin.tags.create')?'active': ''}}">
                  <i class="far fa-plus nav-icon"></i>
                  <p>Create Tag</p>
                </a>
              </li>
            </ul>
          </li>

                <!-- post-->
                <li class="nav-item     {{Route::is('admin.posts.index')?'menu-open ': ''}}">
            <a href="#" class="nav-link {{Route::is('admin.posts.index')?'active ': ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               posts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>




            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.posts.index')}}" class="nav-link {{Route::is('admin.posts.index')?'active': ''}}">
                  <i class="far fa fa-list-book nav-icon"></i>
                  <p>List posts</p>
                </a>
              </li>

            </ul>
          </li>


<!-- user-->

<li class="nav-item     {{Route::is('admin.users.index')||Route::is('admin.users.create')?'menu-open ': ''}}">
            <a href="#" class="nav-link {{Route::is('admin.users.index')||Route::is('admin.users.create')?'active ': ''}}">
              <i class="nav-icon fas fa-users"></i>
              <p>
               users
                <i class="right fas fa-angle-left nav-icon"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.users.index')}}" class="nav-link {{Route::is('admin.users.index')?'active': ''}}">
                  <i class="far fa fa-users nav-icon"></i>
                  <p>List Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.users.create')}}" class="nav-link {{Route::is('admin.users.create')?'active': ''}}">
                  <i class="far fa-plus nav-icon"></i>
                  <p>Create User</p>
                </a>
              </li>
            </ul>
          </li>




<!-- comments-->

<li class="nav-item     {{Route::is('admin.comments.index')||Route::is('admin.comments.create')?'menu-open ': ''}}">
            <a href="#" class="nav-link {{Route::is('admin.comments.index')||Route::is('admin.comments.create')?'active ': ''}}">
              <i class="nav-icon fas fa-comments"></i>
              <p>
               Comments
                <i class="right fas fa-angle-left nav-icon"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.comments.index')}}" class="nav-link {{Route::is('admin.comments.index')?'active': ''}}">
                  <i class="far fa fa-comments nav-icon"></i>
                  <p>List Comments</p>
                </a>
              </li>

            </ul>
          </li>

   <!-- pages -->
   <li class="nav-item     {{Route::is('admin.pages.index')||Route::is('admin.pages.create')?'menu-open ': ''}}">
            <a href="#" class="nav-link {{Route::is('admin.pages.index')||Route::is('admin.pages.create')?'active ': ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.pages.index')}}" class="nav-link {{Route::is('admin.pages.index')?'active': ''}}">
                  <i class="far fa fa-list-alt  nav-icon"></i>
                  <p>List Pages</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.pages.create')}}" class="nav-link {{Route::is('admin.pages.create')?'active': ''}}">
                  <i class="far fa-plus nav-icon"></i>
                  <p>Create Page</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- nothing -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
      </div>
    <!-- /.sidebar -->
  </aside>
