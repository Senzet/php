<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <style>
        body {
    font-family: 'Roboto', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f4f8;
    color: #222;
    }

    h1 {
    text-align: center;
    margin: 30px 0;
    color: #4caf50;
    font-size: 2.5em;
    }

    table {
    width: 90%;
    margin: 30px auto;
    border-collapse: collapse;
    background-color: #ffffff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    }

    th, td {
    padding: 12px 20px;
    text-align: left;
    border-bottom: 1px solid #e0e0e0;
    }

    th {
    background-color: #4caf50;
    color: #ffffff;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    }

    tr:nth-child(even) {
    background-color: #f9f9f9;
    }

    tr:hover {
    background-color: #d4edda;
    transition: background-color 0.3s ease;
    }

    a {
    text-decoration: none;
    color: #4caf50;
    }

    a:hover {
    text-decoration: underline;
    color: #388e3c;
    }

    .btn {
    display: block;
    padding: 12px 25px;
    margin: 30px auto;
    text-align: center;
    background-color: #4caf50;
    color: #ffffff;
    border-radius: 6px;
    font-size: 18px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s;
    }

    .btn:hover {
    background-color: #388e3c;
    transform: translateY(-2px);
    }

    .empty-cart {
    text-align: center;
    font-size: 20px;
    margin-top: 60px; 
    color: #757575;
    }
    </style>
</head>
<body>
    <h1>Giỏ hàng của bạn</h1>
    <?php if (!empty($_SESSION['cart'])) : ?>
        <table>
            <thead>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($_SESSION['cart'] as $item) :
                    $subtotal = $item['PricePro'] * $item['quantity'];
                    $total += $subtotal;
                ?>
                    <tr>
                        <td><img src="../upload/<?php echo $item['Picture']; ?>" width="100" height="100" alt=""></td>
                        <td><?php echo $item['NamePro']; ?></td>
                        <td><?php echo number_format($item['PricePro']); ?> VND</td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td><?php echo number_format($subtotal); ?> VND</td>
                        <td>
                            <a href="cartremove.php?id=<?php echo $item['id']; ?>">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="4" style="text-align: right; font-weight: bold;">Tổng cộng</td>
                    <td colspan="2" style="font-weight: bold; color: #dc3545;">
                        <?php echo number_format($total); ?> VND
                    </td>
                </tr>
            </tbody>
        </table>
    <?php else : ?>
        <p class="empty-cart">Giỏ hàng của bạn đang trống!</p>
    <?php endif; ?>

    <div style="text-align: center;">
        <a href="fruit.php" class="btn">Quay lại trang chủ</a>
    </div>
</body>
</html>