{{$reserve->getUserName()}}さん
{{$reserve->lesson->getStartDay()}}の{{$reserve->getCourseTitle()}}へのご予約ありがとうございます！


レッスンの詳細については、下記サイトを参照ください。
{{url("/course")}}/{{$reserve->lesson->course->id}}

また、万が一ご都合が悪くなった場合は、下記サイトよりキャンセル操作をお願いいたします。
{{url("/course")}}/{{$reserve->lesson->course->id}}


その他、ご質問がある場合は、{{$reserve->getOwnerEmail()}}までお気軽にお問い合わせください。

{{$reserve->getUserName()}}さんと一緒にダンスするのを楽しみにしています！
