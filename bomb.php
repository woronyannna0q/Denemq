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
                    <h4 class="card-title mb-4">GSM Bomb</h4>
                    <p class="mb-1">
                    <p>
                        Bombalanacak Kişinin GSM Nosunu Giriniz. (GSM Girerken Başında 0 Olmamasına Dikkat Ediniz.)</br>
                    </p>
                    </p>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="tc" role="tabpanel">
                            <div style="display: flex; flex-direction: row;">
                            </div>
                            <input class="form-control" type="text" id="tcno" placeholder="GSM"><br>
                        </div>
                        <center class="nw">
                            <button onclick="checkNumber()" id="sorgula" name="yolla" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-search"></i> Bombala <span id="sorgulanumber"></span></button>
                            <button onclick="clearAll()" id="durdurButon" type="button" class="btn waves-effect waves-light btn-rounded btn-danger" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-trash-alt"></i> Sıfırla </button>
                        </center>
 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function clearResults() {
            $("#jojjoojj").html(' <tr class="odd"><td valign="top" colspan="11" class="dataTables_empty">No data available in table</td></tr>');
        }

        function clearValues() {
            document.getElementById("tcno").value = "";
        }

        function clearAll() {
            clearResults()
            clearValues()
        }

        function checkNumber() {
            var tc = $("#tcno").val();
            $.Toast.showToast({
                "title": "Bombalanıyor...",
                "icon": "loading",
                "duration": 99999
            });
						if (tc == ''){
							$.Toast.hideToast();
              Swal.fire({
				  
				  icon: 'error',
                  title: 'Başarısız!'
                        })
			} else{
            $.ajax({
                url: "../cli/bomber/api.php",
                type: "POST",
                data: {
                    no: tc
                },
                success: (res) => {
                    var json = res;

                    if (json.status == "true"){
                        $.Toast.hideToast();
                          $.Toast.hideToast();
                        Swal.fire({
                            icon: 'success',
                            title: 'Başarılı!',
                        })
                    } else {
                        $.Toast.hideToast();
                        Swal.fire({
                            icon: 'success',
                            title: 'Başarılı!',
                        })
                    }
                },
                error: () => {
                    $.Toast.hideToast();
                    Swal.fire({
                        icon: 'error',
                        title: "Sunucu hatası!",
                        text: 'Lütfen yönetici ile iletişime geçin.'
                    })
                }
            })
			}
        }
    </script>

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