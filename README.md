# 概要
Twitter利用者向けダンスレッスン予約サービス<br/>
運営中のサイト:https://eedance.funspot.tokyo/

## 機能
- 簡単にダンスレッスンが開催できる
 - サービスが提供する雛形にそって入力すると、ユーザーにレッスン参加を訴求するデザインで予約ページを作れる
　 - 画像、YouTube動画やGoogleMapの埋め込みなどに対応
   - 下書き機能付き
 - 複数の日程で予約受け付け可能
 - 予約やいいねがされたら、レッスン開催者へメールで連絡する 
-　簡単にダンスレッスンへ参加できる
　- ユーザー登録不要。ツイッター連携でログイン可能
　- 未ログイン状態で「予約」ボタンを押すと、「Twitter連携ログイン→予約」をオート実行する
  -　「レッスンに参加するTwitterアカウント」はレッスン開催者にのみ開示する
  　- Twitterという匿名性が高いツールで集客する関係上、身バレしたくない参加者が居ると考えた。
  　- ただし、開催者⇔参加者間は、緊急時の連絡用にTwitterアカウントを共有する。

## 工夫したところ
https://note.mu/daisuke85/n/n7b2cfabcc80e?creator_urlname=daisuke85

## 設計の要点
- 未ログインで予約操作をしたとき
  - Cokkieに予約操作を記録
  - Twitter連携で自動ログイン
  - Cokkieから予約操作情報を取り出して、予約実行
    - すでに予約済みの場合は、予約実行しない
 
- ユーザーが予約操作をしたときのメールでの連絡は非同期で行う
  - ユーザーには「予約完了画面」を素早く表示させて、安心してもらう
  - 通知の非同期化はLaravelの通知のキューイング機能を使っている
