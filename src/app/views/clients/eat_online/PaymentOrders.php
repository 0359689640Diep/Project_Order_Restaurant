<link rel="stylesheet" href="../assets/css/user/PaymentOrders.css">
<section class="page">
    <main>
        <article class="titleMain">
            <h1>Thanh toán đơn hàng</h1>
        </article>
        <section class="containerMain">
            <section class="customerInformation">
                <article class="titleCustomerInformation">
                    <h1>Thông tin khách hàng</h1>
                </article>
                <form action="" method="post">
                    <label for="">Tên</label>
                    <input type="text" name = "name">
                    <label for="">Tên tài khoản</label>
                    <input type="text" name = "account">
                    <label for="">Email</label>
                    <input type="email" name = "email">
                    <label for="">Địa chỉ</label>
                    <input type="text" name = "Address">
                    <input type="submit" name = "submit" value="Cập nhật lại thông tin" >
                </form>
            </section>
            <section class="yourInvoice">
                <article class="titleYourInvoice">
                    <h1>Hóa đơn của bạn</h1>
                </article>
                <section class="contentProductYourInvoice">
                    <table>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                        </tr>
                        <tr>
                            <td>My cheese burger</td>
                            <td>10$</td>
                        </tr>
                        <tr>
                            <td>My cheese burger</td>
                            <td>10$</td>
                        </tr>
                        <tr>
                            <td>My cheese burger</td>
                            <td>10$</td>
                        </tr>
    
                    </table>
                </section>
                <form action="" method="post" class="contentPlaceOrderYourInvoice">
                    <article class="total">
                        <h1>Tổng</h1>
                        <h1>25$</h1>
                    </article>
                    <section class="pay">
                        <article class="paymentCash">
                            <input onclick="display('paymentCashs')" type="radio" name="pay" id="paymentCash">
                            <label for="paymentCash">Thanh toán bằng tiền mặt
                                <p id="paymentCashs">Khi đơn hàng đến bạn sẽ thanh toán cho shipper</p>
                            </label>
                        </article>
                        <article class="bankCardPayment">
                            <input onclick="display('bankCardPayments')" type="radio" name="pay" id="bankCardPayment">
                            <label for="bankCardPayment">Thanh toán bằng thẻ ngân hàng
                                <p id="bankCardPayments">Bạn có thể chuyển khoản hoặc quẹt thẻ khi thanh toán bằng hình thức này</p>
                            </label>
                        </article>
                    </section>
                    <article class="placeOrder">
                        <button type="submit">Đặt hàng</button>
                    </article>
                </form>
            </section>
        </section>
    </main>
</section>
<script src="../../assets/js/PaymentOrders.js"></script>