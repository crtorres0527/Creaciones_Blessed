<?php 
include_once'Vistas/parte_superior.php'
?>
<?php include 'personas/db_per.php';
    $sentencia = $bd->query("SELECT * FROM persona p INNER JOIN tipodocumento t ON p.idTipoDocumento =t.idTipoDocumento 
    INNER JOIN tipo_usuario u ON p.idTipousuario = u.idTipousuario");
    $person= $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($producto);

?>
                <!-- Begin Page Content -->
                
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">PERSONAS</h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">PERSONAS</h6>
                        </div>
                        <a href="personas/index.per.php"><div>Mas opciones</div></a>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido</th>
                                        <th scope="col">Telefono</th>
                                        <th scope="col">Direccion</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Tipouser</th>
                                        <th scope="col">Usuario</th>
                                        <th scope="col">Contraseña</th>
                                        <th scope="col">Numdoc</th>
                                        <th scope="col">TipoDoc</th>
                                        
                                              
                                    </tr>
                                </thead>
                                    <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido</th>
                                        <th scope="col">Telefono</th>
                                        <th scope="col">Direccion</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">TipoDoc</th>
                                        <th scope="col">Numdoc</th>
                                        <th scope="col">Tipouser</th>
                                        <th scope="col">Usuario</th>      
                                    </tr>
                                    </tfoot>
                                    <tbody>
                    <?php
                        foreach($person as $dato){
                    ?>
                    <tr>
                        <td scope="row"><?php echo $dato -> idPersona; ?> </td>
                        <td><?php echo $dato -> Nombre; ?></td>
                        <td><?php echo $dato -> Apellido; ?></td>
                        <td><?php echo $dato -> Telefono; ?></td>
                        <td><?php echo $dato -> Direccion; ?></td>
                        <td><?php echo $dato -> Correo_electornico; ?></td>
                        <td><?php echo $dato -> DescripcionU; ?></td>
                        <td><?php echo $dato -> User_name; ?></td>
                        <td><?php echo $dato -> password; ?></td>
                        <td><?php echo $dato -> NumeroDocumento; ?></td>
                        <td><?php echo $dato -> Descripcion; ?></td>
                    <?php
                        }
                    ?>
                </tbody>
                                </table>
                            </div>
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