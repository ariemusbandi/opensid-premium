<html>
<head>
	<title>Buku Inventaris Dan Kekayaan Desa</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="<?= asset('css/report.css') ?>">
	<link rel="shortcut icon" href="<?= favico_desa() ?>"/>
	<!-- TODO: Pindahkan ke external css -->
	<style>
	.textx {
		mso-number-format: "\@";
	}

	td,
	th {
		font-size: 9pt;
	}

	table#ttd td {
		text-align: center;
		white-space: nowrap;
	}

	.underline {
		text-decoration: underline;
	}

	/* Style berikut untuk unduh excel.
	 * Cetak mengabaikan dan menggunakan style dari report.css
	 */
	table#inventaris {
		border: solid 2px black;
	}

	td.border {
		border: dotted 0.5px gray;
	}

	th.border {
		border: solid 0.5pt gray;
	}

	.pull-left {
		position: relative;
		width: 50%;
		float: left;
	}

	.pull-right {
		position: relative;
		width: 50%;
		float: right;
		text-align: right;
		/* padding-right:20px; */
	}
	</style>
</head>
<body>
	<div id="container">
		<!-- Print Body -->
		<div id="body">
			<div class="desa" align="center">
				<h3>BUKU INVENTARIS DAN KEKAYAAN <?= strtoupper($this->setting->sebutan_desa . ' ' . $header['nama_desa'])?></h3>
				<h3><?= strtoupper($this->setting->sebutan_kecamatan . ' ' . $header['nama_kecamatan'] . ' ' . $this->setting->sebutan_kabupaten . ' ' . $header['nama_kabupaten'])?></h3>
				<h3><?= (! empty($tahun) && $tahun != 'semua') ? 'TAHUN ' . $tahun : '' ?></h3>
				<br>
			</div>
			<table id="example" class="list border thick">
				<thead style="background-color:#f9f9f9;">
					<tr>
						<th class="text-center" rowspan="3">No</th>
						<th class="text-center" rowspan="3">Jenis Barang/Bangunan</th>
						<th class="text-center" rowspan="1" colspan="5">Asal Barang/Bangunan</th>
						<th class="text-center" rowspan="1" colspan="2">Keadaan Barang / Bangunan AWal Tahun</th>
						<th class="text-center" rowspan="1" colspan="4">Penghapusan Barang Dan Bangunan</th>
						<th class="text-center" rowspan="1" colspan="2">Keadaan Barang / Bangunan Akhir Tahun</th>
						<th class="text-center" rowspan="3">Ket</th>
					</tr>
					<tr>
						<th class="text-center" rowspan="2">Dibeli Sendiri</th>
						<th class="text-center" rowspan="1" colspan="3">Bantuan</th>
						<th class="text-center" rowspan="2">Sumbangan</th>
						<th class="text-center" rowspan="2" width="50px">Baik</th>
						<th class="text-center" rowspan="2" width="50px">Rusak</th>
						<th class="text-center" rowspan="2">Rusak</th>
						<th class="text-center" rowspan="2">Dijual</th>
						<th class="text-center" rowspan="2">Disumbangkan</th>
						<th class="text-center" rowspan="2">Tgl Penghapusan</th>
						<th class="text-center" rowspan="2" width="50px">Baik</th>
						<th class="text-center" rowspan="2" width="50px">Rusak</th>
					</tr>
					<tr>
						<th>Pemerintah</th>
						<th>Provinsi</th>
						<th>Kab/Kota</th>
					</tr>
					<tr>
						<th class="text-center">1</th>
						<th class="text-center">2</th>
						<th class="text-center">3</th>
						<th class="text-center">4</th>
						<th class="text-center">5</th>
						<th class="text-center">6</th>
						<th class="text-center">7</th>
						<th class="text-center">8</th>
						<th class="text-center">9</th>
						<th class="text-center">10</th>
						<th class="text-center">11</th>
						<th class="text-center">12</th>
						<th class="text-center">13</th>
						<th class="text-center">14</th>
						<th class="text-center">15</th>
						<th class="text-center">16</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1 ?>
					<?php foreach ($data as $uraian => $asset): ?>
					<tr>
						<td><?= $i ?></td>
						<td><?= $uraian ?></td>
						<td class="text-center"><?= count($asset['Pembelian Sendiri']) ?></td>
						<td class="text-center"><?= count($asset['Bantuan Pemerintah']) ?></td>
						<td class="text-center"><?= count($asset['Bantuan Provinsi']) ?></td>
						<td class="text-center"><?= count($asset['Bantuan Kabupaten']) ?></td>
						<td class="text-center"><?= count($asset['Sumbangan']) ?></td>
						<td class="text-center"><?= count($asset['awal_baik']) ?></td>
						<td class="text-center"><?= count($asset['awal_rusak']) ?></td>
						<td class="text-center"><?= count($asset['hapus_rusak']) ?></td>
						<td class="text-center"><?= count($asset['hapus_jual']) ?></td>
						<td class="text-center"><?= count($asset['hapus_sumbang']) ?></td>
						<td class="text-center"><?= tgl_indo($asset['tgl_hapus']) ?></td>
						<td class="text-center"><?= count($asset['akhir_baik']) ?></td>
						<td class="text-center"><?= count($asset['akhir_rusak']) ?></td>
						<td>
							<?php foreach ($asset['keterangan'] as $ket): ?>
							<li><?= $ket ?></li>
							<?php endforeach ?>
						</td>
					</tr>
					<?php $i++ ?>
					<?php endforeach ?>
				</tbody>
			</table>
			<table id="ttd">
				<tr>
					<td colspan="14">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2" width="10%">&nbsp;</td>
					<td colspan="3" width="30%"></td>
					<td colspan="5" width="55%"> </td>
					<td colspan="5" width="5%">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="14">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="14">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2" width="10%">&nbsp;</td>
					<td colspan="3" width="30%">MENGETAHUI</td>
					<td colspan="5" width="55%"><?= strtoupper($header['nama_desa'] . ', ' . tgl_indo(date('Y m d'))) ?></td>
					<td colspan="5" width="5%">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2" width="10%">&nbsp;</td>
					<td colspan="3" width="30%"><?= strtoupper($pamong_ketahui['jabatan'] . ' ' . $header['nama_desa']) ?></td>
					<td colspan="5" width="55%"><?= strtoupper($pamong_ttd['jabatan'] . ' ' . $header['nama_desa']) ?></td>
					<td colspan="5" width="5%">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2" width="10%">&nbsp;</td>
					<td colspan="3" width="30%"></td>
					<td colspan="5" width="55%"></td>
					<td colspan="5" width="5%">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="14">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="14">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="14">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2" width="10%">&nbsp;</td>
					<td colspan="3" width="30%"><?= strtoupper($pamong_ketahui['nama']) ?></td>
					<td colspan="5" width="55%"><?= strtoupper($pamong_ttd['nama']) ?></td>
					<td colspan="5" width="5%">&nbsp;</td>
				</tr>
			</table>
		</div>
	</div>
</body>

</html>