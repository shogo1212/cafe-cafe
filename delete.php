<?php
// データベース接続
require 'dbconnect.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // 削除クエリの準備
        $sql = "DELETE FROM contacts WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT); 

        // クエリの実行
        if ($stmt->execute()) {
            // 削除が成功した場合、リダイレクト
            header('Location: contact.php');
            exit();
        }
    } catch (\PDOException $e) {
        // PDO例外がキャッチされた場合の処理
        echo "エラーが発生しました：" . $e->getMessage();
    }
}
?>

