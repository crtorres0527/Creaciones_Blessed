<?php 
include_once'Vistas/parte_superior.php'
?>
<?php 
    include_once "pedidos/db_ped.php";
    $sentencia = $bd->query("SELECT * FROM pedidodetallado e INNER JOIN producto p ON e.idProducto = p.idProducto INNER JOIN pedidocabecera c 
    ON e.idPedidoCabecera = c.idPedidoCabecera INNER JOIN persona u ON e.idPersona = u.idPersona  ");
    $pedido = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($pcabecera);

?>
                <!-- Begin Page Content -->
                
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Pedidos</h1>
                    <a class="link-dark"href="pedidos/index.ped.php"><p>Mostrar mas</p></a>
                    

                    <!-- DataTales Example -->
                    <div class="card">
                <div class="card-header">
                    Pedidos
                </div>

                <div class="p-4">
                    <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">PrecioUnitario</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Descargado</th>
                                    <th scope="col">idProducto</th>
                                    <th scope="col">idPedidoCabecera</th>
                                    <th scope="col">idPersona</th>
                        
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach($pedido as $dato){
                                ?>
                                

                                <tr>
                                    <td scope="row"><?php echo $dato->idPedidoDetallado; ?></td>
                                    <td><?php echo number_format($dato -> PrecioUnitario);?></td>
                                    <td><?php echo $dato->Cantidad?></td>
                                    <td><?php echo $dato->Descargado?></td>
                                    <td><?php echo $dato->NombreP?></td>
                                    <td><?php echo $dato->ClaveTransaccional?></td>
                                    <td><?php echo $dato->Nombre?></td>

                            
                                </tr>

                                <?php 
                                    }
                                ?>
                              
                              
                            </tbody>
                        </table>

                </div>
            </div>
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