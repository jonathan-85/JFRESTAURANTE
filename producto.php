<?php include('database/db.php'); ?>
<?php include('includes/header2.php'); ?>
<?php
$id = $_GET['id'];
if (is_numeric($id) && strlen($id)) {
  $query = "SELECT * FROM `Products` WHERE `id`='$id'";
  $result = mysqli_query($conn, $query);
  $product = mysqli_fetch_assoc($result);
  if (is_null($product)) {
    header("Location: index.php");
    exit();
  } else { ?>
    <main class="w-100 h-100 py-3 p-md-5 overflow-auto" style="background-image: url(https://res.cloudinary.com/kurtcovayne4/image/upload/v1616529376/pestana3/314_v39cd5.webp); background-size: cover">
      <?php include('includes/message.php'); ?>
      <div class="card mx-auto" style="width: max(18rem, 40vw); opacity: 95%;">
        <div class="card-body">
          <h3 class="card-title text-center" style="color: #ee6d2d">
            <?php echo htmlspecialchars($product['name']); ?>
          </h3>
          <div class="mx-auto">
            <img src="<?php echo htmlspecialchars($product['photo_url']) ?>" alt="<?php echo htmlspecialchars($product['name']) ?>" class="img-fluid mx-auto d-block" style="width:min(12rem, 75%)" />
          </div>

          <div class="text-center px-5">
            <h4 class="card-title text-center" style="color: #ee6d2d">
              <?php echo (($product['product_type'] == 'hamburger') ? 'Hamburguesa' : (($product['product_type'] == 'pizza') ? 'Pizza' : 'Bebida')); ?>
            </h4>
            <p class="card-text">
              <?php echo htmlspecialchars($product['description']) ?>
            </p>
            <h5 class="card-title text-center" style="color: #ee6d2d">
              <?php echo "COP " . round($product['price'], 2) ?>
            </h5>
            <div class="d-grid w-50 mx-auto">
              <a href="<?php echo "comprar.php?id=" . $product['id'] ?>" class="btn fw-bold text-white" style="background-color: #ee6d2d">
                Comprar
              </a>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" version="1.0" style="width: 3rem; height: 3rem;" viewBox="0 0 1280.000000 1225.000000" preserveAspectRatio="xMidYMid meet">

              <g transform="translate(0.000000,1225.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                <path d="M11390 12078 c-547 -94 -1018 -179 -1047 -190 -28 -10 -70 -34 -93 -52 -79 -62 -78 -61 -298 -626 -126 -321 -257 -659 -332 -850 -38 -96 -114 -292 -170 -435 -55 -143 -129 -330 -162 -416 l-61 -156 -286 -7 c-525 -12 -2661 -65 -3071 -76 -223 -6 -945 -24 -1605 -40 -660 -16 -1384 -34 -1610 -40 -225 -6 -847 -22 -1381 -35 -1033 -26 -1016 -25 -1099 -75 -87 -54 -162 -172 -172 -272 -3 -34 27 -317 86 -798 50 -410 149 -1231 221 -1825 203 -1679 185 -1546 216 -1615 17 -37 45 -77 78 -108 58 -55 91 -74 151 -91 23 -6 410 -40 860 -76 451 -36 1131 -90 1510 -120 380 -30 1111 -88 1625 -129 514 -41 1265 -101 1668 -133 l733 -58 647 -508 c356 -279 676 -538 712 -575 100 -103 170 -255 170 -368 0 -23 -9 -71 -20 -107 -24 -79 -78 -133 -166 -168 l-59 -23 -945 -8 c-520 -4 -2297 -12 -3950 -16 l-3005 -8 -58 -23 c-81 -32 -166 -113 -203 -193 -24 -53 -28 -75 -28 -143 1 -49 7 -97 18 -124 22 -59 79 -133 132 -171 87 -62 100 -64 441 -70 l313 -5 -54 -42 c-114 -88 -213 -238 -254 -386 -12 -45 -17 -98 -16 -192 1 -149 21 -229 89 -352 51 -90 188 -227 278 -278 369 -204 833 -59 1017 320 22 44 47 112 56 150 22 92 22 249 0 340 -38 152 -142 313 -262 406 l-57 44 1804 6 c992 3 2389 7 3103 8 l1300 1 -45 -28 c-212 -136 -342 -395 -326 -652 20 -330 262 -607 589 -674 162 -33 304 -14 467 66 91 43 116 62 191 137 70 70 94 103 133 181 64 128 81 200 81 335 0 131 -17 206 -73 320 -48 97 -116 183 -196 248 -67 53 -197 123 -251 133 -50 9 -50 19 1 38 191 74 394 242 521 434 68 101 131 242 144 322 16 92 16 272 1 360 -19 103 -67 248 -113 340 -129 255 -245 370 -850 844 -252 197 -458 363 -458 368 0 5 72 195 161 421 89 227 196 502 239 612 43 110 160 409 260 665 100 256 218 557 262 670 99 255 317 811 648 1660 38 96 150 384 250 640 194 497 220 562 500 1280 182 466 298 763 392 1005 28 72 52 131 53 133 2 2 409 72 905 157 999 170 967 162 1054 255 73 78 100 147 100 250 0 96 -25 166 -82 231 -68 78 -180 130 -276 128 -28 0 -499 -77 -1046 -171z m-2472 -3390 c-22 -57 -71 -182 -108 -278 -38 -96 -118 -303 -180 -460 -61 -157 -125 -321 -142 -365 -17 -44 -35 -86 -41 -93 -7 -9 -82 -12 -336 -10 l-326 3 0 640 0 640 400 11 c220 6 484 11 587 12 l186 2 -40 -102z m-1390 -565 l-3 -638 -612 -3 -613 -2 0 624 0 624 308 7 c169 4 415 11 547 15 132 4 270 7 308 8 l67 2 -2 -637z m-1485 -20 l-3 -618 -612 0 -613 0 -3 603 -2 602 42 1 c24 1 239 7 478 13 239 7 498 14 575 14 l140 2 -2 -617z m-1483 -23 l0 -600 -612 2 -613 3 -3 583 c-1 320 -1 583 0 583 7 3 873 26 1041 27 l187 2 0 -600z m-1485 -15 l0 -580 -612 -2 -613 -3 0 569 0 568 323 8 c177 4 435 11 572 15 138 4 268 7 290 6 l40 -1 0 -580z m-1485 -20 l0 -565 -444 0 c-284 0 -447 4 -451 10 -5 9 -135 1050 -135 1085 0 10 35 14 168 15 92 2 275 6 407 9 132 4 288 8 348 9 l107 2 0 -565z m0 -1390 l0 -575 -364 0 -365 0 -6 43 c-3 23 -32 267 -65 542 -33 275 -62 515 -65 533 l-6 32 436 0 435 0 0 -575z m1490 0 l0 -575 -615 0 -615 0 0 575 0 575 615 0 615 0 0 -575z m1480 0 l0 -575 -615 0 -615 0 0 575 0 575 615 0 615 0 0 -575z m1483 3 l-3 -573 -612 0 -613 0 -3 573 -2 572 617 0 618 0 -2 -572z m1487 -3 l0 -575 -615 0 -615 0 0 575 0 575 615 0 615 0 0 -575z m800 523 c-11 -29 -112 -287 -224 -573 l-203 -520 -61 -3 -62 -3 0 576 0 575 285 0 285 0 -20 -52z m-6740 -1761 l0 -413 -147 12 c-82 6 -218 17 -303 24 l-156 12 -43 362 c-24 198 -45 373 -48 389 l-5 27 351 0 351 0 0 -413z m1490 -57 l0 -470 -29 0 c-15 0 -281 20 -590 45 -309 25 -573 45 -586 45 l-25 0 0 425 0 425 615 0 615 0 0 -470z m1480 -60 c0 -291 -3 -530 -7 -530 -23 -1 -1200 92 -1210 96 -10 3 -13 108 -13 484 l0 480 615 0 615 0 0 -530z m1480 -61 l0 -592 -57 6 c-32 4 -294 25 -583 47 -289 23 -540 43 -557 46 l-33 5 0 533 c0 293 3 536 7 539 3 4 280 7 615 7 l608 0 0 -591z m1490 243 l0 -349 -86 -219 c-47 -120 -100 -256 -117 -302 -24 -63 -35 -81 -47 -76 -39 16 -122 26 -485 54 -214 17 -414 33 -442 36 l-53 6 0 599 0 599 615 0 615 0 0 -348z m270 341 c0 -5 -5 -15 -10 -23 -8 -12 -10 -11 -10 8 0 12 5 22 10 22 6 0 10 -3 10 -7z m-6115 -4679 c109 -34 205 -120 258 -232 30 -63 32 -74 32 -182 0 -111 -1 -118 -34 -182 -40 -81 -128 -169 -203 -203 -163 -75 -366 -39 -491 87 -131 131 -160 318 -78 494 87 186 310 280 516 218z m6960 -1 c152 -46 272 -187 294 -345 48 -345 -297 -596 -616 -448 -163 75 -264 270 -235 448 44 263 302 423 557 345z" />
                <path d="M1455 936 c-60 -28 -87 -56 -114 -116 -61 -135 19 -289 168 -321 157 -33 305 115 272 272 -33 151 -189 230 -326 165z" />
                <path d="M8412 935 c-201 -102 -163 -388 57 -436 127 -27 256 66 277 199 9 58 -18 141 -61 185 -49 51 -89 69 -160 74 -51 4 -68 0 -113 -22z" />
              </g>
            </svg>
          </div>
        </div>
      </div>
    </main>
<?php
  }
} else {
  header("Location: index.php");
  exit();
}
?>

<?php include('includes/footer1.php'); ?>