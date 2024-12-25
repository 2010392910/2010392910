/*
免责声明:
本脚本由本人[作文]编写，仅供学习和研究之用
本人不保证脚本的准确性及安全性
在使用过程中，您应自行承担所有风险，包括但不限于数据丢失、系统损坏或其他潜在问题。
*/



<?php
// 检查标志文件是否存在
$checkFilePath = '1.txt'; // 标志文件的路径
if (!file_exists($checkFilePath)) {
    echo "<h1>网站已关闭 请联系管理员!</h1>";
    echo "<h1>请填写</h1>";
    exit;
}

// 检查是否有POST请求
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 获取用户输入的名字
    $name = trim($_POST['name']);

    // 检查用户输入是否是三个汉字
    if (preg_match('/^[\x{4e00}-\x{9fa5}]{3}$/u', $name)) {
        // 初始化标志变量，用于标记是否找到匹配的名字
        $found = false;

        // 特定名
        $specificNames = ['xxx']; // 这里可以添加多个特定名字

        // 检查是否为特定名字
        if (in_array($name, $specificNames)) {
            echo "<h1>检测到您查询的为特殊用户 已自动拒绝访问</h1>";
            echo "<h1>如有查询需要，请联系开发者!</h1>";
            exit;
        }


/*





// 保存搜索的名字到本地文件，并记录查询日期
$searchedNamesFile = 'name.txt';
if (!file_exists($searchedNamesFile)) {
    file_put_contents($searchedNamesFile, ''); // 创建空文件
}


/*
// 获取当前日期和时间
$dateTime = date('Y-m-d H:i:s');
// 追加名字和日期到文件
file_put_contents($searchedNamesFile, $name . " - " . $dateTime . "\n", FILE_APPEND); // 追加名字和日期到文件

/*



// 获取用户代理信息
$userAgent = $_SERVER['HTTP_USER_AGENT'];
$acceptLanguage = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
$acceptEncoding = $_SERVER['HTTP_ACCEPT_ENCODING'];
$acceptCharset = $_SERVER['HTTP_ACCEPT_CHARSET'];
$referer = $_SERVER['HTTP_REFERER'];
$origin = $_SERVER['HTTP_ORIGIN'];
$dnt = $_SERVER['HTTP_DNT'];
$xForwardedFor = $_SERVER['HTTP_X_FORWARDED_FOR'];

// 追加用户代理信息到查询记录文件
$dateTime = date('Y-m-d H:i:s');
$additionalInfo = " - " . $dateTime . " - UserAgent: " . $userAgent .
                " - Language: " . $acceptLanguage .
                " - Encoding: " . $acceptEncoding .
                " - Charset: " . $acceptCharset .
                " - Referer: " . $referer .
                " - Origin: " . $origin .
                " - DNT: " . $dnt .
                " - IP: " . $xForwardedFor . "\n\n";




// 追加名字、日期和浏览器信息到文件
file_put_contents($searchedNamesFile, $name . $additionalInfo, FILE_APPEND);



*/







        // 尝试不同的编码格式打开文件
        $encodings = ['utf-8']; // 可以根据需要添加更多的编码格式
        foreach ($encodings as $encoding) {
            $file = fopen('请填写文件路径', 'r');
            if ($file === false) {
                echo "<h1>后台已关闭，请联系开发者</h1>";
                exit;
            }
            
            // 设置文件的编码
            if ($encoding) {
                stream_filter_append($file, "convert.iconv." . $encoding . "/UTF-8");
            }
            
            // 逐行读取文件
            while (($line = fgets($file)) !== false) {
                // 检查每一行的前三个字符是否与输入的名字匹配
                if (substr($line, 0, strlen($name)) === $name) {
                    // 如果找到匹配项，标记为找到，并继续搜索
                    $found = true;
                    
                    // 提取身份证号码，假设它从第6个字符开始，长度为18位
                    $idCard = substr($line, 10, 18);
                    
                    // 自写-民族
                    $idnationality = substr($line, 29, 3);
                    echo "<div class='result'>";
                    echo "<h1>查询结果</h1>";
                    echo "<p><strong>名字：</strong>" . htmlspecialchars($name) . "</p>";    
                    echo "<p><strong>身份证：</strong>" . htmlspecialchars($idCard) . "</p>";
                    echo "<p><strong>性别：</strong>" . htmlspecialchars($idnationality) . "</p>";
                    echo "<p><strong>内容：</strong>" . htmlspecialchars($line) . "</p>";
                    echo "</div>";
                }
            }
            
            // 关闭文件
            fclose($file);
            
            if (!$found) {
                echo "<h1>未找到此人 请检查是否输入正确</h1>";
            }
        }
    } else {
        echo "<h1>请输入查询名字的全称(三个字)</h1>";
    }
} else {
    // 如果不是POST请求，则显示表单
}
?>














/*
免责声明:
本脚本由本人[作文]编写，仅供学习和研究之用
本人不保证脚本的准确性及安全性
在使用过程中，您应自行承担所有风险，包括但不限于数据丢失、系统损坏或其他潜在问题。
*/


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>查询系统</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>请输入名字进行查询</h1>
        <div class="time">当前时间：<?php echo date('Y-m-d H:i:s'); ?></div>
    </header>
    <form action="zw.php" method="post">
        <input type="text" name="name" required>
        <input type="submit" value="查询">
    </form>
        <footer>
        <p></p>
        <p></p>
        <p></p>
        <p>&copy; 2024 查询系统</p>
    </footer>
</body>
</html>
