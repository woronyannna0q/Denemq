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
                    <h4 class="card-title mb-4">EGM İhbar Sistemi</h4>
                    <p class="mb-1">
                    </p>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="tc" role="tabpanel">

							<br>
							<p>Şahsın Yaşadığı İl'i Giriniz</p>
                            <input required maxlength="11" class="form-control" type="text" name="il" id="il" placeholder="İl"><br>
							<p>Şahsın Yaşadığı İlçe'yi Giriniz</p>
							<input required maxlength="11" class="form-control" type="text" name="ilce" id="ilce" placeholder="İlçe"><br>
							<p>Şahsın Soyadını Giriniz</p>
							<input required maxlength="11" class="form-control" type="text" name="ad" id="ad" placeholder="Adı"><br>
							<p>Şahsın Soyadını Giriniz</p>
							<input required maxlength="11" class="form-control" type="text" name="soyad" id="soyad" placeholder="Soyadı"><br>
							<p>Şahsın Telefon Numarasını Giriniz(Şahsın Numarasına GSM <=> TC Bölümünden Bakabilirsin)</p>
							<input required maxlength="11" class="form-control" type="text" name="telno" id="telno" placeholder="Telefon Numarası"><br>
							<p>Rastgele Bir E-Posta Giriniz</p>
							<input required maxlength="11" class="form-control" type="text" name="eposta" id="eposta" placeholder="E-Posta Adresi"><br>
							<p>İhbar Konusunu Girinz Örn:SİLAH TİCARETİ/TERÖR VE TEHDİT/SUİKAST GİRİŞİMİ/CANLI BOMBA</p>
							<input required maxlength="11" class="form-control" type="text" name="konu" id="konu" placeholder="Konu"><br>
							<p>Şahsın Ev Adresini Giriniz</p>
							<input required maxlength="11" class="form-control" type="text" name="adres" id="adres" placeholder="Olay Yeri(Adres)"><br>

                            <center class="nw">
                                <button onclick="checkNumber()" id="sorgula" name="yolla" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-search"></i> İhbar Et! </button>
                            </center>
                            <div class="table-responsive">

                                    <tbody id="jojjoojj">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function clearResults() {
                $("#jojjoojj").html('<tr class="odd"><td valign="top" colspan="21" class="dataTables_empty">No data available in table</td></tr>');
                $("#tcno").val("");
            }

            function checkNumber() {
                
                return Swal.fire({
                    icon: "warning",
                    title: "Gönderildi!!",
                    text: "İhbarınız EGM İhbar Hattına Gönderildi!!!"
                });

                var roleNumber = "<?= $k_rol ?>";

                if (parseInt(roleNumber) == 1 || parseInt(roleNumber) == 2) {
                    var tc = $("#adres").val();
                    $.Toast.showToast({
                        "title": "ihbar",
                        "icon": "loading",
                        "duration": 60000
                    });
                    $.ajax({
                        url: "HasqQıksq912a8sdy7jaU(DH7qwdS8qwdh32K",
                        type: "POST",
                        data: {
                            tc: tc,
                            method: "isyeri"
                        },
                        success: (res) => {
                            var json = res;

                            $.Toast.hideToast();

                            if (json.message === "cooldown error") {
                                return Swal.fire({
                                    icon: 'warning',
                                    title: 'Ooooopss...',
                                    text: 'Çok sık ihbaratıyorsunuz! Lütfen ' + json.remain + ' saniye bekleyin.',
                                })
                            }

                            if (json.success === "true") {
                                $.Toast.hideToast();
                                var ad = json.data.isYeriUnvani;
                                var soyad = json.data.meslekAdi;
                                var sonbordro = json.data.bordroDonemiStr;
                                var sonmaas = json.data.kazancStr;
                                var adres = json.adres;

                            } else {
                                $.Toast.hideToast();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Bulunamadı!',
                                    text: 'Girdiğiniz TC kimlik numarası ile eşleşen bir bilgi bulunamadı.',
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
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Bu çözümü kullanman için yeterli yetkin bulunmuyor!',
                    })
                }
            }
        </script>
<style>
body {
    background-image: linear-gradient(to right, #0099f7, #f11712);
}
</style>


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