
{{$reserve->getUserName()}}さんが{{$reserve->lesson->getStartDay()}}の{{$reserve->getCourseTitle()}}を予約しました！

{{url("/course")}}/{{$reserve->lesson->course->id}}

