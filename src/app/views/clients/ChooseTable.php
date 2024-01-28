<?php
include_once $_ENV['header_Path'];

?>
<link rel="stylesheet" href="<?= $_ENV["clientsStyle"] ?>ChooseTable.css">
<form action="<?= $_ENV["basePath"] ?>chooseTable" method="post" class="datban">
    <article class="headerchooseTable">
        <h1>Chọn bàn mà bạn muốn</h1>
    </article>
    <section class="containerTable">
        <section class="listTable">
            <?php
            foreach ($dataTables as $valuesListTables) {
                if ($valuesListTables["StatusTable"] === 2) {
                    echo "
                <label class='contentTable ' style='background-color: #CA0910;'>
                    <span>Số bàn: {$valuesListTables['NumberTable']} - Số lượng người tối đa: {$valuesListTables['NumberPeopleDefault']}</span>
                </label>                
                ";
                } else {
                    echo "
                <label class='contentTable'>
                    <input type='radio' name='IdTables' value='{$valuesListTables['IdTables']}' hidden>
                    <span>Số bàn: {$valuesListTables['NumberTable']} - Số lượng người tối đa: {$valuesListTables['NumberPeopleDefault']}</span>
                </label>                
                ";
                }
            }
            ?>

        </section>
        <article class="timeBooking">
            <input type="datetime-local" name="timeBooking" required title="Không được để trống">
            <select name="NumberInPeople" required title="Không được để trống">
                <option value="">Bạn đi bao nhiêu người ?</option>
                <?php
                for ($i = 1; $i <= $maxNumberPeopleDefault["MAX(NumberPeopleDefault)"]; $i++) {
                    echo "<option value='$i'>$i - Người</option>";
                }
                ?>
            </select>
            <article class="footer">
                <button id="submit" type="submit" disabled>Thanh toán</button>
            </article>
        </article>
    </section>

</form>
<script src="<?= $_ENV['javaScript'] ?>ChooseTable.js"></script>