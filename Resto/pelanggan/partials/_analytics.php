<?php
//Global variables
$id_pelanggan = $_SESSION['id_pelanggan'];

//1. My Orders
$query = "SELECT COUNT(*) FROM `pesanan` WHERE id_pelanggan =  '$id_pelanggan' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($orders);
$stmt->fetch();
$stmt->close();

//3. Available Products
$query = "SELECT COUNT(*) FROM `menu` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($menu);
$stmt->fetch();
$stmt->close();

//4.My Payments
$query = "SELECT SUM(harga_pembayaran) FROM `pembayaran` WHERE id_pelanggan = '$id_pelanggan' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($sales);
$stmt->fetch();
$stmt->close();
