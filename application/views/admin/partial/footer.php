                    <!-- Footer -->
                    <footer class="sticky-footer">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; Fogzee 2020-<?php echo date("Y");?></span>
                            </div>
                        </div>
                    </footer>
                    <!-- End of Footer -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="stepAlertModal" tabindex="-1" role="dialog" aria-labelledby="stepAlertModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="width: 27%;">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="exampleModalLabel">&nbsp;</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="padding-left: 10px;">At first complete your event setup section then click on promotion</p>
                </div>
                <div class="modal-footer">
                    &nbsp;
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo site_url(); ?>public/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo site_url(); ?>public/assets/vendor/popperjs/popper.min.js"></script>
    <script src="<?php echo site_url(); ?>public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo site_url(); ?>public/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo site_url(); ?>public/assets/js/sb-admin-2.min.js"></script>
    <script src="<?php echo site_url(); ?>public/assets/js/bootstrap-multiselect.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.js"></script>

    <script src="<?php echo site_url(); ?>public/assets/js/custom.js"></script>

    <?php if(isset($page_name) && $page_name == 'event_promotion'){ ?>
    <script src="<?php echo site_url(); ?>public/assets/js/presenter/promotion_setup.js"></script>
    <?php } ?>

    </body>
</html>