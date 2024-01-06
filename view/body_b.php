</div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="./public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="./public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="./public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="./public/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="./public/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="./public/plugins/raphael/raphael.min.js"></script>
<script src="./public/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="./public/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="./public/plugins/chart.js/Chart.min.js"></script>
<script src="./public/plugins/select2/js/select2.full.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="./public/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="./public/dist/js/pages/dashboard2.js"></script>


<script src="./public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="./public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="./public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="./public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="./public/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script>
    $(function () {
        lo_stop()

        function lo_start() {
            $(".loading").fadeIn(300);
        }

        function lo_stop() {
            $(".loading").fadeOut(300);
        }
    });
</script>

<script>
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function lo_start() {
            $(".loading").fadeIn(300);
        }

        function lo_stop() {
            $(".loading").fadeOut(300);
        }
    })
</script>
</body>
</html>
