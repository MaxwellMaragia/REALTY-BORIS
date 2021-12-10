<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('avatar.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i>Logged in</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard text-aqua"></i> <span>Dashboard</span></a></li>
          <li><a href="{{ route('enquiry.index') }}"><i class="fa fa-envelope text-aqua"></i> <span>Mails</span></a></li>
          <li><a href="{{ route('seo.index') }}"><i class="fa fa-search text-aqua"></i> <span>Search engine optimization</span></a></li>

          {{--<li><a href="{{ route('role.index') }}"><i class="fa fa-circle-o text-aqua"></i> <span>Roles</span></a></li>--}}
          <li class="treeview">
              <a href="#">
                  <i class="fa fa-laptop"></i>
                  <span>Website data</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="{{ route('banner.index') }}"><i class="fa fa-circle-o"></i>Banners</a></li>
                  <li><a href="{{ route('testimonials.index') }}"><i class="fa fa-circle-o"></i>Reviews</a></li>
              </ul>
          </li>

          <li class="treeview">
              <a href="#">
                  <i class="fa fa-home"></i> <span>Properties</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="{{ route('properties.create') }}"><i class="fa fa-circle-o"></i> Add new</a></li>
                  <li><a href="{{ route('properties.index') }}"><i class="fa fa-circle-o"></i> View existing</a></li>
              </ul>
          </li>

          <li class="treeview">
              <a href="#">
                  <i class="fa fa-rss"></i> <span>Blog</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="{{ route('post.index') }}"><i class="fa fa-circle-o"></i> Posts</a></li>
                  <li><a href="{{ route('category.index') }}"><i class="fa fa-circle-o"></i> Categories</a></li>
                  <li><a href="{{ route('tag.index') }}"><i class="fa fa-circle-o"></i> Tags</a></li>
              </ul>
          </li>

          <li class="treeview">
              <a href="#">
                  <i class="fa fa-gears"></i> <span>Settings</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="{{ route('settings.index') }}"><i class="fa fa-circle-o"></i> General settings</a></li>
                  <li><a href="{{ route('about.index') }}"><i class="fa fa-circle-o"></i> About us page</a></li>
                  <li><a href="{{ route('images.index') }}"><i class="fa fa-circle-o"></i> Image settings</a></li>
              </ul>
          </li>
    </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
