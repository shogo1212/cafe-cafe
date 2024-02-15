<?php
session_start();

// リファラURLを取得
$referrer = $_SERVER['HTTP_REFERER'] ?? '';

// リファラURLに基づいて条件をチェック
if (!str_contains($referrer, 'contact.php')) {
    // リダイレクト
    header('Location: contact.php');
    exit();
}

require 'dbconnect.php';

    //データベースから該当するレコードを取得
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM contacts WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT); 
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
}

// 全ての処理が終わった後でデータベース接続を閉じる
$pdo = null;


// エラーメッセージ用の変数を初期化
$errorMessages = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && (!isset($_POST['action']) || $_POST['action'] != 'delete')) {
$_SESSION['formData'] = $_POST;
// 'name'フィールドからデータを取得
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$kana = isset($_POST['kana']) ? trim($_POST['kana']) : '';
$tel = isset($_POST['tel']) ? trim($_POST['tel']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$body = isset($_POST['body']) ? trim($_POST['body']) : '';

//氏名チェック
if (empty($name) || mb_strlen($name) > 10) {
    $errorMessages['name'] = '氏名は必須入力です。名前は10文字以内で入力してください。';
} 
//フリガナチェック
if (empty($kana) || mb_strlen($kana) > 10) {
    $errorMessages['kana'] = 'フリガナは必須入力です。フリガナは10文字以内で入力してください。';
} 
//電話番号チェック
if (empty($tel) || !preg_match('/^[0-9]+$/', $tel)) {
    $errorMessages['tel'] = '電話番号は0-9の数字のみで入力してください。';
} 
// メールアドレスチェック
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errorMessages['email'] = 'メールアドレスは正しく入力してください。';
} 
if (empty($body)) {
    $errorMessages['body'] = 'お問い合わせ内容は必須入力です。';
} 


// エラーがなければ次の処理へ進む
if (empty($errorMessages)) {
$_SESSION['name'] = $name;
$_SESSION['kana'] = $kana;
$_SESSION['tel'] = $tel;
$_SESSION['email'] = $email;
$_SESSION['body'] = $body;
$_SESSION['form_step'] = 'confirm';
    // 次のページへリダイレクトする
header('Location: confirm.php');
exit();
}
}
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
<style>
        /* エラーメッセージを赤文字で表示するスタイル */
        .error {
            color: red;
        }
    </style>
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
                <form method="post" action="" id="contactForm">
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
            <form method="post" action="update.php" id="contact">
                <h3>下記の項目をご記入の上送信ボタンを押してください</h3>
                <p>編集が必要な部分のみ編集してください。</p>
                <p>
                    <span class="required">*</span>
                    は必須項目となります。
                </p>
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($result['id']); ?>">
                <dl>
                    <dt>
                        <label for="name">氏名</label>
                        <span class="required">*</span>
                    </dt>
                    <dt>
                        <!-- エラーメッセージを表示 -->
                        <?php if (!empty($errorMessages["name"])): ?>
                            <div class="error"><?php echo $errorMessages["name"]; ?></div>
                        <?php endif; ?>    
                    </dt>
                    <dd>
                        <input type="text" name="name" id="name" placeholder="山田太郎" value="<?php echo htmlspecialchars($result['name']); ?>">
                    </dd>
                    <dt>
                        <label for="kana">フリガナ</label>
                        <span class="required">*</span>
                    </dt>
                    <dt>
                        <!-- エラーメッセージを表示 -->
                        <?php if (!empty($errorMessages["kana"])): ?>
                            <div class="error"><?php echo $errorMessages["kana"]; ?></div>
                        <?php endif; ?>    
                    </dt>
                    <dd>
                        <input type="text" name="kana" id="kana" placeholder="ヤマダタロウ" value="<?php echo htmlspecialchars($result['kana']); ?>">
                    </dd>
                    <dt>
                        <label for="tel">電話番号</label>
                    </dt>
                    <dt>
                        <!-- エラーメッセージを表示 -->
                        <?php if (!empty($errorMessages["tel"])): ?>
                            <div class="error"><?php echo $errorMessages["tel"]; ?></div>
                        <?php endif; ?>    
                    </dt>
                    <dd>
                        <input type="text" name="tel" id="tel" placeholder="09012345678" value="<?php echo htmlspecialchars($result['tel']); ?>">
                    </dd>
                    <dt>
                        <label for="email">メールアドレス</label>
                        <span class="required">*</span>
                    </dt>
                    <dt>
                        <!-- エラーメッセージを表示 -->
                        <?php if (!empty($errorMessages["email"])): ?>
                            <div class="error"><?php echo $errorMessages["email"]; ?></div>
                        <?php endif; ?>    
                    </dt>
                    <dd>
                        <input type="text" name="email" id="email" placeholder="test@test.co.jp" value="<?php echo htmlspecialchars($result['email']); ?>">
                    </dd>
                </dl>
                <h3>
                    <label for="body">
                        お問い合わせ内容をご記入ください
                        <span class="required">*</span>
                    </label>
                </h3>
                <?php if (!empty($errorMessages["body"])): ?>
                       <div class="error"><?php echo $errorMessages["body"]; ?></div>
                <?php endif; ?>
                <dl>
                <dd>
                    <textarea name="body" id="body"><?php echo htmlspecialchars($result['body']); ?></textarea>
                </dd>

                <div class="next">
                    <div class="front">
                        <form action="complete.php" method="post" class="next">
                                    <input type="submit" name="front" value="送信">
                        </form>
            <script>
                document.getElementById('contact').addEventListener('submit', function(event) {
                    let name = document.getElementById('name').value;
                    let kana = document.getElementById('kana').value;
                    let tel = document.getElementById('tel').value;
                    let email = document.getElementById('email').value;
                    let body = document.getElementById('body').value;
                    
                    if (name === "" || kana === "" || tel === "" || email === "" || body === "") {
                        event.preventDefault(); // フォームの送信を阻止
                        alert('氏名は必須入力です。10文字以内でご入力ください。\nフリガナは必須入力です。10文字以内でご入力ください。\n電話番号は0-9の数字のみでご入力ください。\nメールアドレスは正しくご入力ください。\nお問い合わせ内容は必須入力です。');;
                    }
                 
                    
                    if (!name || name.length > 10) {
                            document.querySelector('.error-name').style.display = 'block'; // 個別のエラー要素
                            isValid = false;
                        } else {
                            document.querySelector('.error-name').style.display = 'none';
                        }

                        if (!kana || kana.length > 10) {
                            document.querySelector('.error-kana').style.display = 'block';
                            isValid = false;
                        } else {
                            document.querySelector('.error-kana').style.display = 'none';
                        }

                        const telPattern = /^[0-9]+$/;
                        if (!tel || !telPattern.test(tel)) {
                            document.querySelector('.error-tel').style.display = 'block';
                            isValid = false;
                        } else {
                            document.querySelector('.error-tel').style.display = 'none';
                        }

                        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        if (!email || !emailPattern.test(email)) {
                            document.querySelector('.error-email').style.display = 'block';
                            isValid = false;
                        } else {
                            document.querySelector('.error-email').style.display = 'none';
                        }

                        if (!body) {
                            document.querySelector('.error-body').style.display = 'block';
                            isValid = false;
                        } else {
                            document.querySelector('.error-body').style.display = 'none';
                        }
                });
            </script>
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