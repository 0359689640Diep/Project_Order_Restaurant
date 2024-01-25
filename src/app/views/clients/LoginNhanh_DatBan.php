
<link rel="stylesheet" href="../assets/css/user/DatBan.css">
<form action="" method="post" class="datban">
    <article class="header">
        <h1>Chọn bàn mà bạn muốn</h1>
    </article>
    <section class="containerTable">
    <section class="listTable">
        <?php
        foreach(datBan_ListTables()["listTables"] as $valuesListTables){
            if($valuesListTables["StatusTable"] === 2){
                echo "
                <label class='contentTable ' style='background-color: #CA0910;'>
                    <span>Số bàn: {$valuesListTables['NumberTable']} - Số lượng người tối đa: {$valuesListTables['DefaultNumberPeople']}</span>
                </label>                
                ";
            }else{
                echo "
                <label class='contentTable'>
                    <input type='radio' name='contentTable' value='{$valuesListTables['IdTables']}' hidden>
                    <span>Số bàn: {$valuesListTables['NumberTable']} - Số lượng người tối đa: {$valuesListTables['DefaultNumberPeople']}</span>
                </label>                
                ";
            }
        }
        ?>

    </section>
    <article class="timeBooking">
        <input type="datetime-local" name="timeBooking" required title="Không được để trống">
        <select name="NumberInPeople"  required title="Không được để trống">
            <option value="">Bạn đi bao nhiêu người ?</option>
            <?php 
            for($i = 1; $i <= datBan_ListTables()["maxDefaulTables"]; $i++){
                echo "
                <option value='$i'>$i - Người</option>
                ";
            }
            ?>
        </select>
        <article class="footer">
            <button type="submit">Thanh toán</button>
        </article>
    </article>
    </section>

</form>
<script src="../assets/js/DatBan.js"></script>

