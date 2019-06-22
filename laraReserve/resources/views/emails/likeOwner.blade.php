<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>イイねのお知らせ</title>
</head>
<body>
  
<p>{{$like->getOwnerName()}}さん</p>
<p>{{$like->getUserName()}}さんが{{$like->getCourseTitle()}}をイイねしました。</p>

</body>
</html>