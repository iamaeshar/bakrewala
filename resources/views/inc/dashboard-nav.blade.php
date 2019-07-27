<div class="card mat-box-shadow">
    <div class="card-body d-flex align-items-center">
        <div class="avatar text-primary mr-3">
            <i class="fa fa-user-circle fa-3x"></i>
        </div>
        <div class="user">
            @if (!App\Profile::find(Auth::user()->id)->name == null)
            <p class="mb-0">Hello,</p>
            <h4 class="mb-0">{{App\Profile::find(Auth::user()->id)->name}}</h4>
            @else
            <p class="mb-0">Welcome to your Dashboard</p>
            @endif
        </div>
    </div>
</div>
<br />
<div class="card mat-box-shadow border-bottom-0">
    <div class="card-body p-0">
        <ul class="nav flex-column">
            <li class="nav-item border-bottom p-2">
                <a class="nav-link" href="/user/dashboard">My Dashboard</a>
            </li>
            <li class="nav-item border-bottom p-2">
                <a class="nav-link" href="#">My Orders</a>
            </li>
            <li class="nav-item border-bottom p-2">
                <a class="nav-link" href="/user/cart">My Cart</a>
            </li>
            <li class="nav-item border-bottom p-2">
                <a class="nav-link" href="/user/profile">My Profile</a>
            </li>
            <li class="nav-item border-bottom p-2">
                <a class="nav-link" href="#">Logout</a>
            </li>
        </ul>
    </div>
</div>