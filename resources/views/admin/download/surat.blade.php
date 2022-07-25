<!DOCTYPE html>
<html>
  	<head>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Revenue Reprot</title>
		<style type="text/css">
			table {
				width: 100%;
			}

			table tr td,
			table tr th {
				font-size: 10pt;
				text-align: left;
			}

			table tr:nth-child(even) {
				background-color: #f2f2f2;
			}

			table th, td {
  				border-bottom: 1px solid #ddd;
			}

			table th {
				border-top: 1px solid #ddd;
				height: 40px;
			}

			table td {
				height: 25px;
			}
			.container{
				border:1px solid black;
				transform: scaleX(1.2) scaleY(1.1);
				position: relative;
				text-align: center;
				margin: auto;
			}
		</style>
	</head>
  	<body>
		<div class="container">
			<img
			style="position:absolute;top:-50px;left:0;z-index:0;"
			src="{{ public_path() .Storage::url($letter->category->template) }}"
			height="100%"
			width="100%" />
			<ul style="z-index:1;margin-top: 223px;margin-left:230px;">
				<li style="text-align:left;list-style:none;margin-bottom:.5rem;">{{ $letter->nama }}</li>
				<li style="text-align:left;list-style:none;margin-bottom:.5rem;">{{ $letter->nik }}</li>
				<li style="text-align:left;list-style:none;margin-bottom:.6rem;">{{ $letter->tempat_lahir }}, {{ $letter->tanggal_lahir }}</li>
				<li style="text-align:left;list-style:none;margin-bottom:.6rem;">{{ $letter->jenis_kelamin === 0 ? 'Perempuan' : 'Laki-laki' }}</li>
				<li style="text-align:left;list-style:none;margin-bottom:.6rem;">{{ $letter->kewarganegaraan }}</li>
				<li style="text-align:left;list-style:none;margin-bottom:.5rem;">@if($letter->agama === 0) Islam @elseif($letter->agama === 1) Hindu @elseif($letter->agama === 2) Buddha @elseif($letter->agama === 3) Kristen @elseif($letter->agama === 4) Katolik @endif </li>
				<li style="text-align:left;list-style:none;margin-bottom:.5rem;">{{ $letter->pekerjaan}}</li>
				<li style="text-align:left;list-style:none;">{{ $letter->alamat }}</li>
			</ul>
		</div>
 	</body>
</html>