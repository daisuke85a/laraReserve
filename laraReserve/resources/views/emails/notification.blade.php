<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>予約完了のお知らせ</title>
</head>
<body>
  
<p>{{$reserve->getUserName()}}さんが{{$reserve->lesson->getStartDay()}}の{{$reserve->getCourseTitle()}}を予約しました！</p>

<p>{{url("/course")}}/{{$reserve->lesson->course->id}}</p>

</body>
</html>