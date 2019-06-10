@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">プライバシーポリシー</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <p>齊藤大介（以下，「弊組合」といいます。）は，本ウェブサイト上で提供するサービス（以下
                    ,「本サービス」といいます。）におけるプライバシー情報の取扱いについて，以下のとおりプライバシーポリシー（以下，「本ポリシー」といいます。）を定めます。</p>

                    <h2>第1条（プライバシー情報）</h2>
                    <p>プライバシー情報のうち「個人情報」とは，個人情報保護法にいう「個人情報」を指すものとし，生存する個人に関する情報であって，当該情報に含まれる氏名，生年月日，住所，電話番号，連絡先その他の記述等により特定の個人を識別できる情報を指します。
                    </p>

                    <p>プライバシー情報のうち「履歴情報および特性情報」とは，上記に定める「個人情報」以外のものをいい，ご利用いただいたサービスやご購入いただいた商品，ご覧になったページや広告の履歴，ユーザーが検索された検索キーワード，ご利用日時，ご利用の方法，ご利用環境，郵便番号や性別，職業，年齢，ユーザーのIPアドレス，クッキー情報，位置情報，端末の個体識別情報などを指します。
                    </p>

                    <h2>第２条（プライバシー情報の収集方法）</h2>

                    <p>弊組合は，ユーザーについて， 利用登録をする際にTwitterのアクセストークンやメールアドレスを取得及び保存します。</p>

                    <h2>第３条（個人情報を収集・利用する目的）</h2>
                    <p>
                        弊組合が個人情報を収集・利用する目的は，以下のとおりです。
                        ユーザのTwitterアカウントからTwitterへ投稿するため
                        ユーザのTwitterアカウントへDBを送信するため
                        ユーザにメール通知を行うため
                        上記の利用目的に付随する目的
                    </p>
                    <h2>第４条（個人情報の第三者提供）</h2>
                    <p>
                        1. 弊組合は，次に掲げる場合を除いて，あらかじめユーザーの同意を得ることなく，第三者に個人情報を提供することはありません。ただし，個人情報保護法その他の法令で認められる場合を除きます。
                        法令に基づく場合
                        人の生命，身体または財産の保護のために必要がある場合であって，本人の同意を得ることが困難であるとき
                        公衆衛生の向上または児童の健全な育成の推進のために特に必要がある場合であって，本人の同意を得ることが困難であるとき
                        国の機関もしくは地方公共団体またはその委託を受けた者が法令の定める事務を遂行することに対して協力する必要がある場合であって，本人の同意を得ることにより当該事務の遂行に支障を及ぼすおそれがあるとき
                        予め次の事項を告知あるいは公表をしている場合
                        利用目的に第三者への提供を含むこと
                        第三者に提供されるデータの項目
                        第三者への提供の手段または方法
                        本人の求めに応じて個人情報の第三者への提供を停止すること
                        2.前項の定めにかかわらず，次に掲げる場合は第三者には該当しないものとします。
                        弊組合が利用目的の達成に必要な範囲内において個人情報の取扱いの全部または一部を委託する場合
                        合併その他の事由による事業の承継に伴って個人情報が提供される場合
                        個人情報を特定の者との間で共同して利用する場合であって，その旨並びに共同して利用される個人情報の項目，共同して利用する者の範囲，利用する者の利用目的および当該個人情報の管理について責任を有する者の氏名または名称について，あらかじめ本人に通知し，または本人が容易に知り得る状態に置いているとき
                        第５条（個人情報の開示）
                        1.弊組合は，本人から個人情報の開示を求められたときは，本人に対し，遅滞なくこれを開示します。ただし，開示することにより次のいずれかに該当する場合は，その全部または一部を開示しないこともあり，開示しない決定をした場合には，その旨を遅滞なく通知します。なお，個人情報の開示に際しては，１件あたり１，０００円の手数料を申し受けます。
                        本人または第三者の生命，身体，財産その他の権利利益を害するおそれがある場合
                        弊組合の業務の適正な実施に著しい支障を及ぼすおそれがある場合
                        その他法令に違反することとなる場合
                        2.前項の定めにかかわらず，履歴情報および特性情報などの個人情報以外の情報については，原則として開示いたしません。
                    </p>
                    <h2>第６条（個人情報の訂正および削除）</h2>
                    <p>ユーザーは，弊組合の保有する自己の個人情報が誤った情報である場合には，弊組合が定める手続きにより，弊組合に対して個人情報の訂正または削除を請求することができます。</>
                        弊組合は，ユーザーから前項の請求を受けてその請求に応じる必要があると判断した場合には，遅滞なく，当該個人情報の訂正または削除を行い，これをユーザーに通知します。</p>
                    <h2>第７条（個人情報の利用停止等）</h2>
                    <p>弊組合は，本人から，個人情報が，利用目的の範囲を超えて取り扱われているという理由，または不正の手段により取得されたものであるという理由により，その利用の停止または消去（以下，「利用停止等」といいます。）を求められた場合には，遅滞なく必要な調査を行い，その結果に基づき，個人情報の利用停止等を行い，その旨本人に通知します。ただし，個人情報の利用停止等に多額の費用を有する場合その他利用停止等を行うことが困難な場合であって，本人の権利利益を保護するために必要なこれに代わるべき措置をとれる場合は，この代替策を講じます。
                    </p>
                    <h2>第８条（プライバシーポリシーの変更）</h2>
                    <p>本ポリシーの内容は，ユーザーに通知することなく，変更することができるものとします。
                        弊組合が別途定める場合を除いて，変更後のプライバシーポリシーは，本ウェブサイトに掲載したときから効力を生じるものとします。</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection