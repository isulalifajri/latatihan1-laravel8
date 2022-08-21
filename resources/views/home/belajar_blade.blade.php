<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Blade</title>
</head>
<body>
    <p>Halo {{ $nama }}</p>
    <p>Contoh penggunaan foreach</p>
      @foreach($nama_bunga as $key=>$value)
      <li>{{ $key+1 }}. {{ $value }}</li>

      @endforeach

    <p>Contoh penggunaan for</p>
      @for($i=0;$i<3;$i++)

      <li>{{ $i+1 }}. {{ $nama_bunga[$i] }}</li>

      @endfor

    <p>Contoh penggunaan for dan if</p>
      @for($i=0;$i<3;$i++)
         @if(($i+1)%2==1)
      <li>{{ $i+1 }}. {{ $nama_bunga[$i] }}</li>
        @endif
      @endfor
</body>
</html>