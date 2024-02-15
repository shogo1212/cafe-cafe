<?php
require 'dbconnect.php';

try {
    // すべてのレコードを取得
    $sql = "SELECT id, name, kana, tel, email, body FROM contacts ORDER BY id DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //データ取得
        $id = $_POST['id'];
        $name = $_POST['name'];
        $kana = $_POST['kana'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $body = $_POST['body'];

        $sql = "UPDATE  contacts SET name = :name, kana = :kana, tel = :tel, email = :email, body = :body WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        // バインド変数に値をセット
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':kana', $kana, PDO::PARAM_STR);
        $stmt->bindValue(':tel', $tel, PDO::PARAM_INT);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':body', $body, PDO::PARAM_STR);

        $stmt->execute();

        header('Location: contact.php');
        exit();
    }
} catch (\PDOException $e) {
    // PDO例外がキャッチされた場合の処理
    echo "エラーが発生しました：" . $e->getMessage();
}
?>


