<?php
// Đọc tệp câu hỏi
$filename = "questions.txt";
$questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$current_question = [];
$all_questions = [];

// Phân tách các câu hỏi từ tệp
foreach ($questions as $line) {
    // Nếu dòng bắt đầu bằng "ANSWER", lưu đáp án
    if (strpos($line, "ANSWER:") !== false) {
        $current_question[] = trim(substr($line, strpos($line, ":") + 1)); // Lấy đáp án đúng
        $all_questions[] = $current_question; // Lưu câu hỏi vào mảng
        $current_question = []; // Reset câu hỏi
    } elseif (strpos($line, "ANSWER") === false) {
        // Nếu không phải dòng đáp án, kiểm tra nếu có câu hỏi và đáp án, phân loại
        $current_question[] = $line;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Làm Bài Trắc Nghiệm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h3>Tải lên tệp câu hỏi</h3>
        <a href="upload_questions.php" class="btn btn-success">Tải lên tệp câu hỏi</a>

        <h1>Làm Bài Trắc Nghiệm</h1>
        <form action="process.php" method="post">
            <div class="list-group">
                <?php foreach ($all_questions as $index => $question): ?>
                    <div class="list-group-item">
                        <strong><?php echo $question[0]; ?></strong>
                        <div>
                            <?php for ($i = 1; $i <= 4; $i++): ?>
                                <?php $answer = substr($question[$i], 0, 1); // Lấy A, B, C, D 
                                ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question<?php echo $index; ?>" value="<?php echo $answer; ?>" id="q<?php echo $index; ?><?php echo $answer; ?>">
                                    <label class="form-check-label" for="q<?php echo $index; ?><?php echo $answer; ?>">
                                        <?php echo $question[$i]; ?>
                                    </label>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Nộp bài</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>