<!--start sidebar -->
<aside class="sidebar-wrapper" data-simplebar="true">
  <div class="sidebar-header">
    <div>

    </div>
    <div>
      <h4 class="logo-text"> Admin </h4>
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
        <div class="menu-title">Ingredient Management</div>
      </a>
      <ul>
      <li> <a href="{{url('/add_ingredient_category')}}">Ingredient Categories</a>
        </li>
       
        <li> <a href="{{url('/add_ingredient_subcategory')}}">Ingredient Sub Category</a>
        </li>
        
        </li>
      
        <li> <a href="{{url('/ingredients')}}">Ingredients</a>
        </li>
        <li> <a href="{{url('/units')}}"> Unit</a>
        </li>
      </ul>
    </li>

    <li>
      <a href="{{url('/admin/neworders')}}">
        <div class="parent-icon"><i class="bi bi-grid-fill"></i>
        </div>
        <div class="menu-title">New Orders</div>
      </a>

    </li>
    <li>
      <a href="{{url('/admin/order_history')}}">
        <div class="parent-icon"><i class="bi bi-grid-fill"></i>
        </div>
        <div class="menu-title">Order History</div>
      </a>
    </li>
    <li>
      <a href="{{url('/admin/place_purchase')}}">
        <div class="parent-icon"><i class="bi bi-grid-fill"></i>
        </div>
        <div class="menu-title">Place Purchase Request</div>
      </a>
    </li>
    <li>
      <a href="{{url('/wastes')}}">
        <div class="parent-icon"><i class="bi bi-grid-fill"></i>
        </div>
        <div class="menu-title">Waste</div>
      </a>

    </li>
    <li>
      <a href="{{url('/admin/profile')}}">
        <div class="parent-icon"><i class="bi bi-grid-fill"></i>
        </div>
        <div class="menu-title">Profile</div>
      </a>
    </li>
    <li>
            <a href="{{url('/dailyreport')}}" >
              <div class="parent-icon"><i class="bi bi-grid-fill"></i>
              </div>
              <div class="menu-title">Daily Report</div>
            </a>
        
          </li>

          <li>
            <a href="{{url('/monthlyreport')}}" >
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