<!-- header -->
<?php
$pageTitle = "Principal";
// css extension
$links = array('<link rel="stylesheet" href="../../assets/css/responsive.dataTables.min.css">');
include("../../inc/header.php");
?>


<body class=" ">

    <!-- sidebar -->
    <?php include("../../inc/sidebar.php"); ?>

    <main class="main-content">

        <!-- navbar -->
        <?php include("../../inc/navbar.php"); ?>

        <div class="content-inner container-fluid pb-0" id="page_layout">
            <div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Principal List</h4>
                                </div>
                                <button class="btn btn-soft-primary"><svg class="icon-16" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="icon-32">
                                        <path d="M12 4V20M20 12H4" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg> Add principal</button>
                            </div>
                            <div class="card-body px-0">
                                <div class="table-responsive">
                                    <table id="principalTable" class="table table-hover responsive nowrap" role="grid"
                                        data-toggle="dataTable">
                                        <thead>
                                            <tr class="ligth">
                                                <th>Image</th>
                                                <th>Fullname</th>
                                                <th>Email</th>
                                                <th>Username</th>
                                                <th style="min-width: 100px">Action</th>
                                            </tr>
                                        </thead>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Section Start -->
        <?php include("../../inc/footer.php"); ?>

    </main>

    <!-- script -->
    <?php include("../../inc/script.php"); ?>

    <!-- Slider-tab Script -->
    <script src="../../assets/js/plugins/slider-tabs.js"></script>

    <!-- Select2 Script -->
    <script src="../../assets/js/plugins/select2.js" defer></script>

    <!-- datatables -->
    <script src="../../assets/js/plugins/dataTables.responsive.min.js"></script>


    <script>
    let query = "CALL sp_getAllPrincipal";
    $('#principalTable').DataTable({
        "ajax": {
            url: '../../inc/table.php?query=' + query,
            dataSrc: ''
        },
        "columns": [{
            "data": "image",
            render: function(data, type, row) {
                return '<img class="bg-soft-primary rounded img-fluid avatar-40 me-3" src="data:image/jpeg;base64,' +
                    data + '" alt="profile" loading="lazy">';
            }
        }, {
            "data": "fullname"
        }, {
            "data": "email"
        }, {
            "data": "username"
        }, {
            "data": "id",
            render: function(data, type, row) {
                return '<a class="btn btn-sm btn-icon rounded btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit" href="#"> <span class="btn-inner"> <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"> </path> <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"> </path> <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"> </path> </svg> </span> </a> <a class="btn btn-sm btn-icon rounded btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" href="#"> <span class="btn-inner"> <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor"> <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"> </path> <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"> </path> </svg> </span> </a>';
            }
        }, ],
        drawCallback: function(settings) {
            const tooltipTriggerList = [].slice.call(document.querySelectorAll(
                '[data-bs-toggle="tooltip"]'))
            tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        },
        "autoWidth": false,
        "ordering": false,
        "dom": '<"row align-items-center"<"col-md-6" l><"col-md-6" f>><"table-responsive my-3" rt><"row align-items-center" <"col-md-6" i><"col-md-6" p>><"clear">',

    });
    </script>



</body>

</html>