<?php
session_start();
if (!isset($_SESSION['form_step']) || $_SESSION['form_step'] !== 'confirm') {
    header('Location: contact.php');
    exit();
}
?>
                          
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
    <header class="sabu">
        <nav class="cafe_menu">
            <div class="logo">
                <a>
                    <img src="cafe/img/logo.png" alt="cafe">
                </a>
            </div>
            <div class="top_menu">
                <div class="menu_first">
                    <a href="index.php#box">はじめに</a>
                </div>
                <div class="menu_first">
                    <a href="index.php#cafe">体験</a>
                </div>
                <div class="inquiry">
                    <a href="contact.php">お問い合わせ</a>
                </div>
            </div>
            <div class="sign"><!--サインイン-->
                <div class="singnin" id="signinButton"><a>サインイン</a></div>

                <div class="side signclick">
                    <img src="cafe/img/menu.png" alt="メニュー">
                </div>
                <div class="side sideMenu">
                    <div class="side first" id="signinbutton">サインイン</div>
                    <div class="side side_first">
                        <a href="index.php#box">はじめに</a>
                    </div>
                    <div class="side side_first">
                        <a href="index.php#cafe">体験</a>
                    </div>
                    <div class="side_first">
                        <a href="contact.php">お問い合わせ</a>
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
            <div class="inquiry_box">
                <h2>お問い合わせ</h2>
                <form action="complete.php" method="post">
                    <p>下記の内容をご確認の上送信ボタンを押してください</p>
                    <p>内容を訂正する場合は戻るを押してください。</p>
                    <dl class="answer">
                        <dt>氏名</dt>
                        <dd>
                            <?php
                            if (isset($_SESSION['name'])) {
                                $name = $_SESSION['name'];
                                echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
                            } elseif (empty($name)) {
                                        echo "氏名が入力されていません。";
                            }
                            ?>
                        </dd>
                        <dt>フリガナ</dt>
                        <dd>
                        <?php
                            if (isset($_SESSION['kana'])) {
                                $kana = $_SESSION['kana'];
                                echo htmlspecialchars($kana, ENT_QUOTES, 'UTF-8');
                            } elseif (empty($kana)) {
                                echo "氏名が入力されていません。";
                            }
                        ?>
                        </dd>
                        <dt>電話番号</dt>
                        <dd>
                        <?php
                            if (isset($_SESSION['tel'])) {
                                $tel = $_SESSION['tel'];
                                echo htmlspecialchars($tel, ENT_QUOTES, 'UTF-8');
                            } elseif (empty($tel)) {
                                echo "氏名が入力されていません。";
                            }
                        ?>
                        </dd>
                        <dt>メールアドレス</dt>
                        <dd>
                        <?php
                             if (isset($_SESSION['email'])) {
                                $email = $_SESSION['email'];
                                echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
                            } elseif (empty($email)) {
                                echo "氏名が入力されていません。";
                            }
                        ?>
                        </dd>
                        <dt>お問い合わせ内容</dt>
                        <div class="display-text">
                        <pre><?php
                                $body = isset($_SESSION['body']) ? trim($_SESSION['body']) : '';
                                echo htmlspecialchars($body, ENT_QUOTES, 'UTF-8');
                                if (empty($body)) {
                                    echo "氏名が入力されていません。";
                                }
                                ?>
                        </pre>

                        </div>
                        <dd class="next">
                            <button type="submit">送信</button>
                            <a href="#" onclick="history.back(); return false;">戻る</a>
                        </dd>
                    </dl>
                </form>
            </div>
    </section>

    <footer>
        <div class="out">
            <div class="Company_nav">
                <a href="contact.html"></a>
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
</body>
</html>