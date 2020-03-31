<!doctype html>
<html lang="en">


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/tables/extended.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:33:58 GMT -->
<head>
    <?php $this->load->view("templates/header.php"); ?>
</head>

<body>
    <div class="wrapper">
        <?php $this->load->view("templates/sidebar.php"); ?>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> Extended Tables </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">dashboard</i>
                                    <p class="hidden-lg hidden-md">Dashboard</p>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">notifications</i>
                                    <span class="notification">5</span>
                                    <p class="hidden-lg hidden-md">
                                        Notifications
                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Mike John responded to your email</a>
                                    </li>
                                    <li>
                                        <a href="#">You have 5 new tasks</a>
                                    </li>
                                    <li>
                                        <a href="#">You're now friend with Andrew</a>
                                    </li>
                                    <li>
                                        <a href="#">Another Notification</a>
                                    </li>
                                    <li>
                                        <a href="#">Another One</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">person</i>
                                    <p class="hidden-lg hidden-md">Profile</p>
                                </a>
                            </li>
                            <li class="separator hidden-lg hidden-md"></li>
                        </ul>
                        <form class="navbar-form navbar-right" role="search">
                            <div class="form-group form-search is-empty">
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="material-input"></span>
                            </div>
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <h4 class="card-title">Simple Table</h4>
                                <div class="card-content">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Name</th>
                                                    <th>Job Position</th>
                                                    <th>Since</th>
                                                    <th class="text-right">Salary</th>
                                                    <th class="text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td>Andrew Mike</td>
                                                    <td>Develop</td>
                                                    <td>2013</td>
                                                    <td class="text-right">&euro; 99,225</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" class="btn btn-info">
                                                            <i class="material-icons">person</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" class="btn btn-success">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" class="btn btn-danger">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">2</td>
                                                    <td>John Doe</td>
                                                    <td>Design</td>
                                                    <td>2012</td>
                                                    <td class="text-right">&euro; 89,241</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" class="btn btn-info btn-round">
                                                            <i class="material-icons">person</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" class="btn btn-success btn-round">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" class="btn btn-danger btn-round">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">3</td>
                                                    <td>Alex Mike</td>
                                                    <td>Design</td>
                                                    <td>2010</td>
                                                    <td class="text-right">&euro; 92,144</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" class="btn btn-info btn-simple">
                                                            <i class="material-icons">person</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" class="btn btn-success btn-simple">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" class="btn btn-danger btn-simple">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">4</td>
                                                    <td>Mike Monday</td>
                                                    <td>Marketing</td>
                                                    <td>2013</td>
                                                    <td class="text-right">&euro; 49,990</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" class="btn btn-info btn-round">
                                                            <i class="material-icons">person</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" class="btn btn-success btn-round">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" class="btn btn-danger btn-round">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">5</td>
                                                    <td>Paul Dickens</td>
                                                    <td>Communication</td>
                                                    <td>2015</td>
                                                    <td class="text-right">&euro; 69,201</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" class="btn btn-info">
                                                            <i class="material-icons">person</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" class="btn btn-success">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" class="btn btn-danger">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <h4 class="card-title">Striped Table</h4>
                                <div class="card-content">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th></th>
                                                    <th>Product Name</th>
                                                    <th>Type</th>
                                                    <th>Qty</th>
                                                    <th class="text-right">Price</th>
                                                    <th class="text-right">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="optionsCheckboxes" checked>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Moleskine Agenda</td>
                                                    <td>Office</td>
                                                    <td>25</td>
                                                    <td class="text-right">&euro; 49</td>
                                                    <td class="text-right">&euro; 1,225</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">2</td>
                                                    <td>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="optionsCheckboxes" checked>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Stabilo Pen</td>
                                                    <td>Office</td>
                                                    <td>30</td>
                                                    <td class="text-right">&euro; 10</td>
                                                    <td class="text-right">&euro; 300</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="optionsCheckboxes" checked>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>A4 Paper Pack</td>
                                                    <td>Office</td>
                                                    <td>50</td>
                                                    <td class="text-right">&euro; 10.99</td>
                                                    <td class="text-right">&euro; 109</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">4</td>
                                                    <td>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="optionsCheckboxes">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Apple iPad</td>
                                                    <td>Meeting</td>
                                                    <td>10</td>
                                                    <td class="text-right">&euro; 499.00</td>
                                                    <td class="text-right">&euro; 4,990</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="optionsCheckboxes">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Apple iPhone</td>
                                                    <td>Communication</td>
                                                    <td>10</td>
                                                    <td class="text-right">&euro; 599.00</td>
                                                    <td class="text-right">&euro; 5,999</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5"></td>
                                                    <td class="td-total">
                                                        Total
                                                    </td>
                                                    <td class="td-price">
                                                        <small>&euro;</small>12,999
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <h4 class="card-title">Shopping Cart Table</h4>
                                <div class="card-content">
                                    <div class="table-responsive">
                                        <table class="table table-shopping">
                                            <thead>
                                                <tr>
                                                    <th class="text-center"></th>
                                                    <th>Product</th>
                                                    <th class="th-description">Color</th>
                                                    <th class="th-description">Size</th>
                                                    <th class="text-right">Price</th>
                                                    <th class="text-right">Qty</th>
                                                    <th class="text-right">Amount</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="img-container">
                                                            <img src="../../assets/img/product1.jpg" alt="...">
                                                        </div>
                                                    </td>
                                                    <td class="td-name">
                                                        <a href="#jacket">Spring Jacket</a>
                                                        <br />
                                                        <small>by Dolce&Gabbana</small>
                                                    </td>
                                                    <td>
                                                        Red
                                                    </td>
                                                    <td>
                                                        M
                                                    </td>
                                                    <td class="td-number text-right">
                                                        <small>&euro;</small>549
                                                    </td>
                                                    <td class="td-number">
                                                        1
                                                        <div class="btn-group">
                                                            <button class="btn btn-round btn-info btn-xs"> <i class="material-icons">remove</i> </button>
                                                            <button class="btn btn-round btn-info btn-xs"> <i class="material-icons">add</i> </button>
                                                        </div>
                                                    </td>
                                                    <td class="td-number">
                                                        <small>&euro;</small>549
                                                    </td>
                                                    <td class="td-actions">
                                                        <button type="button" rel="tooltip" data-placement="left" title="Remove item" class="btn btn-simple">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="img-container">
                                                            <img src="../../assets/img/product2.jpg" alt="..." />
                                                        </div>
                                                    </td>
                                                    <td class="td-name">
                                                        <a href="#pants">Short Pants</a>
                                                        <br />
                                                        <small>by Pucci</small>
                                                    </td>
                                                    <td>
                                                        Purple
                                                    </td>
                                                    <td>
                                                        M
                                                    </td>
                                                    <td class="td-number">
                                                        <small>&euro;</small>499
                                                    </td>
                                                    <td class="td-number">
                                                        2
                                                        <div class="btn-group">
                                                            <button class="btn btn-round btn-info btn-xs"> <i class="material-icons">remove</i> </button>
                                                            <button class="btn btn-round btn-info btn-xs"> <i class="material-icons">add</i> </button>
                                                        </div>
                                                    </td>
                                                    <td class="td-number">
                                                        <small>&euro;</small>998
                                                    </td>
                                                    <td class="td-actions">
                                                        <button type="button" rel="tooltip" data-placement="left" title="Remove item" class="btn btn-simple">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="img-container">
                                                            <img src="../../assets/img/product3.jpg" alt="...">
                                                        </div>
                                                    </td>
                                                    <td class="td-name">
                                                        <a href="#nothing">Pencil Skirt</a>
                                                        <br />
                                                        <small>by Valentino</small>
                                                    </td>
                                                    <td>
                                                        White
                                                    </td>
                                                    <td>
                                                        XL
                                                    </td>
                                                    <td class="td-number">
                                                        <small>&euro;</small>799
                                                    </td>
                                                    <td class="td-number">
                                                        1
                                                        <div class="btn-group">
                                                            <button class="btn btn-round btn-info btn-xs"> <i class="material-icons">remove</i> </button>
                                                            <button class="btn btn-round btn-info btn-xs"> <i class="material-icons">add</i> </button>
                                                        </div>
                                                    </td>
                                                    <td class="td-number">
                                                        <small>&euro;</small>799
                                                    </td>
                                                    <td class="td-actions">
                                                        <button type="button" rel="tooltip" data-placement="left" title="Remove item" class="btn btn-simple">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5"></td>
                                                    <td class="td-total">
                                                        Total
                                                    </td>
                                                    <td colspan="1" class="td-price">
                                                        <small>&euro;</small>2,346
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6"></td>
                                                    <td colspan="2" class="text-right">
                                                        <button type="button" class="btn btn-info btn-round">Complete Purchase <i class="material-icons">keyboard_arrow_right</i></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view("templates/footer.php"); ?>
        </div>
    </div>
    <div class="fixed-plugin">
        <div class="dropdown show-dropdown">
            <a href="#" data-toggle="dropdown">
                <i class="fa fa-cog fa-2x"> </i>
            </a>
            <ul class="dropdown-menu">
                <li class="header-title"> Sidebar Filters</li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger active-color">
                        <div class="badge-colors text-center">
                            <span class="badge filter badge-purple" data-color="purple"></span>
                            <span class="badge filter badge-blue" data-color="blue"></span>
                            <span class="badge filter badge-green" data-color="green"></span>
                            <span class="badge filter badge-orange" data-color="orange"></span>
                            <span class="badge filter badge-red" data-color="red"></span>
                            <span class="badge filter badge-rose active" data-color="rose"></span>
                        </div>
                        <div class="clearfix"></div>
                    </a>
                </li>
                <li class="header-title">Sidebar Background</li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger background-color">
                        <div class="text-center">
                            <span class="badge filter badge-white" data-color="white"></span>
                            <span class="badge filter badge-black active" data-color="black"></span>
                        </div>
                        <div class="clearfix"></div>
                    </a>
                </li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger">
                        <p>Sidebar Mini</p>
                        <div class="togglebutton switch-sidebar-mini">
                            <label>
                                <input type="checkbox" unchecked="">
                            </label>
                        </div>
                        <div class="clearfix"></div>
                    </a>
                </li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger">
                        <p>Sidebar Image</p>
                        <div class="togglebutton switch-sidebar-image">
                            <label>
                                <input type="checkbox" checked="">
                            </label>
                        </div>
                        <div class="clearfix"></div>
                    </a>
                </li>
                <li class="header-title">Images</li>
                <li class="active">
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="../../assets/img/sidebar-1.jpg" alt="" />
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="../../assets/img/sidebar-2.jpg" alt="" />
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="../../assets/img/sidebar-3.jpg" alt="" />
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="../../assets/img/sidebar-4.jpg" alt="" />
                    </a>
                </li>
                <li class="button-container">
                    <div class="">
                        <a href="http://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-rose btn-block">Buy Now</a>
                    </div>
                    <div class="">
                        <a href="http://www.creative-tim.com/product/material-dashboard" target="_blank" class="btn btn-info btn-block">Get Free Demo</a>
                    </div>
                </li>
                <li class="header-title">Thank you for 95 shares!</li>
                <li class="button-container">
                    <button id="twitter" class="btn btn-social btn-twitter btn-round"><i class="fa fa-twitter"></i> &middot; 45</button>
                    <button id="facebook" class="btn btn-social btn-facebook btn-round"><i class="fa fa-facebook-square"> &middot;</i>50</button>
                </li>
            </ul>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<?php $this->load->view("templates/js.php"); ?>


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/tables/extended.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:34:01 GMT -->
</html>