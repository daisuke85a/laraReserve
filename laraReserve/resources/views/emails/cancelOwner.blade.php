<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>キャンセルのお知らせ</title>
</head>
<body>
  

<p>{{$reserve->getOwnerName()}}さん</p>

<p>{{$reserve->getUserName()}}さんが</p>
<p>{{$reserve->lesson->getStartDay()}}の{{$reserve->getCourseTitle()}}へのご予約をキャンセルいたしました。</p>


</body>
</html>