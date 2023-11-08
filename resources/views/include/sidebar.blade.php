<div class="sidebar" id="side_nav">
    <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
        <h1 class="fs-4">
            <span class="bg-white text-dark rounded shadow px-2 me-2">MT</span>
            <span class="text-black">MoneyTracker</span>
        </h1>
        <button class="btn d-md-none d-block close-btn px-1 py-0 text-white">
            <i class="bi bi-person"></i>
        </button>
    </div>

    <ul class="list-unstyled ">
        <li class="{{ request()->is('dashboard*') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="text-decoration-none px-3 py-2 d-block">
                <i class="bi bi-house-door-fill"></i> Dashboard
            </a>
        </li>

        <li class="{{ request()->is('expenses*') ? 'active' : '' }}">
            <a href="{{ route('expenses') }}" class="text-decoration-none px-3 py-2 d-block">
                <i class="bi bi-cash-coin"></i> Expenses
            </a>
        </li>

        <li class="">
            <a href="#" class="text-decoration-none px-3 py-2 d-block d-flex justify-content-between">
                <span>
                    <i class="bi bi-bar-chart-line-fill"></i> Summary
                </span>
            </a>
        </li>

        <li class="">
            <a href="#" class="text-decoration-none px-3 py-2 d-block">
                <i class="bi bi-wallet"></i> Budget
            </a>
        </li>
    </ul>

    <ul class="list-unstyled pt-5">
        <li class="">
            <a href="{{ route('logout') }}" class="text-decoration-none px-3 py-2 d-block">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
        </li>
    </ul>
</div>




<style>

.main-container{
    font-family: 'inter';
}

#side_nav{
    font-weight: bolder;
background-color: #fff2d3;
border-right: 1px solid #DCD4D4;
 min-width: 250px;
 max-width: 250px;
 transition: all 0.3s;
}
.content{
   min-height: 100vh;
   width: 100%;
}

.sidebar li:hover{
    background: linear-gradient(to right, rgb(140, 239, 132), rgb(207, 236, 205), #fff2d3);

       border: 1px solid #FEE19D;
}


.sidebar li.active{
    background: linear-gradient(to right, rgb(140, 239, 132), rgb(207, 236, 205), #fff2d3);
   /* border-radius: 8px ; */
   border: 1px solid #FEE19D;
}

.sidebar li a{
 color: #000;
}

@media(max-width: 767px){
 #side_nav{
   margin-left: -250px;
   position: absolute;
   min-height: 100vh;
   z-index: 1;

 }
 #side_nav.active{
   margin-left: 0;
  }
}
    </style>



