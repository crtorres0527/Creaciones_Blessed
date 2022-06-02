<?php 
include_once'Vistas/parte_superior.php'
?>
<?php include 'inventario/db_inv.php';
    $sentencia = $bd->query("SELECT * FROM inventario i INNER JOIN producto p ON i.idProducto = p.idProducto");
    $inv= $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($producto);

?>
                <!-- Begin Page Content -->
                
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Inventario</h1>
                    <a class="link-dark"href="inventario/index_inv.php"><p>Mostrar mas</p></a>
                    <!-- DataTales Example -->
                    <div class="card-header text-center ">
                INVENTARIO DE PRODUCTOS
                
            </div>
            
            <table class="table table-striped table-bordered  align-midle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">STOCK</th>
                        <th scope="col">SALIDA</th>
                        <th scope="col">ENTRADA</th>
                        <th scope="col">SALDO</th>
                        <th scope="col">IDPRODUCTO</th>
                        
                        
                </thead>
                <tbody>
                    <?php
                        foreach($inv as $dato){
                    ?>
                    <tr>
                        <td scope="row"><?php echo $dato -> idInventario; ?> </td>
                        <td><?php echo $dato ->StockProducto; ?></td>
                        <td><?php echo $dato ->salida; ?></td>
                        <td><?php echo $dato ->Entrada; ?></td>
                        <td><?php echo $dato ->Saldo; ?></td>
                        <td><?php echo $dato ->Nombre; ?></td>
                        
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table> 
        </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>