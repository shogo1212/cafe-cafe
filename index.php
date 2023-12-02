<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>cafe-cafe</title>
<link rel="stylesheet" type="text/css" href="styles.css">
<link rel="stylesheet" href="style.css">
<script src="script.js" type="module"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="corona">
        <a href="#">新型コロナウイルスに対する取り組みの最新情報をご案内</a>
    </div>
    <header>
        <h1 class="concept">
            あなたの
            <br>
            好きな空間を作る。
        </h1>
        <nav class="">
            <div class="logo">
                <a>
                    <img src="cafe/img/logo.png" alt="cafe">
                </a>
            </div>
            <div class="top_menu">
                <div class="menu _first">
                    <a href="#box">はじめに</a>
                </div>
                <div class="menu _first">
                    <a href="#cafe">体験</a>
                </div>
                <div class="inquiry">
                    <a href="contact.php" id="contactLink">お問い合わせ</a>
                </div>
            </div>
            <div class="sign"><!--サインイン-->
                <div class="singnin" id="signinButton"><a>サインイン</a></div>

                <div class="side signclick">
                    <img src="cafe/img/menu.png" alt="メニュー">
                </div>
                <div class="sideMenu">
                    <div class="first" id="signinbutton">サインイン</div>
                    <div class="menu side_first">
                        <a href="#box">はじめに</a>
                    </div>
                    <div class="menu side_first">
                        <a href="#cafe">体験</a>
                    </div>
                    <div class="side_first">
                        <a href="contact.php" id="contactLink">お問い合わせ</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

        <div id="loginModal" class="modal">
            <div class="login" id="login">
                <h2>ログイン</h2>
                <form method="post" action>
                    <dl>
                        <dd><input type="email" name="user-email" placeholder="メールアドレス"></dd>
                        <dd><input type="password" name="pass" placeholder="パスワード"></dd>
                        <dd><button type="submit">送信</button></dd>
                    </dl>
                    <dl class="sns">
                        <dd>
                            <button name="twitter">
                                <img src="./cafe/img/twitter.png">
                            </button>
                        </dd>
                        <dd>
                        <button name="facebook">
                                <img src="./cafe/img/fb.png">
                            </button>
                        </dd>
                        <dd>
                        <button name="google">
                                <img src="./cafe/img/google.png">
                            </button>
                        </dd>
                        <dd>
                        <button name="apple">
                                <img src="./cafe/img/apple.png">
                            </button>
                        </dd>
                    </dl>
                </form>
            </div>
        </div>
    <section>
        <div class="guide" id="box"><!--ガイド-->
            <div class="box">
                <div class="box_nav">
                    <div class="photograph">
                        <img src="./cafe/img/cafe1.jpg" alt="東京">
                    </div>
                    <div class="city-guide">
                        <p class="city">東京</p>
                        <p class="move">車で15分</p>
                    </div>
                </div>
            </div>
            <div class="box">
            <div class="box_nav">
                    <div class="photograph">
                        <img src="./cafe/img/cafe2.jpg" alt="神奈川">
                    </div>
                    <div class="city-guide">
                        <p class="city">神奈川</p>
                        <p class="move">車で30分</p>
                    </div>
                </div>
            </div>
            <div class="box">
            <div class="box_nav">
                    <div class="photograph">
                        <img src="./cafe/img/cafe3.jpg" alt="愛知">
                    </div>
                    <div class="city-guide">
                        <p class="city">愛知</p>
                        <p class="move">車で1時間</p>
                    </div>
                </div>
            </div>
            <div class="box">
            <div class="box_nav">
                    <div class="photograph">
                        <img src="./cafe/img/cafe4.jpg" alt="京都">
                    </div>
                    <div class="city-guide">
                        <p class="city">京都</p>
                        <p class="move">車で40分</p>
                    </div>
                </div>
            </div>
            <div class="box">
            <div class="box_nav">
                    <div class="photograph">
                        <img src="./cafe/img/cafe5.jpg" alt="岡山">
                    </div>
                    <div class="city-guide">
                        <p class="city">岡山</p>
                        <p class="move">車で1.5時間</p>
                    </div>
                </div>
            </div>
            <div class="box">
            <div class="box_nav">
                    <div class="photograph">
                        <img src="./cafe/img/cafe6.jpg" alt="鹿児島">
                    </div>
                    <div class="city-guide">
                        <p class="city">鹿児島</p>
                        <p class="move">車で50分</p>
                    </div>
                </div>
            </div>
            <div class="box">
            <div class="box_nav">
                    <div class="photograph">
                        <img src="./cafe/img/cafe7.jpg" alt="沖縄">
                    </div>
                    <div class="city-guide">
                        <p class="city">沖縄</p>
                        <p class="move">車で2時間</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section class="choose">
            <h2>好きなロケーションを選ぼう</h2>
            <div class="outside"><!--外-->
                <div class="box" id="box">
                    <div class="box_nav">
                        <div class="photograph">
                            <img src="./cafe/img/intro1.jpg" alt="クラシック">
                        </div>
                        <div class="text">クラシック</div>
                    </div>
                </div>
                <div class="box">
                    <div class="box_nav">
                        <div class="photograph">
                            <img src="./cafe/img/intro2.jpg" alt="バー">
                        </div>
                        <div class="text">バー</div>
                    </div>
                </div>
                <div class="box">
                    <div class="box_nav">
                        <div class="photograph">
                            <img src="./cafe/img/intro3.jpg" alt="キャンプ">
                        </div>
                        <div class="text">キャンプ</div>
                    </div>
                </div>
                <div class="box">
                    <div class="box_nav">
                        <div class="photograph">
                            <img src="./cafe/img/intro4.jpg" alt="リゾート"  id="up">
                        </div>
                        <div class="text">リゾート</div>
                    </div>
                </div>
            </div>
            <div class="goto">
                <div class="goto_title">
                    <h3>Go To Eats</h3>
                    <p>
                        キャンペーンを利用して、全国を食事しよう。
                        <br>
                        いつもと違う背景に囲まれてカラダもココロもリフレッシュ。
                    </p>
                </div>
                <img src="./cafe/img/goto.jpg" alt="cafe">
            </div>
        </section>
        <section class="experience" id="cafe">
            <h2>カフェ作りを体験しよう</h2>
            <p>お店のエキスパートが案内するユニークな体験(直接対面型またはオンライン)。</p>
            <div class="cafe_experience">
                <div class="box">
                    <div class="box_nav">
                        <div class="photograph">
                            <img src="./cafe/img/exp1.jpg" alt="ジョブ体験">
                        </div>
                        <div class="text">ジョブ体験</div>
                        <p>カフェカウンターを体験しよう。</p>
                    </div>
                </div>
                <div class="box">
                    <div class="box_nav">
                        <div class="photograph">
                            <img src="./cafe/img/exp2.jpg" alt="レシピ体験">
                        </div>
                        <div class="text">レシピ体験</div>
                        <p>美味しいレシピを考えてみよう。</p>
                    </div>
                </div>
                <div class="box">
                    <div class="box_nav">
                        <div class="photograph">
                            <img src="./cafe/img/exp3.jpg" alt="プロモーション体験">
                        </div>
                        <div class="text">プロモーション体験</div>
                        <p>お店の宣伝を手伝ってみよう。</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="host">
            <h2>全国のホストに仲間入りしよう</h2>
            <div class="cafe_host">
                <div class="box">
                    <div class="box_nav">
                        <div class="photograph">
                            <img src="./cafe/img/host1.jpg" alt="ビジネス">
                        </div>
                        <div class="text">ビジネス</div>
                    </div>
                </div>
                <div class="box">
                    <div class="box_nav">
                        <div class="photograph">
                            <img src="./cafe/img/host2.jpg" alt="コミュニティ">
                        </div>
                        <div class="text">コミュニティ</div>
                    </div>
                </div>
                <div class="box">
                    <div class="box_nav">
                        <div class="photograph">
                            <img src="./cafe/img/host3.jpg" alt="食べ歩き">
                        </div>
                        <div class="text">食べ歩き</div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="out">
            <div class="Company_nav">
                <div class="list">
                    <h2>企業情報</h2>
                    <ul>
                        <li>
                            <a href="">利用方法</a>
                        </li>
                        <li>
                            <a href="">ニュースルーム</a>
                        </li>
                        <li>
                            <a href="">株主・投資家のみなさまへ</a>
                        </li>
                        <li>
                            <a href="">XXXXXXXXXXXXXXX</a>
                        </li>
                        <li>
                            <a href="">XXXXXXXXXXXXXXX</a>
                        </li>
                        <li>
                            <a href="">XXXXXXXXXXXXXXX</a>
                        </li>
                        <li>
                            <a href="">採用情報</a>
                        </li>
                    </ul>
                </div>
                <div class="list">
                <h2>コミュニティ</h2>
                    <ul>
                        <li>
                            <a href="">ダイバーシティ</a>
                        </li>
                        <li>
                            <a href="">アクセシビリティ対応</a>
                        </li>
                        <li>
                            <a href="">お友達を招待</a>
                        </li>
                        <li>
                            <a href="">XXXXXXXXXXXXXXX</a>
                        </li>
                        <li>
                            <a href="">XXXXXXXXXXXXXXX</a>
                        </li>
                    </ul>
                </div>
                <div class="list">
                    <h2>ホスト</h2>
                    <ul>
                        <li>
                            <a href="">XXXXXXXXXXXXXXX</a>
                        </li>
                        <li>
                            <a href="">XXXXXXXXXXXXXXX</a>
                        </li>
                        <li>
                            <a href="">XXXXXXXXXXXXXXX</a>
                        </li>
                    </ul></div>
                <div class="list">
                <h2>サポオート</h2>
                    <ul>
                        <li>
                            <a href="">新型コロナウイルスに対する取り組み</a>
                        </li>
                        <li>
                            <a href="">ヘルプセンター</a>
                        </li>
                        <li>
                            <a href="">キャンセルオプション</a>
                        </li>
                        <li>
                            <a href="">コミュニティサポート</a>
                        </li>
                        <li>
                            <a href="">信頼＆安全</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="supplement">
                <p>このサイトの素材は全て著作権フリーのものを使用しています。</p>
                <div class="menu">
                    <span class="click">プライバシーポリシー</span>
                    <span class="click">利用規約</span>
                    <span class="click">サイトマップ</span>
                    <span class="click">企業情報</span>
                </div>
                <p>© 2021- LiNew, Inc. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <div class="" id="yourElementId" style="opacity: 0;" >Jump To Top</div>
</body>
</html>