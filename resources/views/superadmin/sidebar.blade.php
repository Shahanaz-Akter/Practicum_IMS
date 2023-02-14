<!--start sidebar -->
<aside class="sidebar-wrapper" data-simplebar="true">
  <div class="sidebar-header">
    <div>

    </div>
    <div>
      <h4 class="logo-text">Super Admin </h4>
    </div>
    <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
    </div>
  </div>
  <!--navigation-->
  <ul class="metismenu" id="menu">

    <li>
      <a href="javascript:;" class="has-arrow">
        <div class="parent-icon"><i class="bi bi-grid-fill"></i>
        </div>
        <div class="menu-title">Users</div>
      </a>
      <ul>
        <li> <a href="{{url('/adduser')}}">Add User</a>
        </li>
        <li> <a href="{{url('/userlist')}}">View Users</a>
        </li>

      </ul>
    </li>


    <li>
      <a href="{{url('/superadmin/neworders')}}">
        <div class="parent-icon"><i class="bi bi-grid-fill"></i>
        </div>
        <div class="menu-title">New Orders</div>
      </a>

    </li>
    <li>
      <a href="{{url('/superadmin/order_history')}}">
        <div class="parent-icon"><i class="bi bi-grid-fill"></i>
        </div>
        <div class="menu-title">Order History</div>
      </a>
    </li>
 
    <li>
      <a href="{{url('/superadminwastes')}}">
        <div class="parent-icon"><i class="bi bi-grid-fill"></i>
        </div>
        <div class="menu-title">Waste</div>
      </a>

    </li>

    <li>
      <a href="{{url('/superadmin/profile')}}">
        <div class="parent-icon"><i class="bi bi-grid-fill"></i>
        </div>
        <div class="menu-title">My Profile</div>
      </a>

    </li>

    <li>
      <a href="{{url('/superadmin/dailyreport')}}">
        <div class="parent-icon"><i class="bi bi-grid-fill"></i>
        </div>
        <div class="menu-title">Daily Report</div>
      </a>

    </li>

    <li>
      <a href="{{url('/superadmin/monthlyreport')}}">
        <div class="parent-icon"><i class="bi bi-grid-fill"></i>
        </div>
        <div class="menu-title">Monthly Report</div>
      </a>

    </li>
    <li>
      <a href="{{url('/logout')}}">
        <div class="parent-icon"><i class="bi bi-grid-fill"></i>
        </div>
        <div class="menu-title">Log Out</div>
      </a>

    </li>

  </ul>
  <!--end navigation-->
</aside>
<!--end sidebar -->