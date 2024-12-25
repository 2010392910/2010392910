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
    <title>后台开关控制</title>
    <style>
        body {
            text-align: center;
            padding-top: 50px;
            font-family: 'Arial', sans-serif; /* 使用无衬线字体 */
            background-color: #f7f7f7; /* 设置背景颜色 */
            color: #333; /* 设置文本颜色 */
            display: flex;
            flex-direction: column;
            align-items: center; /* 使按钮在中间垂直排列 */
        }
        .button {
            font-size: 30px; /* 放大按钮字体 */
            padding: 30px 60px; /* 放大按钮尺寸 */
            margin: 20px; /* 增加按钮之间的间距 */
            cursor: pointer;
            border: none;
            background-image: linear-gradient(45deg, #3498db, #2980b9); /* 渐变背景 */
            color: white;
            border-radius: 8px; /* 圆角边框 */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* 添加阴影 */
            transition: all 0.3s ease; /* 平滑过渡效果 */
            outline: none; /* 移除焦点时的轮廓 */
        }
        .button:hover {
            background-image: linear-gradient(45deg, #2980b9, #3498db); /* 鼠标悬停时改变渐变方向 */
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15); /* 鼠标悬停时增加阴影 */
            transform: translateY(-2px); /* 轻微上移 */
        }
        .button:active {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* 点击时减少阴影 */
            transform: translateY(0); /* 点击时回到原位 */
        }
        .result {
            font-size: 30px; /* 放大结果字体 */
            color: red; /* 设置结果字体颜色为红色 */
            margin-bottom: 20px; /* 增加结果与按钮之间的间距 */
        }
    </style>
</head>
<body>
    <div class="result">
        <?php
        // 获取URL参数
        $api = isset($_GET['api']) ? $_GET['api'] : '';

        // 定义文件路径
        $filePath = '1.txt';

        // 根据参数执行操作
        switch ($api) {
            case 'false':
                // 创建文件
                if (!file_exists($filePath)) {
                    touch($filePath);
                    echo "已开启";
                } else {
                    echo "已被开启";
                }
                break;
            case 'ture':
                // 删除文件
                if (file_exists($filePath)) {
                    unlink($filePath);
                    echo "已关闭";
                } else {
                    echo "未开启";
                }
                break;
            default:
                echo "非法参数";
                break;
        }
        ?>
    </div>
    <button class="button" onclick="location.href='?api=false'">开</button>
    <button class="button" onclick="location.href='?api=ture'">关</button>
</body>
</html>


