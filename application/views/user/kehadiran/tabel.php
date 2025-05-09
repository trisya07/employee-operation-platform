<h2>Tabel Kehadiran</h2>

<p class="mt-4">Kehadiran Bulan : <?= date('F') ?></p>
<table class="table text-center">
	<thead>
		<tr>
			<th>No</th>
			<th>Tgl/Bln/Thn</th>
			<th>Jam</th>
			<th>Keterangan</th>
			<!-- <th>Status</th> -->
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php foreach($absensi as $a) : ?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= $a['date'] ?></td>
				<td><?= $a['time'] ?></td>
				<td><?= $a['information'] ?></td>
				<td>
					
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
