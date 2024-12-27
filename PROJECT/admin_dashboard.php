<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="x-icon" href="assets/css/js/imgs/logo1.jpeg">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        /* Global styles and modal styles remain unchanged */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Responsive Styles */
        @media screen and (max-width: 768px) {
            .sidebar {
                display: none; /* Hide sidebar by default */
            }
            .sidebar-responsive {
                display: block; /* Show sidebar when responsive */
            }
            .main-container {
                padding: 20px; /* Adjust padding */
            }
        }

        /* Product, Inventory and Purchase Order styles */
        .product-list, .inventory-list, .purchase-order-list {
            display: none;
            margin-top: 20px;
        }

        .product-item, .inventory-item, .purchase-order-item {
            padding: 10px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .product-item img, .inventory-item img, .purchase-order-item img {
            width: 50px; /* Adjust the size of the image */
            height: auto;
            margin-right: 10px;
        }
        
        .purchase-order-info {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

    </style>
</head>
<body>
    <div class="grid-container">

        <!-- Header -->
        <header class="header">
            <div class="menu-icon" onclick="openSidebar()">
                <span class="material-icons-outlined">menu</span>
            </div>
            <div class="header-left">
                <span class="material-icons-outlined">search</span>
            </div>
            <div class="header-right">
                <span class="material-icons-outlined">notifications</span>
                <span class="material-icons-outlined">email</span>
                <span class="material-icons-outlined">account_circle</span>
            </div>
        </header>
        <!-- End Header -->

        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="sidebar-title">
                <div class="sidebar-brand">
                    <span class="material-icons-outlined">inventory</span> Guitar Garage Inventory
                </div>
                <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
            </div>

            <ul class="sidebar-list">
                <li class="sidebar-list-item" onclick="window.location.reload()">
                    <a href="javascript:void(0)">
                        <span class="material-icons-outlined">dashboard</span> Dashboard
                    </a>
                </li>
                <li class="sidebar-list-item" onclick="showProducts()">
                    <a href="javascript:void(0)">
                        <span class="material-icons-outlined">inventory_2</span> Products
                    </a>
                </li>
                <li class="sidebar-list-item" onclick="showInfo('Coming Soon..')">
                    <a href="javascript:void(0)">
                        <span class="material-icons-outlined">fact_check</span> Inventory
                    </a>
                </li>
                <li class="sidebar-list-item" onclick="showPurchaseOrders()">
                    <a href="javascript:void(0)">
                        <span class="material-icons-outlined">add_shopping_cart</span> Purchase Orders
                    </a>
                </li>
                <li class="sidebar-list-item" onclick="showInfo('Coming Soon..')">
                    <a href="javascript:void(0)">
                        <span class="material-icons-outlined">shopping_cart</span> Sales Orders
                    </a>
                </li>
                <li class="sidebar-list-item" onclick="showInfo('Coming Soon..')">
                    <a href="javascript:void(0)">
                        <span class="material-icons-outlined">poll</span> Reports
                    </a>
                </li>
                <li class="sidebar-list-item" onclick="showInfo('Coming Soon..')">
                    <a href="javascript:void(0)">
                        <span class="material-icons-outlined">settings</span> Settings
                    </a>
                </li>
            </ul>
        </aside>
        <!-- End Sidebar -->

        <!-- Main -->
        <main class="main-container">
            <div class="main-title">
                <p class="font-weight-bold">DASHBOARD</p>
            </div>

            <div class="main-cards">

                <div class="card">
                    <div class="card-inner">
                        <p class="text-primary">PRODUCTS</p>
                        <span class="material-icons-outlined text-blue">inventory_2</span>
                    </div>
                    <span class="text-primary font-weight-bold">249</span>
                </div>

                <div class="card">
                    <div class="card-inner">
                        <p class="text-primary">PURCHASE ORDERS</p>
                        <span class="material-icons-outlined text-orange">add_shopping_cart</span>
                    </div>
                    <span class="text-primary font-weight-bold">83</span>
                </div>

                <div class="card">
                    <div class="card-inner">
                        <p class="text-primary">SALES ORDERS</p>
                        <span class="material-icons-outlined text-green">shopping_cart</span>
                    </div>
                    <span class="text-primary font-weight-bold">79</span>
                </div>

                <div class="card">
                    <div class="card-inner">
                        <p class="text-primary">INVENTORY ALERTS</p>
                        <span class="material-icons-outlined text-red">notification_important</span>
                    </div>
                    <span class="text-primary font-weight-bold">56</span>
                </div>

            </div>

            <div class="charts">

                <div class="charts-card">
                    <p class="chart-title">Top 5 Sales</p>
                    <div id="bar-chart"></div>
                </div>

                <div class="charts-card">
                    <p class="chart-title">Purchase and Sales Orders</p>
                    <div id="area-chart"></div>
                </div>

            </div>

            <!-- Product List -->
            <div id="productList" class="product-list">
                <h3>Products</h3>
                <div class="product-item">
                    <img src="assets/css/js/imgs/shop5.jpeg" alt="Guitar A"> Gibson SG Electric Guitar
                </div>
                <div class="product-item">
                    <img src="assets/css/js/imgs/shop9.jpeg" alt="Guitar B"> Ibanez JEM77P Electric Guitar
                </div>
                <div class="product-item">
                    <img src="assets/css/js/imgs/shop13.jpeg" alt="Guitar C"> Ephiphone EJ-200SCE Guitar
                </div>
                <div class="product-item">
                    <img src="assets/css/js/imgs/shop14.jpeg" alt="Guitar D">Gibson 2019 LP CLassic Electric Guitar
                </div>
                <div class="product-item">
                    <img src="assets/css/js/imgs/shop16.jpeg" alt="Guitar E"> Fender Modern Telecaster Electric Guitar with Maple Neck
                </div>
            </div>

            
            <!-- Purchase Order List -->
            <div id="purchaseOrderList" class="purchase-order-list">
                <h3>Purchase Orders</h3>
                <div class="purchase-order-item">
                    <div class="purchase-order-info">
                        <span><strong>Buyer:</strong> John Doe</span>
                        <span><strong>Product:</strong> Acoustic Guitar</span>
                        <span><strong>Price:</strong> ₱3300</span>
                        <span><strong>Date:</strong> 2024-10-01</span>
                    </div>
                </div>
                <div class="purchase-order-item">
                    <div class="purchase-order-info">
                        <span><strong>Buyer:</strong> Jane Smith</span>
                        <span><strong>Product:</strong> Electric Guitar</span>
                        <span><strong>Price:</strong> ₱14200</span>
                        <span><strong>Date:</strong> 2024-10-05</span>
                    </div>
                </div>
                <div class="purchase-order-item">
                    <div class="purchase-order-info">
                        <span><strong>Buyer:</strong> Mike Johnson</span>
                        <span><strong>Product:</strong> Amplifier</span>
                        <span><strong>Price:</strong> ₱850</span>
                        <span><strong>Date:</strong> 2024-10-10</span>
                    </div>
                </div>
                <div class="purchase-order-item">
                    <div class="purchase-order-info">
                        <span><strong>Buyer:</strong> Emily Davis</span>
                        <span><strong>Product:</strong> Guitar Strings</span>
                        <span><strong>Price:</strong> ₱800</span>
                        <span><strong>Date:</strong> 2024-10-12</span>
                    </div>
                </div>
                <div class="purchase-order-item">
                    <div class="purchase-order-info">
                        <span><strong>Buyer:</strong> Chris Brown</span>
                        <span><strong>Product:</strong> Guitar Picks</span>
                        <span><strong>Price:</strong> ₱300</span>
                        <span><strong>Date:</strong> 2024-20-15</span>
                    </div>
                </div>
            </div>

        </main>
        <!-- End Main -->

    </div>

    <!-- Modal -->
    <div id="infoModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">×</span>
            <p id="modalText"></p>
        </div>
    </div>

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>

    <!-- Custom JS -->
    <script>
        // SIDEBAR TOGGLE
        let sidebarOpen = false;
        const sidebar = document.getElementById('sidebar');

        function openSidebar() {
            if (!sidebarOpen) {
                sidebar.classList.add('sidebar-responsive');
                sidebarOpen = true;
            }
        }

        function closeSidebar() {
            if (sidebarOpen) {
                sidebar.classList.remove('sidebar-responsive');
                sidebarOpen = false;
            }
        }

        // MODAL FUNCTIONALITY
        function showInfo(message) {
            document.getElementById('modalText').innerText = message;
            document.getElementById('infoModal').style.display = "block";
        }

        function closeModal() {
            document.getElementById('infoModal').style.display = "none";
        }

        // Show Product List
        function showProducts() {
            const productList = document.getElementById('productList');
            const inventoryList = document.getElementById('inventoryList');
            const purchaseOrderList = document.getElementById('purchaseOrderList');

            productList.style.display = productList.style.display === "block" ? "none" : "block";
            inventoryList.style.display = "none"; // hide inventory when showing products
            purchaseOrderList.style.display = "none"; // hide purchase orders when showing products
        }

        // Show Inventory List
        function showInventory() {
            const inventoryList = document.getElementById('inventoryList');
            const productList = document.getElementById('productList');
            const purchaseOrderList = document.getElementById('purchaseOrderList');

            inventoryList.style.display = inventoryList.style.display === "block" ? "none" : "block";
            productList.style.display = "none"; // hide products when showing inventory
            purchaseOrderList.style.display = "none"; // hide purchase orders when showing inventory
        }

        // Show Purchase Order List
        function showPurchaseOrders() {
            const purchaseOrderList = document.getElementById('purchaseOrderList');
            const productList = document.getElementById('productList');
            const inventoryList = document.getElementById('inventoryList');

            purchaseOrderList.style.display = purchaseOrderList.style.display === "block" ? "none" : "block";
            productList.style.display = "none"; // hide products when showing purchase orders
            inventoryList.style.display = "none"; // hide inventory when showing purchase orders
        }

        // ---------- CHARTS ----------
        // BAR CHART
        const barChartOptions = {
            series: [
                {
                    data: [10, 8, 6, 4, 2],
                },
            ],
            chart: {
                type: 'bar',
                height: 350,
                toolbar: {
                    show: false,
                },
            },
            colors: ['#246dec', '#cc3c43', '#367952', '#f5b74f', '#4f35a1'],
            plotOptions: {
                bar: {
                    distributed: true,
                    borderRadius: 4,
                    horizontal: false,
                    columnWidth: '40%',
                },
            },
            dataLabels: {
                enabled: false,
            },
            legend: {
                show: false,
            },
            xaxis: {
                categories: ['Electric Guitars', 'Acoustic Guitars', 'Accesories', 'New Arrival', 'Amplifier'],
            },
            yaxis: {
                title: {
                    text: 'Count',
                },
            },
        };

        const barChart = new ApexCharts(
            document.querySelector('#bar-chart'),
            barChartOptions
        );
        barChart.render();

        // AREA CHART
        const areaChartOptions = {
            series: [
                {
                    name: 'Purchase Orders',
                    data: [31, 40, 28, 51, 42, 109, 100],
                },
                {
                    name: 'Sales Orders',
                    data: [11, 32, 45, 32, 34, 52, 41],
                },
            ],
            chart: {
                height: 350,
                type: 'area',
                toolbar: {
                    show: false,
                },
            },
            colors: ['#4f35a1', '#246dec'],
            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: 'smooth',
            },
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
            markers: {
                size: 0,
            },
            yaxis: [
                {
                    title: {
                        text: 'Purchase Orders',
                    },
                },
                {
                    opposite: true,
                    title: {
                        text: 'Sales Orders',
                    },
                },
            ],
            tooltip: {
                shared: true,
                intersect: false,
            },
        };

        const areaChart = new ApexCharts(
            document.querySelector('#area-chart'),
            areaChartOptions
        );
        areaChart.render();
    </script>
</body>
</html>