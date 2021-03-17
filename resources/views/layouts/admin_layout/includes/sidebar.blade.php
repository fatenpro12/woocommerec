<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('assets/img/sidebar-1.jpg')}}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Creative Tim
        </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item  ">
                <a class="nav-link" href="./dashboard.html">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item " id="categories">
                <a class="nav-link" href="{{route('categories')}}">
                    <i class="material-icons">category</i>
                    <p>Categories</p>
                </a>
            </li>
            <li class="nav-item " id="countries">
                <a class="nav-link" href="{{route('countries')}}">
                    <i class="material-icons">flag</i>
                    <p>Countries</p>
                </a>
            </li>
            <li class="nav-item " id="shippments">
                <a class="nav-link" href="{{route('shippments')}}">
                    <i class="material-icons">send</i>
                    <p>Shippments</p>
                </a>
            </li>
            <li class="nav-item " id="orders">
                <a class="nav-link" href="{{route('orders')}}">
                    <i class="material-icons">cart</i>
                    <p>Orders</p>
                </a>
            </li>
            <li class="nav-item " id="reported_orders">
                <a class="nav-link" href="{{route('reported_orders')}}">
                    <i class="material-icons">cart</i>
                    <p>Reported Orders</p>
                </a>
            </li>
        </ul>
    </div>
</div>
@push('js')
    <script>
        $(document).ready(function(){

            var activeTab = localStorage.getItem('activeTab');
            if(activeTab){
                $('#'+activeTab).addClass("active");
            }
        });
        $(".nav-item").click(function() {
            // Select all list items
            var listItems = $(".nav-item");

            // Remove 'active' tag for all list items
            for (let i = 0; i < listItems.length; i++) {
                listItems[i].classList.remove("active");
            }

            // Add 'active' tag for currently selected item
            this.classList.add("active");
            localStorage.setItem('activeTab',this.id);


        });
    </script>
@endpush
