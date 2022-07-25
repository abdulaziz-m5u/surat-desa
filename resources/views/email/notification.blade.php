<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <h1>Ada surat baru yang harus di periksa nih..</h1>

    <a href="{{ route('admin.letters.edit', $detail['id']) }}" class="btn btn-info text-white">
                                            <i class="fa fa-eye"></i> Lihat disini
                                        </a>
    
</body>
</html>