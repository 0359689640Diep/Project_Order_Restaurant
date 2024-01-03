<link rel="stylesheet" href="../assets/css/user/PersonalPage.css">
<section class="page">
        <main>
            <aside class="aside">
                <section class="headerAside">
                    <article class="img">
                        <img src="../assets/img/admin/<?= $dataProfile['ImageAccounts']?>" alt="">
                    </article>
                    <article class="content">
                        <h1><?= $_SESSION['user']["NameAccount"] ?></h1>
                    </article>
                </section>
                <section class="mainAside">                    
                    <ul>
                        <li><a href="OnlineController.php?act=billthanhtoan">Lịch sử đơn hàng</a></li>
                        <li> <a href="OnlineController.php?act=AddComment">Bình luận sản phẩm</a> </li>
                        <li> <a href="OnlineController.php?act=ListComment">Sản phẩm đã bình luận</a> </li>
                    </ul>
                </section>
            </aside>
            <form action="OnlineController.php?act=PersonalPage&IdAccount=<?= $dataProfile['IdAccount']?>" method="post" class="containerMain" enctype="multipart/form-data">
                <section class="headerMain">
                    <section class="titleMain">
                        <h1>Trang cá nhân của tôi</h1>
                    </section>
                    
                </section>
                <section class="ContainerMains">
                    <section class="contentMain">
                        <article class="itemContentMain">
                            <label for="NameAccount">Tên</label>
                            <input value="<?= $dataProfile['NameAccount']?>" type="text" id="NameAccount" name="NameAccount" autofocus>
                        </article>
                        <article class="itemContentMain">
                            <label for="Gmail">Email</label>
                            <input value="<?= $dataProfile['Gmail']?>" type="email" id="Gmail" name="Gmail">
                        </article>
                        <article class="itemContentMainGender">
                            <label for="Nam">
                                Nam
                                <input value="0" type="radio" id="Nam" name="Gender" <?= $dataProfile['Gender'] == 0 ? "checked" : "" ?> >
                            </label>
                            <label for="Nữ">
                                Nữ
                                <input value="1" type="radio" id="Nữ" name="Gender" <?= $dataProfile['Gender'] == 1 ? "checked" : "" ?> >
                            </label>
                    
                        </article>
                        <article class="itemContentMain">
                            <label for="Password">Mật khẩu</label>
                            <input value="<?= $dataProfile['Password']?>" type="password" id="Password" name="Password">
                        </article>
                        <article class="itemContentMain">
                            <button type="submit">Lưu</button>
                        </article>
                    </section>
                    <section class="contentImage">
                        <article class="itemContentMain">
                            <img src="../assets/img/admin/<?= $dataProfile['ImageAccounts']?>" alt="">
                            <input value="<?= $dataProfile['ImageAccounts']?>" type="file" name="ImageAccounts">
                        </article>
                    </section>
                </section>
            </form>
        </main>
  
    </section>