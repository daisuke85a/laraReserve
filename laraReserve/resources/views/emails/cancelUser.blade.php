<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>キャンセル完了のお知らせ</title>
</head>
<body>
  

<p>{{$reserve->getUserName()}}さん</p>
<p>{{$reserve->lesson->getStartDay()}}の{{$reserve->getCourseTitle()}}へのご予約をキャンセルいたしました。</p>

<p>
またのご予約をお待ちしております。
</p>

<p>{{$reserve->getUserName()}}さんと一緒にダンスするのを楽しみにしています！</p>


</body>
</html>