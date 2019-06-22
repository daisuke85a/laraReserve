<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>予約完了のお知らせ</title>
</head>
<body>
  

<p>{{$reserve->getUserName()}}さん</p>
<p>{{$reserve->lesson->getStartDay()}}の{{$reserve->getCourseTitle()}}へのご予約ありがとうございます！</p>

<p>
レッスンの詳細については、下記サイトを参照ください。<br>
https://larareserve.funspot.tokyo/
</p>

<p>また、万が一ご都合が悪くなった場合は、下記サイトよりキャンセル操作をお願いいたします。<br>
  https://larareserve.funspot.tokyo/
</p>

<p>その他、ご質問がある場合は、{{$reserve->getOwnerEmail()}}までお気軽にお問い合わせください。
</p>

<p>{{$reserve->getUserName()}}さんと一緒にダンスするのを楽しみにしています！</p>


</body>
</html>