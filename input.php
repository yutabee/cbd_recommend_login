<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <title>input</title>
</head>

<body>
    <?php

    require './cbd_db_read.php';
    require './recommend_dose_read.php';

    session_start();
    // var_dump($_SESSION);
    // exit();
    $login = "";
    $product_management = "";
    if (!isset($_SESSION["session_id"]) || $_SESSION["session_id"] != session_id()) {
        $login = '<a href="./login/login.php">LOGIN</a>';
    } else {
        $login = '<a href="./login/logout.php">LOGOUT</a>';
        if ($_SESSION["is_admin"] == 1) {
            $product_management = '<a href="./product_management/product_register_input.php">EDIT</a>';
        }
    }

    ?>

    <header>
        <h1>
            <a href="/">CBD RECOMMEND</a>
        </h1>
        <nav class="pc-nav">
            <ul>
                <!-- <li><a href="#">ABOUT</a></li>
                <li><a href="#">SERVICE</a></li>
                <li><a href="#">COMPANY</a></li> -->
                <li><a href="./contact/contact_input.php">CONTACT</a></li>
                <li><?= $product_management ?></li>
                <li><?= $login ?></li>
            </ul>
        </nav>
    </header>
    <div class="main-visual">
        <h2>CBD CHANGE THE WORLD</h2>
    </div>

    <main>
        <div class="cbd_Que_form">
            <p class="fs-2">Question</p>
            <p>?????????????????????????????????????????????????????????????????????????????????????????????</p>
            <form action="./cbd_mg_create.php" method="POST">
                <div class="mb-3">
                    <label for="age" class="form-label">??????</label>
                    <select class="form-select" id="age" name="age">
                        <option>?????????</option>
                        <option value="20">?????????</option>
                        <option value="30">?????????</option>
                        <option value="40">?????????</option>
                        <option value="50">?????????</option>
                        <option value="60">?????????</option>
                        <option value="70">?????????</option>
                        <option value="70">?????????</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">??????</label>
                    <select class="form-select" id="gender" name="gender">
                        <option>?????????</option>
                        <option value="man">??????</option>
                        <option value="woman">??????</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="symptom" class="form-label">?????? (?????????????????????????????????)</label>
                    <select class="form-select" id="symptom" name="symptom">
                        <option>?????????</option>
                        <option value="have">??????</option>
                        <option value="not_have">??????</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="weight" class="form-label">??????</label>
                    <select class="form-select" id="weight" name="weight">
                        <option>?????????</option>
                        <option value="30">30~39kg</option>
                        <option value="40">40~49kg</option>
                        <option value="50">50~59kg</option>
                        <option value="60">60~69kg</option>
                        <option value="70">70~79kg</option>
                        <option value="80">80~89kg</option>
                        <option value="90">90~99kg</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btnx-outline-lime" id="submit">submit</button>
            </form>
        </div>

        <p class="fs-2 text" id="recommend_text">????????????????????????????????????1???<?= $line ?>mg??????!!</p>

        <div class="recommend_products">
            <p class="fs-2 text">?????????????????????????????????</p>
            <p class="fs-3">1??????2???3???,???????????????????????????????????????</p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">CBD??????(%)</th>
                        <th scope="col">?????????(ml)</th>
                        <th scope="col">CBD??????(mg)</th>
                        <th scope="col">1???????????????????????????(??????)</th>
                        <th scope="col">1???????????????<br>CBD?????????(mg)</th>
                        <th scope="col">1mg????????????<br>??????(???)</th>
                    </tr>
                </thead>
                <tbody id="recommend_products"></tbody>
            </table>
        </div>

        <div class="all_products">
            <p class="fs-2 text">?????????????????????</p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">CBD??????(%)</th>
                        <th scope="col">?????????(ml)</th>
                        <th scope="col">CBD??????(mg)</th>
                        <th scope="col">1???????????????????????????(??????)</th>
                        <th scope="col">1???????????????<br>CBD?????????(mg)</th>
                        <th scope="col">1mg????????????<br>??????(???)</th>
                    </tr>
                </thead>
                <!-- ????????????????????????????????????????????????input -->
                <tbody id="outputArea"></tbody>
            </table>
        </div>
    </main>

    <footer>
        <p>&copy;Yuuuuuuuuuuuuta tmr</p>
    </footer>


    <script>
        const Objs = <?= json_encode($result) ?>; //??????????????????
        const personalDoseJson = <?= json_encode($line) ?>; //????????????????????????
        console.log(personalDoseJson);
        console.log(Objs);
        let outText = '';
        for (Obj of Objs) {
            outText +=
                `
            <tr>
                <td>${Obj.concentration}</td>
                <td>${Obj.volume}</td>
                <td>${Obj.all_content}</td>
                <td>${Obj.all_drop}</td>
                <td>${Obj.one_drop_content}</td>
                <td>${Obj.one_drop_price}</td>
            </tr>
                `
        };
        const outputArea = document.getElementById('outputArea');
        outputArea.innerHTML = outText;

        const personalProducts = Objs.filter(x => {
            return personalDoseJson / x.one_drop_content <= 3 && 2 <= personalDoseJson / x.one_drop_content;
        });

        console.log(personalProducts);
        let recommendOutText = '';
        for (personalProduct of personalProducts) {
            recommendOutText +=
                `
            <tr>
                <td>${personalProduct.concentration}</td>
                <td>${personalProduct.volume}</td>
                <td>${personalProduct.all_content}</td>
                <td>${personalProduct.all_drop}</td>
                <td>${personalProduct.one_drop_content}</td>
                <td>${personalProduct.one_drop_price}</td>
            </tr>
                `
        };
        const recommend_products = document.getElementById('recommend_products');
        recommend_products.innerHTML = recommendOutText;
    </script>

    <style>
        .all_products {
            margin: 5% 5%;
        }

        .recommend_products {
            margin: 5% 5%;
        }

        .cbd_Que_form {
            margin: 5% 25%;
        }

        .text {
            text-align: center;
            border: 1px solid black;
            padding: 1rem;
        }

        .btnx-outline-lime {
            color: #827717;
            background: var(--bs-white);
            border: 2px solid #C5E1A5;
        }

        .btnx-outline-lime:hover {
            background-color: #C5E1A5;
        }
    </style>
</body>

</html>