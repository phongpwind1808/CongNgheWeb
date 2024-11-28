<?php
require_once 'dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];
    
    // Kiểm tra loại file
    if ($file['type'] != 'text/plain') {
        echo "Vui lòng chỉ tải lên tệp .txt!";
        exit();
    }

    // Đọc dữ liệu từ tệp
    $content = file_get_contents($file['tmp_name']);
    $lines = explode("\n", $content);
    
    $questions = [];
    $current_question = [];
    foreach ($lines as $line) {
        if (strpos($line, "Câu") === 0) {
            if (!empty($current_question)) {
                $questions[] = $current_question;
            }
            $current_question = [$line];
        } elseif (strpos($line, "Đáp án:") !== false) {
            $current_question[] = trim(substr($line, strpos($line, ":") + 1));
        } else {
            $current_question[] = $line;
        }
    }

    if (!empty($current_question)) {
        $questions[] = $current_question;
    }

    // Kết nối CSDL và chèn câu hỏi
    $conn = (new dbconnection())->getConn();
    $stmt = $conn->prepare("INSERT INTO questions (question_text, option_a, option_b, option_c, option_d, correct_answer) VALUES (?, ?, ?, ?, ?, ?)");

    foreach ($questions as $question) {
        $stmt->execute([
            $question[0], // question_text
            $question[1], // option_a
            $question[2], // option_b
            $question[3], // option_c
            $question[4], // option_d
            $question[5], // correct_answer
        ]);
    }

    echo "Tải lên câu hỏi thành công!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Câu Hỏi</title>
</head>
<body>
    <h1>Upload Câu Hỏi Trắc Nghiệm</h1>
    <form action="upload_questions.php" method="post" enctype="multipart/form-data">
        <label for="file">Chọn tệp câu hỏi (.txt):</label>
        <input type="file" name="file" id="file" required>
        <button type="submit">Tải lên</button>
    </form>
</body>
</html>
