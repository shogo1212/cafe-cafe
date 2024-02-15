<?php
session_start();

if (!isset($_SESSION['formData'])) {
    // フォームデータが存在しない場合は、contact.php へリダイレクト
    header("Location: contact.php");
    exit();
}

require 'dbconnect.php'; // データベース接続

$formData = $_SESSION['formData'];

// データ挿入のSQL文を準備
$sql = "INSERT INTO contacts (name, kana, tel, email, body) VALUES (:name, :kana, :tel, :email, :body)";
$stmt = $pdo->prepare($sql);

// パラメータをバインドし、SQL文を実行
$stmt->execute([
    ':name' => $formData['name'],
    ':kana' => $formData['kana'],
    ':tel' => $formData['tel'],
    ':email' => $formData['email'],
    ':body' => $formData['body'],
]);

unset($stmt);

// 全てのセッション変数をクリアし、セッションを破棄
session_unset();
session_destroy();

?>
    
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>cafe-cafe</title>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/script.js" type="module"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <header class="sabu">
        <nav class="cafe_menu">
            <div class="logo">
                <a href="index.php">
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
            <div class="last_page">
                <p>お問い合わせ頂きありがとうございます。</p>
                <p>送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。</p>
                <p>なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</p>
                <a href="index.php">トップへ戻る</a>
            </div>
            <form action="confirm.php" method="post">
                <form action=""></form>
        </div>
    </section>
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
</body>
</html>