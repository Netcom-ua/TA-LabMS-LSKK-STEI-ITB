(function($) {
	// fungsi dijalankan setelah seluruh dokumen ditampilkan
	$(document).ready(function(e) {

		// deklarasikan variabel
		var kd_mhs = 0;
		var main = "mahasiswa.data.php";

		// tampilkan data mahasiswa dari berkas mahasiswa.data.php
		// ke dalam <div id="data-mahasiswa"></div>
		$("#data-mahasiswa").load(main);

		
		// ketika inputbox pencarian diisi
		$('input:text[name=pencarian]').on('input',function(e){
			var v_cari = $('input:text[name=pencarian]').val();
			
			if(v_cari!="") {
				$.post(main, {cari: v_cari} ,function(data) {
					// tampilkan data mahasiswa yang sudah di perbaharui
					// ke dalam <div id="data-mahasiswa"></div>
					$("#data-mahasiswa").html(data).show();
				});
			} else {
				// tampilkan data mahasiswa dari berkas mahasiswa.data.php
				// ke dalam <div id="data-mahasiswa"></div>
				$("#data-mahasiswa").load(main);
			}
		});


		// ketika tombol halaman ditekan
		$('.halaman').live("click", function(event){
			// mengambil nilai dari inputbox
			kd_hal = this.id;

			$.post(main, {halaman: kd_hal} ,function(data) {
				// tampilkan data mahasiswa yang sudah di perbaharui
				// ke dalam <div id="data-mahasiswa"></div>
				$("#data-mahasiswa").html(data).show();
			});
		});
		
		
	});
	
	// fungsi untuk menampilkan data dosen
	$(document).ready(function(e) {

		// deklarasikan variabel
		var kd_mhs = 0;
		var main = "dosen.data.php";

		// tampilkan data dosen dari berkas dosen.data.php
		// ke dalam <div id="data-dosen"></div>
		$("#data-dosen").load(main);

		
		// ketika inputbox pencarian diisi
		$('input:text[name=pencarian]').on('input',function(e){
			var v_cari = $('input:text[name=pencarian]').val();
			
			if(v_cari!="") {
				$.post(main, {cari: v_cari} ,function(data) {
					// tampilkan data dosen yang sudah di perbaharui
					// ke dalam <div id="data-dosen"></div>
					$("#data-dosen").html(data).show();
				});
			} else {
				// tampilkan data dosen dari berkas dosen.data.php
				// ke dalam <div id="data-dosen"></div>
				$("#data-dosen").load(main);
			}
		});


		// ketika tombol halaman ditekan
		$('.halaman').live("click", function(event){
			// mengambil nilai dari inputbox
			kd_hal = this.id;

			$.post(main, {halaman: kd_hal} ,function(data) {
				// tampilkan data dosen yang sudah di perbaharui
				// ke dalam <div id="data-dosen"></div>
				$("#data-dosen").html(data).show();
			});
		});
		
		
	});
}) (jQuery);
