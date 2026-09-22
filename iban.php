<?php
session_start();
require_once '../../server/PDO.php';

if (!isset($_SESSION["authtoken"])){
	header("Refresh: 0; url=../../");
} else{
?>
<?php require_once '../pages/TOP_2.php'; ?>

<!--<div class="page-content">-->
<!--BAŞLANGIC-->
<div class="overlay">
    </div>
<div class="row">
    <div class="col-xl-12 col-md-6">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">IBAN Check</h4>
                    <p class="mb-1">
                    </p>
                    <div class="block-content tab-content">
                        <div class="tab-pane active mb-2" role="tabpanel">
                            <iframe height="100%" width="100%" src="https://hesapno.com/mod_iban_coz" name="hesapno.com iban çözümleme modülü" frameborder="0"></iframe><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--BİTİŞ-->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="../vendor/jquery/jquery.min.js"></script>
	<script src="../assets/js/jquery.toast/jquery.toast.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../js/sb-admin-2.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../js/demo/datatables-demo.js"></script>
	<?php echo $fade[1]; ?>
</body>
</html>
<?php } ?>