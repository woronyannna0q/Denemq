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
<div class="row">
    <div class="col-xl-12 col-md-6">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">E- Okul Sorgu</h4>
                    <p class="mb-1">
                    <p>Sorgulanacak Kişinin T.C. Kimlik Numarasını Giriniz.</p>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" role="tabpanel">

                            <input require maxlength="11" class="form-control" type="text" name="tcno" id="TC" placeholder="TC"><br>
                            <center>
                                <button onclick="sorgula()" id="sorgula" name="yolla" class="btn waves-effect waves-light btn-rounded btn-success" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-search"></i> Sorgula <span id="sayı"></span></button>
                            </center>
							
							</div>
                            <div class="table-responsive">
                                <table id="zero-conf" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ADI</th>
                                            <th>SOYADI</th>
                                            <th>OKUL NO</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabledata">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

        function sorgula() {

            $.Toast.showToast({
                "title": "Lütfen bekleyiniz",
                "icon": "loading",
                "duration": 60000
            });
            $.ajax({
                url: "../cli/okulno/api.php",
                type: "POST",
                data: {
                    TC: $("#TC").val()
                },
                success: (res) => {
                    var json = res;

                    if (json.status === "true") {

                        $.Toast.hideToast();
                        document.getElementById("sayı").innerHTML = " (" + json.number + ")";

                        var array = [];

                        for (var i = 0; i < json.number; i++) {
                            var data = json.data[i];
							var name = data.ADI;
                            var surname = data.SOYADI;
                            var vesika = data.VESIKA;
                            var okulno = data.OKULNO;

							result = "<tr><td>" + name + "</td><td>" + surname + "</td><td>" + okulno + "</td></tr>";								
							
							
                            array.push(result);
                        }

                        $("#tabledata").html(array)
                    } else {
                        $.Toast.hideToast();
						let timerInterval
                        Swal.fire({
                            icon: "error",
                            title: 'Bulunamadı!',
                            html: 'Aradığınız kişiye ait bilgi bulamadık!',
                            timer: 1500,
                            timerProgressBar: true,
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                        })
                    }
                },
                error: () => {
                    $.Toast.hideToast();
                    let timerInterval
                    Swal.fire({
                        icon: "error",
                        title: 'Sunucu Hatası!',
                        html: 'Içeriğe istedigimiz gibi erişemedik!',
                        timer: 1500,
                        timerProgressBar: true,
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                    })
                }
            })
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