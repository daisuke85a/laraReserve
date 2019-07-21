
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">利用規約</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    ゲストに関する利用規約
                    「EEDanceホスト向け利用規約」（以下「本規約」といいます。）は、齊藤大介（以下「当人」といいます。）が運営する、WEBサービス「EEDance」（以下「本WEBサービス」といいます。）を通じて提供する各サービスをホストとしてご利用頂くための利用条件を定めるものです。 
                    本サービスをご利用頂くにあたっては、本規約の全文をお読み頂いたうえで、本規約の全ての条項について承諾頂く必要があります。 
                    本サービスをご利用頂いた場合、利用者の方が本規約の内容を理解しており、かつ、本規約の全ての条項について承諾したものとみなします。
                    
                    第1条（用語の定義）
                    本規約において使用する以下の用語の意味は、以下に定めるとおりとします。
                    
                    ①「本サービス」とは、当人が運営する本WEBサービスを通じて提供する、本規約第3条第1項に定めるサービスの総称をいいます。
                    ②「本利用者」とは、本サービスを利用する全ての方をいいます。
                    ③「ホスト」とは、本サービスに利用者登録を行ったうえで、ゲストに対してサービスやレッスンなどを提供する方をいいます。
                    ④「ゲスト」とは、ホストの実施するサービスやレッスンなどを受ける方をいいます。
                    ⑤「レッスン等」とは、ホストがゲストに対して実施するサービスやレッスンなどの総称をいいます。
                    ⑥「サービス・レッスンページ」とは、ホストがゲストに対してレッスン等を行うために、自身のレッスン等を紹介し、受講予約を受けつけることができる専用WEBページ　をいいます。
                    第2条（本規約の範囲と変更）
                    1. 本規約は、本利用者と当人との間の本サービスの利用に関わる一切の関係に適用されるものとします。
                    
                    2. 当人は、本利用者の承諾を得ることなく、当人が適当と判断する方法で本利用者に通知することにより、本規約を変更できるものとします。なお、変更の内容を本利用者に個別に通知することはいたしかねますので、本サービスをご利用の際には、随時、最新の本規約をご参照ください。
                    
                    3. 当人が本サービス上で掲載する本サービスの利用に関するルールは、本規約の一部を構成するものとします。
                    
                    4. 本規約の内容と、前項のルールその他の本規約外における本サービスの説明等とが矛盾・抵触する場合は、当該説明等の規定を優先させる旨の特段の定めがない限り、本規約の規定が優先して適用されるものとします。
                    
                    第3条（本サービスの機能）
                    1. 本サービスには、以下の機能が含まれるものとします。なお、各機能の詳細については、本サービス上の各機能の説明ページの記載に従うものとします。
                    
                    ① サービス・レッスンページ検索機能
                    ② 予約機能
                    ③ ゲストのマイページ作成機能
                    2. 当人は、自らの判断により、本サービスの機能の変更及び追加などを随時実施することができることとします。
                    
                    第4条（本サービスの利用料金）
                    ゲストは本サービスを無料で利用できるものとします。ただし、ゲストがレッスン等を受講する場合、ホストに対する料金の支払いが発生する場合があります。
                    
                    第5条（サービス・レッスンページ等）
                    サービス・レッスンページ上の記載、記録、書き込み等は、全てホストが自己の責任において管理を行っているものであり、当人はホストのサービス・レッスンページ上の内容を確認する義務を負わず、その内容に起因して生じたトラブル（本利用者間又は第三者との間で生じたトラブルを含みます。）について、一切の責任を負いません。
                    
                    第6条（レッスン等の実施契約）
                    1.ゲストは、サービス・レッスンページを通じて、ホストに対してレッスン等の問い合わせや予約等を行うものとします。
                    
                    2.ゲストは、レッスン等の申込み（予約を含みます。）及びレッスン等の受講のために必要な手続きを自らの責任で決定のうえ行うものとし、当人は一切の責任を負わないものとします。
                    
                    3. ゲストは、サービス・レッスンページを通じてレッスン等の予約を行う場合、次の定めに従うものとします。ただし、第3号及び第4号については、サービス・レッスンページに異なる定めがある場合は、当該定めに従うものとします。
                    
                    ① ゲストは予約を行うに際して、必要事項（Twitterニックネーム、メールアドレス、Twitterアカウントへのリンク）を当人及びホストに提出するものとします。
                    ② ゲストは偽名を用いて予約を行ってはならないものとします。
                    4.ゲストは、レッスン等の予約をキャンセルする場合、サービス・レッスンページに記載のキャンセルポリシーに従うものとします。なお、キャンセルの状況及びキャンセルポリシーの内容次第でキャンセル料が発生する場合があります。
                    
                    5.ゲストとホスト間における、レッスン等の実施に関する契約（以下「レッスン等の実施契約」といいます。）はホストとゲストを直接の当事者とする契約であり、当該契約に伴う権利・義務はホストとゲストとの間で発生するものとします。
                    
                    6. 当人は、レッスン等の内容及びレッスン等の実施契約に関連した生じた一切の損害について責任を負いません。
                    
                    7. ホストとゲストとの間で、レッスン等の内容及び実施に関して紛争が生じた場合、又はレッスン等に関して第三者との間で何らかの紛争が生じた場合には、全てゲストの費用と責任において適切に解決するものとします。
                    
                    8. 当人は、ホストとゲストその他の第三者との間の紛争について、ゲストの同意を得ることなく、当該ホスト又は第三者に対し当該紛争に関する情報提供その他の援助を行うことができるものとします。
                    
                    第7条（利用停止等）
                    1.本利用者が、以下の各号の一つに該当する場合、当人は、当該本利用者に対して事前に通知することなく、当該本利用者による本サービスの利用を禁止する等の適切な措置をとることができるものとします。なお、当人は当該措置を行った理由について、当該本利用者に開示する義務を負いません。
                    
                    ① 本規約に違反したとき
                    ② 本利用者が当人のコンピューターに保存されているデータを当人に無断で閲覧、変更若しくは破壊したとき、又はそのおそれがあると当人が判断したとき
                    ③ 本利用者の本サービス利用態様が公序良俗に反し又は本サービスの利用者としてふさわしくないと当人が判断したとき
                    ④ 自ら又は第三者を利用して、次のAないしEのいずれかに該当する行為を行ったとき
                    A) 暴力的な要求行為
                    B) 法的な責任を超えた不当な要求行為
                    C) 取引に関して、脅迫的な言動をし、又は暴力を用いる行為
                    D) 風説を流布し、偽計を用い又は威力を用いて相手方の信用を毀損し、又は相手方の業務を妨害する行為
                    E) その他、AないしDのいずれかに準ずる行為
                    ⑤ その他、当人が当該本利用者に対し本サービスの提供を継続することが不適当であると判断したとき
                    2.前項に定める措置は、当人から当該本利用者に対する損害賠償請求を行うことを妨げるものではありません。また、前項に定める措置を行ったことについて、当人は一切の損害賠償義務を負いません。
                    
                    第8条（サービス提供の一時停止）
                    1.当人は、以下のいずれかに該当する場合には、本利用者に事前に通知することなく、本サービスの全部又は一部の提供を停止又は中断することができるものとします。
                    
                    ① システムの点検又は保守を緊急に行う場合
                    ② コンピューター、通信回線が事故や第三者からの攻撃によって停止した場合
                    ③ 地震、落雷、火災などの不可抗力によって本サービスの運営ができなくなった場合
                    ④ その他、当人が停止又は中断を行う必要があると判断した場合
                    2.当人は、本条に基づき当人が行った措置に基づき本利用者に生じた損害について一切の責任を負いません。
                    
                    第9条（禁止行為）
                    本利用者は、本サービスの利用に当たり、以下の行為を行ってはならないものとします。
                    
                    ① 他人の知的財産権を侵害する行為
                    ② 他人のプライバシーを侵害する行為
                    ③ 他人の名誉・信用等を侵害する行為
                    ④ 公序良俗に反する行為
                    ⑤ 犯罪的行為又は犯罪的行為に結びつく行為（マネーロンダリング行為を含む。）
                    ⑥ 事実に反する情報を提供する行為
                    ⑦ 当人や本サービスの運営を妨げたり、信用を毀損する行為
                    ⑧ 当人の管理するサーバーに対して、コンピュータウィルスなどの有害なプログラムを配信する行為
                    ⑨ 当人の管理するサーバーに対して、コンピュータウィルスなどの有害なプログラムを配信する行為
                    ⑩ 本サービス及び本サービスに関連して使用されている全てのソフトウェア又はプログラム等についてリバースエンジニアリング、逆コンパイル、逆アセンブルその他改変等を行う行為
                    ⑪ 当人の書面による事前の承諾なく、本規約に基づく権利又は義務を第三者に譲渡し、又は担保に供する行為
                    ⑫ 法令に違反する行為又は法令に違反するおそれのある行為
                    ⑬ その他、当人が不適切であると判断する行為
                    2.当人は、本条に基づき当人が行った措置に基づき本利用者に生じた損害について一切の責任を負いません。
                    
                    第10条（情報の取り扱い）
                    1.本利用者は、本サービスに関連して当人が本利用者に対して秘密に取り扱うことを求めて開示した非公知の情報について、当人の事前の書面による承諾がある場合を除いて、第三者に提供、開示又は漏えいをしたり、当人が開示した目的の範囲外での利用を行ったりしてはならないものとします。
                    
                    2.当人は、本利用者が本サービスを通じて当人に提供した全ての個人情報（以下、単に「個人情報」といいます。）を本サービスの「プライバシーポリシー」に基づき、適切に取り扱うものとします。
                    
                    3.当人は本サービス運営事業を他社に譲渡した場合、当該事業譲渡に伴い本規約上の地位、本規約に基づく権利及び義務並びに本利用者の登録情報、個人情報その他の情報を当該事業譲渡の譲受人に譲渡することができるものとし、本利用者は、かかる譲渡につき本項において予め同意したものとします。なお、本項に定める事業譲渡には、通常の事業譲渡のみならず、会社分割その他事業が移転するあらゆる場合を含むものとします。
                    
                    4.当人は、本サービスを通じて得た情報や本利用者から提供又は入力された情報（これらの情報には、個人又は法人を特定する情報を除いたうえでのアンケート情報等を含みます。）を、情報の分析や評価をし、第三者への情報提供等のために利用することがあります。ただし、当人が第三者への情報提供を行う場合、情報については統計処理を行ったものに限ることとし、本利用者の機密情報の侵害行為とならないよう最大限の配慮を行うこととします。
                    
                    第11条（知的財産権）
                    1.本サービス及び本サービスに関する全ての知的財産権は当人又は当人にライセンスを許諾している者に帰属します。この対象には、本サービスの構成、デザイン、イラスト・写真等のグラフィックス、文章及びソースコード等の全てを含みます。
                    
                    2.本利用者は当人の事前の承諾を得た場合を除いて、本サービス及び本サービスに含まれる内容を複製、公開、譲渡、貸与、翻訳、転売、転送、翻訳、使用許諾、再利用等してはならないものとします。
                    
                    3.前二項の定めにかかわらず、ゲストが作成し自身のマイページ上に掲載した著作物についての著作権は、当該ゲストに帰属するものとします。ただし、当該ゲストは、当人が本サービスを運営するうえで必要な範囲で当該著作物を自由に利用することを無償で許諾するものとします。
                    
                    4.本利用者が第1項又は第2項に違反する行為を行った場合、当該本利用者がこれらの行為によって受けた損害に関し、当人は、一切の保証をしないと同時に、当該本利用者がこれらの行為によって得た利益相当額について、損害賠償請求を行う場合があります。
                    
                    第12条（サービスの変更・追加・廃止）
                    1.当人は、理由のいかんを問わず、本利用者に事前に通知することなく、本サービスの内容の全部又は一部を変更又は追加することができるものとします。
                    
                    2.当人は、本利用者に通知の上、本サービスの全部又は一部を中止又は廃止することができるものとします。ただし、本サービスの全部又は一部を中止又は廃止する緊急の必要性がある場合は、事前の通知を行うことなく、中止又は廃止をすることができるものとします。
                    
                    3.当人は、本サービスを中止又は廃止したことにより本利用者又は第三者に生じた損害について、一切責任を負わないものとします。
                    
                    第13条（損害賠償）
                    本利用者は、本利用者が法令又は本規約に違反して本サービスを利用したことに起因して、当人が直接的若しくは間接的に何らかの損害、損失又は費用負担（弁護士費用の負担を含みますが、これに限りません。）を被った場合、当人の請求にしたがって直ちにこれを賠償又は補償しなければならないものとします。
                    
                    第14条（免責事項）
                    1.当人は、本サービス又は本サービスが提携するサービスの提供中止、停止、故障等により、損害が生じたとしても、これについて一切の責任を負わないものとします。
                    
                    2.本利用者は、本サービス又は本サービスが提携するサービスにおいて、下記の事情により一定期間、本サービス又は本サービスが提携するサービスの利用が停止される場合があることを予め承諾し、本サービス又は本サービスが提携するサービスの停止による損害の補償等を当人に請求しないこととします。
                    
                    ① 本サービス又は本サービスが提携するサービスのサーバー、ソフトウェア等の点検、修理、補修等のための停止の場合
                    ② コンピューター、通信回線等の事故による停止の場合
                    ③ その他、やむをえない事情による停止が必要であると当人が判断し、停止を行った場合
                    3.当人はいかなる状況においても、またいかなる方に対しても、以下の各号に定める事項について一切責任を負いません。
                    
                    ① 本サービスを通じて提供される情報の入手、収集、編纂、解釈、分析、編集、翻訳、送付、伝達、配布に関わる誤り（当人の不注意によるか、その他によるかを問いません。）又はその他の状況により（全部、一部を問わず）引き起こされ、発生し、若しくはこれらに起因する損失又は損害
                    ② 本サービスを通じて提供される情報の使用又は使用不可能により発生する、あらゆる種類の直接的、間接的、特別、二次的、又は付随的な損害（このような損害の可能性について当人が事前に通告を受けたかどうかを問いません。）
                    4.本サービスを通じて、本利用者が取得する情報については、その完全性、正確性、確実性、有効性、適法性、安全性、合目的性等につき、全て本利用者の自己の責任と判断のもとで利用するものとし、その内容から発生するあらゆる問題について当人は一切の責任を負いません。
                    
                    5.本サービスからリンクされているサイトの提供する商品、サービス及び全ての情報等の完全性、正確性、確実性、適法性、有効性、安全性、合目的性等、及びその内容から発生するあらゆる問題について当人はいかなる保証もせず、一切の責任を負いません。
                    
                    6.当人は、本サービスを利用して本利用者が行った情報の発信（ホストによるサービス・レッスンページ上の記載及び他の本利用者への連絡等を含みますが、これらに限りません。）、記録、書き込み等について、その内容を確認する義務を負わず、その内容に起因して生じたトラブル（本利用者間又は第三者との間で生じたトラブルを含みます。）について、一切の責任を負いません。
                    
                    7.本サービス又は本サービスが提携するサービスにおいて、本利用者間に生じたトラブル、損害その他の一切の事項に対して、当人はいかなる責任も負わず、補償を行いません。
                    
                    8.ホストがゲストに対して提供する、レッスン等の内容及び実施については全てホストの責任において行うこととし、レッスン等の受講はゲストの責任において行うこととし、これに関して、ホストとゲストとの間に生じたトラブル、損害その他の一切の事項に対して、当人はいかなる責任も負わず、補償を行いません。
                    
                    9.当人は、当人が提供するサービス又は本サービスが提携するサービスの、デザイン等の仕様を予告なく変更することができるものとし、当該変更によって本利用者に生じた損害について一切責任を負わないものとします。
                    
                    10.当人は、本利用者が本サービスを利用したことにより、本利用者又は第三者に損害が生じたとしても、これについて一切の責任を負わないものとします。
                    
                    11.当人は、本利用者が本サービスの利用に伴って負担するあらゆるデータ通信料について一切の責任を負わないものとします。
                    
                    12.本規約に定める免責条項が適用されない等の理由により、当人が本利用者又は第三者に対して責任を負うべき場合、当人に故意又は重過失がある場合を除き、それらの責任に基づく損害賠償額はいかなる場合でも、当該本利用者が当該本サービスの利用に際して当該損害が発生した月に費消した回線費用の額を上限額とすることに、当人及び本利用者は予め合意します。なお、本利用者は、本利用者がこの上限額の定めに同意しない限り当人が本サービスを提供しないことを十分に理解の上で、予め同意し承諾するものとします。
                    
                    第15条（反社会的勢力への不関与）
                    1.本利用者は、自身が暴力団、暴力団員、暴力団関係企業、総会屋、社会運動標ぼうゴロ、政治運動標ぼうゴロ、特殊知能暴力集団、その他反社会的勢力（以下｢暴力団等反社会的勢力｣といいます。）に所属又は該当せず、かつ、暴力団等反社会的勢力と関与していないことを表明し、将来にわたっても所属若しくは該当、又は関与しないことを確約するものとします。
                    
                    2.当人は、本利用者が暴力団等反社会的勢力に所属若しくは該当する、又は正当な理由なく関与していると判断した場合、当該本利用者に事前に通知等を行うことなく、当該本利用者の本サービスの利用を禁止する等の措置を講じることがあります。
                    
                    3.当人は前項の措置による本利用者の損害を賠償する責任を一切負わないものとします。
                    
                    第16条（本規約の基づく地位の譲渡）
                    本利用者は、当人の書面による事前の承諾なく、本規約に基づく権利又は義務につき、第三者に対し、譲渡、移転、担保設定及びその他の処分をすることはできないものとします。
                    
                    第17条（分離可能性）
                    本規約のいずれかの条項又はその一部が、消費者契約法その他の法令等により無効又は執行不能と判断された場合であっても、本規約の残りのその他の条項、及び一部が無効又は執行不能と判断された条項の残りの部分は、継続して完全にその効力を有するものとします。
                    
                    第18条（準拠法、合意管轄）
                    本利用者と当人との間における紛争については、日本国法を適用し、東京地方裁判所を第一審の専属的合意管轄裁判所とします。また、本規約は、日本国法に準拠し、解釈されるものとします。
                    
                    【附則】
                    
                    2017年10月1日　制定・施行
                    
                    ホストに関する利用規約
                    「EEDanceホスト向け利用規約」（以下「本規約」といいます。）は、齊藤大介（以下「当人」といいます。）が運営する、WEBサービス「EEDance」（以下「本WEBサービス」といいます。）を通じて提供する各サービスをホストとしてご利用頂くための利用条件を定めるものです。 
                    本サービスをご利用頂くにあたっては、本規約の全文をお読み頂いたうえで、本規約の全ての条項について承諾頂く必要があります。 
                    本サービスをご利用頂いた場合、利用者の方が本規約の内容を理解しており、かつ、本規約の全ての条項について承諾したものとみなします。
                    
                    第1条（用語の定義）
                    本規約において使用する以下の用語の意味は、以下に定めるとおりとします。
                    
                    ①「本サービス」とは、当人が運営する本WEBサービスを通じて提供する各サービス総称をいい、サービスページ作成サービス等を含みます。
                    ②「本利用者」とは、本サービスを利用する全ての方をいいます。
                    ③「ホスト」とは、本サービスに利用者登録を行ったうえで、ゲストに対してサービスやレッスンなどを提供する方をいいます。
                    ④「ゲスト」とは、ホストの実施するサービスやレッスンなどを受ける方をいいます。
                    ⑤「レッスン等」とは、ホストがゲストに対して実施するサービスやレッスンなどの総称をいいます。
                    ⑥「サービス・レッスンページ」とは、ホストがゲストに対してレッスン等を行うために、自身のレッスン等を紹介し、受講予約を受けつけることができる専用WEBページ　をいいます。
                    第2条（本規約の範囲と変更）
                    1. 本規約は、本利用者と当人との間の本サービスの利用に関わる一切の関係に適用されるものとします。
                    
                    2. 当人は、本利用者の承諾を得ることなく、当人が適当と判断する方法で本利用者に通知することにより、本規約を変更できるものとします。なお、変更の内容を本利用者に個別に通知することはいたしかねますので、本サービスをご利用の際には、随時、最新の本規約をご参照ください。
                    
                    3. 当人が本サービス上で掲載する本サービスの利用に関するルールは、本規約の一部を構成するものとします。
                    
                    4. 本規約の内容と、前項のルールその他の本規約外における本サービスの説明等とが矛盾・抵触する場合は、当該説明等の規定を優先させる旨の特段の定めがない限り、本規約の規定が優先して適用されるものとします。
                    
                    第3条（利用者登録）
                    1. ホストとしての利用を希望する者（以下「ホスト利用希望者」といいます。）は、当人の定める方法によって、登録に必要な情報（氏名及びメールアドレス等）を正確に当人に対して提供するか、自己名義のFacebookアカウント認証又はInstagramアカウント認証を利用したログイン（以下「認証ログイン」といいます。）を行う必要があります。
                    
                    2. ホスト利用希望者は認証ログインを行う場合、Facebookアカウント又はInstagramアカウント上の情報（氏名、メールアドレス、職歴、写真情報を含みます。）を、当人が取得し、本サービスにおいて利用することを予めご了承の上、認証ログインを利用するものとします。
                    
                    3. ホスト利用希望者が次のいずれかに該当する場合、本サービスを利用頂くことはできません。
                    
                    ① 重複して利用者登録を行う場合
                    ② 未成年者又は被後見人等、制限行為能力者である場合
                    ③ 本規約に同意いただけない場合
                    ④ 本規約に違反したことがある場合
                    ⑤ 暴力団等反社会的勢力（第20条にて定義します。）と関係を有し、又は公序良俗に反する事業を自ら行っている場合
                    ⑥ その他、当人が当該利用希望者による本サービスの利用を相当でないと判断した場合
                    4. 本サービスの利用開始後に、前項に定める各号事由のいずれかに該当した方、又は該当することが判明した方については、当人は、当人の判断により、その時点で本サービスの全部若しくは一部の利用を制限することができるものとします。なお、当人はその理由について一切の開示義務を負わないものとします。
                    
                    5. 本サービスの利用は、本条に規定する利用登録を行った者自身（利用登録者が法人である場合、当該法人の従業員が法人の業務として利用する場合を含みます。）で利用をするものとし、当人の許可なく第三者に本サービスを利用させてはならず、複数人での同一アカウントの利用はしてはならないものとします。
                    
                    6. 当人は、本条に基づき当人が行った行為によりホスト利用希望者に生じた損害について、一切の責任を負いません。
                    
                    第4条（登録情報の変更）
                    1. ホストは、当人に届け出ているメールアドレスその他の情報に変更が生じた場合には、速やかに、本サービス内の設定変更画面にて登録内容の変更を行うものとします。登録内容の変更がなされなかったことにより生じた損害については、全て当該ホストが負うものとし、当人は一切の責任を負いません。
                    
                    2. ホストに対する当人からの通知は、通知時において、本サービスに登録されているホストのメールアドレスにメールを送信する方法をもって通知します。
                    
                    3. ホストは、当人からホスト宛に送信される電子メールの受信を拒否する設定等を行ってはならないものとし、受信拒否設定やホストのメールアドレスが変更された等の事情により、当該ホストに配信されたメールがエラー等により不着であった場合でも、当人からの通知の発信時をもって通知がなされたものとみなします。
                    
                    4. 当人は、ホストに配信されたメールがエラー等になった場合、当該メールアドレスへのメールの配信を止めることができるものとします。
                    
                    5. 前二項の場合に、ホストが当人からの通知を受領できなかったことで、ホストに損害が生じたとしても、当人は一切の責任を負いません。
                    
                    第5条（パスワードの管理）
                    1. 当人は、第3条に基づくホスト利用希望者のサービス利用申し込みを承諾した場合、当該ホスト利用希望者をホストとして扱うこととし、本サービスを利用するために必要となるパスワードを発行します。
                    
                    2. ホストが本サービスを利用するにあたっては、登録済みのメールアドレス及びパスワードの入力を必要とします。
                    
                    3. ホストは、本サービスの利用に際して自ら登録したメールアドレス及びパスワードの管理責任を負うものとし、当該ID及びパスワードを第三者に知られるような態様で管理してはならないものとします。この義務を怠ったことにより損害が生じても当人は、一切の責任を負いません。
                    
                    4. 正しいパスワードを用いてなされた本サービスの利用は、全て当該パスワードの発行を受けたホスト本人によりなされたものとみなし、当該パスワードの不正利用により当人又は第三者が損害を被った場合には、当該パスワードを使用した者がホスト本人であるか否かを問わず、当該ホストは当該損害を賠償するものとします。
                    
                    5. ホストは、定期的にパスワードを変更する義務があるものとします。この義務を怠ったことにより損害が生じても当人は、一切の責任を負いません。
                    
                    第6条（本サービスの機能）
                    1. 本サービスには、以下の機能が含まれるものとします。なお、各機能の詳細については、本サービス上の各機能の説明ページの記載に従うものとします。
                    
                    ① サービス・レッスンページ作成機能
                    ② 予約管理機能
                    
                    2. 当人は、自らの判断により、本サービスの機能の変更及び追加などを随時実施することができることとします。
                    
                    第7条（本サービスの利用料金）
                    1. ホストは本サービスを無料で利用できるものとします。ただし、当人は30日前に予め告知を行ったうえで、本サービスを有料サービスに変更できることとする。
                    
                    2. 前項但書に基づき、本サービスが有料サービスに変更される場合、ホストは本サービスの利用を継続するか否かをサービス切り替え7日前までに当人に通知しなければならず、通知を行わなかったホストについては、当人の判断によりいつでも当該ホストのアカウントを停止させ、本サービスの利用を停止又は中止（サービス・レッスンページの利用停止又は中止を含みますが、これらに限りません。）させることができることとする。
                    
                    3. 前項に従って当人が行った措置によってホストに損害が生じても、当人は一切の責任を負わないものとします。
                    
                    第8条（サービス・レッスンページ等）
                    1. ホストは、サービス・レッスンページ及び自身のマイページ上の記載、記録、書き込み等を行うにあたり、全て自己の責任において管理を行うものとし、法令等に抵触する記載、記録、書き込み等を行ってはならないものとします。
                    
                    2. 当人は、ホストが前項の定めに違反していると判断した場合、当人の裁量において当該サービス・レッスンページ及びマイページ上の記載の変更及びページの利用停止等の措置をとることができるものとします。
                    
                    3. 前項の定めにかかわらず、当人はホストのサービス・レッスンページ及びマイページ上の内容を確認する義務を負わず、その内容に起因して生じたトラブル（本利用者間又は第三者との間で生じたトラブルを含みます。）について、一切の責任を負いません。
                    
                    4. 第2項に従って当人が行った措置によってホストに損害が生じても、当人は一切の責任を負わないものとします。
                    
                    第9条（レッスン等の実施契約）
                    1. ホストは、ゲストからサービス・レッスンページを通じて、レッスン等の問い合わせ等があった場合には、当該ゲストとの間で、レッスン等の内容や料金など、取引に必要な情報について自己の責任において誠実に回答しなければなりません。
                    
                    2. ホストは、レッスン等の申込み（予約を含みます。）があった場合には、ゲストとの間で、レッスン等の提供のために必要な手続きを自らの責任で決定のうえ行うものとし、当人は一切の責任を負わないものとします。
                    
                    3. ホストは、ゲストに対し、レッスン等の実施に関する契約（以下「レッスン等の実施契約」といいます。）はホストとゲストを直接の当事者とする契約であり、当該契約に伴う権利・義務はホストとゲストとの間で発生することを明確に表示するものとします。
                    
                    4. ホストは、レッスン等の実施を行うにあたり、特定商取引に関する法律、消費者契約法、不当景品類及び不当表示防止法、個人情報の保護に関する法律、割賦販売法、資金決済に関する法律、犯罪による収益の移転防止に関する法律その他関係法令を遵守しなければならないものとします。
                    
                    5. ホストは、特定商取引に関する法律で要求される事項及び当人が要求する事項を、適切に表示しなければならないものとし、表示内容及び方法について当人からの指示がある場合、当該指示に従って適切に表示しなければならないものとします。
                    
                    第10条（レッスン等の実施）
                    1. ホストは、ゲストとの間でレッスン等の実施契約が成立した場合、当該契約上の義務を自己の費用と責任において適切に履行しなければならず、当該契約成立後に、ホストが本サービスの利用を終了した場合でも、履行義務を免れないものとします。
                    
                    2. ホストは、ゲストとの間で、レッスン等の内容及び実施に関して紛争が生じた場合、又はレッスン等に関して第三者との間で何らかの紛争が生じた場合には、全てホストの費用と責任において適切に解決するものとし、当人がゲストその他の第三者に損害賠償等の支払を余儀なくされた場合には、ホストはその全額を当人に支払うとともに、その解決のために要した弁護士費用その他一切の諸経費を当人に支払わなければならないものとします。
                    
                    3. 当人は、ホストとゲストその他の第三者との間の紛争について、ホストの同意を得ることなく、当該ゲスト又は第三者に対し当該紛争に関する情報提供その他の援助を行うことができるものとします。
                    
                    4. ホストは、サービス・レッスンページの作成及びレッスン等の実施を行うに際し、以下の事項を遵守するものとします。
                    
                    ① ゲストに対するレッスン等の内容説明等を含む広告の表示内容（サービス・レッスンページ上の記載を含むがこれに限りません。）に基づく、瑕疵のないレッスン等の提供を行うこと。
                    ② ゲストに対し、レッスン等の実施契約の成立時期を明確に認識できる措置を講じること。
                    ③ ゲストの身体及び生命に悪影響を与える行為に関するレッスン等の提供を行わないこと。
                    
                    第12条（レッスン等の利用料の決済）
                    1. ホストは、ゲストとの間でレッスン等の実施契約を締結した場合、以下に定めるいずれかの方法によって、レッスン等の利用料の決済を行います。ただし、ホストが前条に定める本決済サービスを利用していない場合においては、第2号に定める方法により決済を行うものとします。
                    
                    ① 現金払い
                    2. ホストは、前項第1号に定める方法によりレッスン等の利用料の決済を行う場合には、ゲストによるレッスン等の申込みと同時に、本決済サービスによる決済を行うものとします。
                    
                    3. 前項の場合、ゲストから支払われたレッスン等の利用料は、ホストが当該ゲストに対してレッスン等を提供したことを当人に報告した日に、次項に定める本決済サービスの利用手数料を控除したうえ、本決済サービス上のホストのアカウントに送金されるものとします。
                    
                    4. 第2項の場合、本決済サービスの利用手数料として、ゲストから受領した利用料の3％相当額をストライプ社が、また、当該利用料の5％相当額を当人が、それぞれ受領するものとします。ただし、ゲストがレッスン等の受講をキャンセルした場合についてはこの限りでなく、この場合における本決済サービスの利用手数料は、次条第2号の定めに従うものとします。
                    
                    5. ホストは、第1項第2号に定める方法によりレッスン等の利用料の決済を行う場合には、レッスン等の受講日に、ゲストから現金にて利用料を受領するものとします。
                    
                    第13条（キャンセル時の取扱い）
                    ホストは、ゲストとの間でレッスン等の実施契約を締結する場合、当該契約の内容として、ゲストがレッスン等の受講のキャンセルを申出た場合における対応及びキャンセル料につき、以下のとおり定めるものとします。
                    
                    1. レッスン等の実施予定時刻まで24時間未満におけるキャンセルの申出 キャンセルは不可とし、ゲストによるレッスン等の受講の有無にかかわらず、レッスン等の利用料を全額請求するものとします。本決済サービスによる決済によりレッスン等の利用料を受領済みの場合は、当該受領済みの利用料を返還しないものとします。
                    
                    2. レッスン等の実施予定時刻まで24時間以前におけるキャンセルの申出 キャンセルを受け付けるものとしたうえ、利用料の決済方法に応じ、以下のとおり、キャンセル料を定めます。
                                        
                    ① 現金払い
                    キャンセル料は無料とします。
                    
                    第14条（利用停止等）
                    1. 本利用者が、以下の各号の一つに該当する場合、当人は、当該本利用者に対して事前に通知することなく、当該本利用者による本サービスの利用を禁止する等の適切な措置をとることができるものとします。なお、当人は当該措置を行った理由について、当該本利用者に開示する義務を負いません。
                    
                    ① 本規約に違反したとき
                    ② 本利用者が当人のコンピューターに保存されているデータを当人に無断で閲覧、変更若しくは破壊したとき、又はそのおそれがあると当人が判断したとき
                    ③ 本利用者の本サービス利用態様が公序良俗に反し又は本サービスの利用者としてふさわしくないと当人が判断したとき
                    ④ 自ら又は第三者を利用して、次のAないしEのいずれかに該当する行為を行ったとき
                    A) 暴力的な要求行為
                    B) 法的な責任を超えた不当な要求行為
                    C) 取引に関して、脅迫的な言動をし、又は暴力を用いる行為
                    D) 風説を流布し、偽計を用い又は威力を用いて相手方の信用を毀損し、又は相手方の業務を妨害する行為
                    E) その他、AないしDのいずれかに準ずる行為
                    ⑤ その他、当人が当該本利用者に対し本サービスの提供を継続することが不適当であると判断したとき
                    2. 前項に定める措置は、当人から当該本利用者に対する損害賠償請求を行うことを妨げるものではありません。また、前項に定める措置を行ったことについて、当人は一切の損害賠償義務を負いません。
                    
                    第15条（サービス提供の一時停止）
                    1. 当人は、以下のいずれかに該当する場合には、本利用者に事前に通知することなく、本サービスの全部又は一部の提供を停止又は中断することができるものとします。
                    
                    ① システムの点検又は保守を緊急に行う場合
                    ② コンピューター、通信回線が事故や第三者からの攻撃によって停止した場合
                    ③ 地震、落雷、火災などの不可抗力によって本サービスの運営ができなくなった場合
                    ④ その他、当人が停止又は中断を行う必要があると判断した場合
                    2. 当人は、本条に基づき当人が行った措置に基づき本利用者に生じた損害について一切の責任を負いません。
                    
                    第16条（禁止行為）
                    本利用者は、本サービスの利用に当たり、以下の行為を行ってはならないものとします。
                    
                    ① 本規約に違反する行為
                    ② 他人の知的財産権を侵害する行為
                    ③ 他人のプライバシーを侵害する行為
                    ④ 他人の名誉・信用等を侵害する行為
                    ⑤ 公序良俗に反する行為
                    ⑥ 犯罪的行為又は犯罪的行為に結びつく行為（マネーロンダリング行為を含む。
                    ）
                    ⑦ 事実に反する情報を提供する行為
                    ⑧ 当人や本サービスの運営を妨げたり、信用を毀損する行為
                    ⑨ 当人の管理するサーバーに対して、コンピュータウィルスなどの有害なプログラムを配信する行為
                    ⑩ 本サービス及び本サービスに関連して使用されている全てのソフトウェア又はプログラム等についてリバースエンジニアリング、逆コンパイル、逆アセンブルその他改変等を行う行為
                    ⑪ 当人の書面による事前の承諾なく、本規約に基づく権利又は義務を第三者に譲渡し、又は担保に供する行為
                    ⑫ 法令に違反する行為又は法令に違反するおそれのある行為
                    ⑬ その他、当人が不適切であると判断する行為
                    第17条（情報の取り扱い）
                    1. 本利用者は、本サービスに関連して当人が本利用者に対して秘密に取り扱うことを求めて開示した非公知の情報について、当人の事前の書面による承諾がある場合を除いて、第三者に提供、開示又は漏えいをしたり、当人が開示した目的の範囲外での利用を行ったりしてはならないものとします。
                    
                    2. 当人は、本利用者が本サービスを通じて当人に提供した全ての個人情報（以下、単に「個人情報」といいます。）を本サービスの「プライバシーポリシー」に基づき、適切に取り扱うものとします。
                    
                    3. 当人は本サービス運営事業を他社に譲渡した場合、当該事業譲渡に伴い本規約上の地位、本規約に基づく権利及び義務並びに本利用者の登録情報、個人情報その他の情報を当該事業譲渡の譲受人に譲渡することができるものとし、本利用者は、かかる譲渡につき本項において予め同意したものとします。なお、本項に定める事業譲渡には、通常の事業譲渡のみならず、会社分割その他事業が移転するあらゆる場合を含むものとします。
                    
                    4. 当人は、本サービスを通じて得た情報や本利用者から提供又は入力された情報（これらの情報には、個人又は法人を特定する情報を除いたうえでのアンケート情報等を含みます。）を、情報の分析や評価をし、第三者への情報提供等のために利用することがあります。ただし、当人が第三者への情報提供を行う場合、情報については統計処理を行ったものに限ることとし、本利用者の機密情報の侵害行為とならないよう最大限の配慮を行うこととします。
                    
                    第18条（知的財産権）
                    1. 本サービス及び本サービスに関する全ての知的財産権は当人又は当人にライセンスを許諾している者に帰属します。この対象には、本サービスの構成、デザイン、イラスト・写真等のグラフィックス、文章及びソースコード等の全てを含みます。
                    
                    2. 本利用者は当人の事前の承諾を得た場合を除いて、本サービス及び本サービスに含まれる内容を複製、公開、譲渡、貸与、翻訳、転売、転送、翻訳、使用許諾、再利用等してはならないものとします。
                    
                    3. 前二項の定めにかかわらず、本利用者自身が作成し自身のサービス・レッスンページ上に掲載した著作物についての著作権は、当該本利用者に帰属するものとします。ただし、当該本利用者は、当人が本サービスを運営するうえで必要な範囲で当該著作物を自由に利用することを無償で許諾するものとします。
                    
                    4. 本利用者が第1項又は第2項に違反する行為を行った場合、当該本利用者がこれらの行為によって受けた損害に関し、当人は、一切の保証をしないと同時に、当該本利用者がこれらの行為によって得た利益相当額について、損害賠償請求を行う場合があります。
                    
                    第19条（サービスの変更・追加・廃止）
                    1. 当人は、理由のいかんを問わず、本利用者に事前に通知することなく、本サービスの内容の全部又は一部を変更又は追加することができるものとします。
                    
                    2. 当人は、本利用者に通知の上、本サービスの全部又は一部を中止又は廃止することができるものとします。ただし、本サービスの全部又は一部を中止又は廃止する緊急の必要性がある場合は、事前の通知を行うことなく、中止又は廃止をすることができるものとします。
                    
                    3. 当人は、本サービスを中止又は廃止したことにより本利用者又は第三者に生じた損害について、一切責任を負わないものとします。
                    
                    第20条（利用終了手続）
                    1. ホストは、本サービス利用終了希望日の1か月前までに、本サービス上のフォームにて本サービスの利用の終了及びアカウント情報の削除手続きを行うことで、本サービスの利用を終了することができます。
                    
                    2. 前項の定めに従いホストが本サービスの利用終了した場合、当人は当該ホストが本サービス上で保有していた情報・成果物（サービス・レッスンページを含むがこれに限りません。）を当人の裁量において削除することができ、これによって本利用者に生じた損害について当人は一切の責任を負わないものとします。
                    
                    3. 第1項の定めにかかわらず、ホストが本サービスの利用を終了した場合であっても、本規約は有効に存続し、適用されるものとします
                    
                    第21条（損害賠償）
                    1. 当人は、本サービス又は本サービスが提携するサービスの提供中止、停止、故障等により、損害が生じたとしても、これについて一切の責任を負わないものとします。
                    
                    2. 本利用者は、本サービス又は本サービスが提携するサービスにおいて、下記の事情により一定期間、本サービス又は本サービスが提携するサービスの利用が停止される場合があることを予め承諾し、本サービス又は本サービスが提携するサービスの停止による損害の補償等を当人に請求しないこととします。
                    
                    ① 本サービス又は本サービスが提携するサービスのサーバー、ソフトウェア等の点検、修理、補修等のための停止の場合
                    ② コンピューター、通信回線等の事故による停止の場合
                    ③ その他、やむをえない事情による停止が必要であると当人が判断し、停止を行った場合
                    3. 当人はいかなる状況においても、またいかなる方に対しても、以下の各号に定める事項について一切責任を負いません。
                    
                    ① 本サービスを通じて提供される情報の入手、収集、編纂、解釈、分析、編集、翻訳、送付、伝達、配布に関わる誤り（当人の不注意によるか、その他によるかを問いません。）又はその他の状況により（全部、一部を問わず）引き起こされ、発生し、若しくはこれらに起因する損失又は損害
                    ② 本サービスを通じて提供される情報の使用又は使用不可能により発生する、あらゆる種類の直接的、間接的、特別、二次的、又は付随的な損害（このような損害の可能性について当人が事前に通告を受けたかどうかを問いません。）
                    4. 本サービスを通じて、本利用者が取得する情報については、その完全性、正確性、確実性、有効性、安全性、合目的性等につき、全て本利用者の自己の責任と判断のもとで利用するものとし、その内容から発生するあらゆる問題について当人は一切の責任を負いません。
                    
                    5. 本サービスからリンクされているサイトの提供する商品、サービス及び全ての情報等の完全性、正確性、確実性、適法性、有効性、安全性、合目的性等、及びその内容から発生するあらゆる問題について当人はいかなる保証もせず、一切の責任を負いません。
                    
                    6. 当人は、本サービスを利用して本利用者が行った情報の発信（ホストによるサービス・レッスンページ上の記載及び他の本利用者への連絡等を含みますが、これらに限りません。）、記録、書き込み等について、その内容を確認する義務を負わず、その内容に起因して生じたトラブル（本利用者間又は第三者との間で生じたトラブルを含みます。）について、一切の責任を負いません。
                    
                    7. 本サービス又は本サービスが提携するサービスにおいて、本利用者間に生じたトラブル、損害その他の一切の事項に対して、当人はいかなる責任も負わず、補償を行いません。
                    
                    8. ホストがゲストに対して提供する、レッスン等の内容及び実施については全てホストの責任において行うこととし、これに関して、ホストとゲストとの間に生じたトラブル、損害その他の一切の事項に対して、当人はいかなる責任も負わず、補償を行いません。
                    
                    9. 当人は、当人が提供するサービス又は本サービスが提携するサービスの、デザイン等の仕様を予告なく変更することができるものとし、当該変更によって本利用者に生じた損害について一切責任を負わないものとします。
                    
                    10. 当人は、本利用者が本サービスを利用したことにより、本利用者又は第三者に損害が生じたとしても、これについて一切の責任を負わないものとします。
                    
                    11. 当人は、本利用者が本サービスの利用に伴って負担するあらゆるデータ通信料について一切の責任を負わないものとします。
                    
                    12. 本規約に定める免責条項が適用されない等の理由により、当人が本利用者又は第三者に対して責任を負うべき場合、当人に故意又は重過失がある場合を除き、それらの責任に基づく損害賠償額はいかなる場合でも当該本利用者が当該損害が発生した日から過去6か月間に、当該本サービスの利用料として当人に対して現実に支払いを行った金額の合計額（第7条に定める利用料金が無償の期間は、当該本利用者が当該本サービスの利用に際して当該損害が発生した月に費消した回線費用の額）を上限額とすることに、当人及び本利用者は予め合意します。なお、本利用者は、本利用者がこの上限額の定めに同意しない限り当人が本サービスを提供しないことを十分に理解の上で、予め同意し承諾するものとします。
                    
                    第22条（免責事項）
                    本利用者は、本利用者が法令又は本規約に違反して本サービスを利用したことに起因して、当人が直接的若しくは間接的に何らかの損害、損失又は費用負担（弁護士費用の負担を含みますが、これに限りません。）を被った場合、当人の請求にしたがって直ちにこれを賠償又は補償しなければならないものとします。
                    
                    第23条（反社会的勢力への不関与）
                    1. 本利用者は、自身が暴力団、暴力団員、暴力団関係企業、総会屋、社会運動標ぼうゴロ、政治運動標ぼうゴロ、特殊知能暴力集団、その他反社会的勢力（以下｢暴力団等反社会的勢力｣といいます。）に所属又は該当せず、かつ、暴力団等反社会的勢力と関与していないことを表明し、将来にわたっても所属若しくは該当、又は関与しないことを確約するものとします。
                    
                    2. 当人は、本利用者が暴力団等反社会的勢力に所属若しくは該当する、又は正当な理由なく関与していると判断した場合、当該本利用者に事前に通知等を行うことなく、当該本利用者の本サービスの利用を禁止する等の措置を講じることがあります。
                    
                    3. 当人は前項の措置による本利用者の損害を賠償する責任を一切負わないものとします。
                    
                    第24条（本規約の基づく地位の譲渡）
                    本利用者は、当人の書面による事前の承諾なく、本規約に基づく権利又は義務につき、第三者に対し、譲渡、移転、担保設定及びその他の処分をすることはできないものとします。
                    
                    第25条（分離可能性）
                    本規約のいずれかの条項又はその一部が、消費者契約法その他の法令等により無効又は執行不能と判断された場合であっても、本規約の残りのその他の条項、及び一部が無効又は執行不能と判断された条項の残りの部分は、継続して完全にその効力を有するものとします。
                    
                    第26条（準拠法、合意管轄）
                    本利用者と当人との間における紛争については、日本国法を適用し、東京地方裁判所を第一審の専属的合意管轄裁判所とします。また、本規約は、日本国法に準拠し、解釈されるものとします。
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
