<?php
$validConsoles = [
    'n-2025-h',
    'n-2021-h',
    'n-2017-h',
    'n-2012-h',
    'n-2006-h',
    'n-2001-h',
    'n-1996-h',
    'n-1990-h',

    'n-2019-m',
    'n-2017-m',
    'n-2014-m-2',
    'n-2014-m',
    'n-2013-m',
    'n-2012-m',
    'n-2011-m',
    'n-2009-m',
    'n-2008-m',
    'n-2006-m',
    'n-2004-m',
    'n-2005-m',
    'n-2003-m',
    'n-2001-m',
    'n-1998-m',
    'n-1998-m-2-jp',
    'n-1996-m',
    'n-1989-m',

    'p-1994-h',
    'p-2000-h',
    'p-2006-h',
    'p-2013-h',
    'p-2020-h',
    'p-2004-m',

    'x-2020-h-2',
    'x-2020-h',
    'x-2013-h',
    'x-2005-h',
    'x-2001-h',

    's-1998-h',
    's-1994-h-2',
    's-1994-h',
    's-1991-h',
    's-1989-h',
    's-1986-h',
    's-1983-h',

    'pc',
    'android',
    'ios'
];
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>

<body>
    <?php include("./includes/navigation.php") ?>
    <?php 
        if (!empty($_POST)) {
            $ERROR = '';
            $code = 'GAME-' . $_POST['InventoryCode'] ?? NULL;
            $name = $_POST['GameName'] ?? NULL;
            $console = $_POST['Console'] ?? NULL;
            $price = $_POST['Price'] ?? NULL;
            $image = $_POST['IMG'] ?? NULL;
            if (!preg_match('/^GAME-[0-9]{4}$/', $code)) {
                $ERROR = $ERROR . 'Code <code>'. $code . '</code> invalid format: please use the format <code>GAME-####</code><br>';
                $code = '';
                }
            if (!in_array($console, $validConsoles, true)) {
                $ERROR = $ERROR . 'Invalid console <code>'. $console .'</code>: please use dropdown to input valid console or contact website administrator if you think there is an issue. <br>';
                }
            if ($price < 0) {
                $ERROR = $ERROR . 'Price must be <code>$0</code> or more<br>';
                $price = 0;
                }
            if (!isset($_FILES['IMG']) || $_FILES['IMG']['error'] !== UPLOAD_ERR_OK) {
                $ERROR = $ERROR . "Image Failed to upload, please try again <br>";
                }
        }
    ?>
    <main class="row w-100 justify-content-center">
        <div class="col-12 col-md-6 col-lg-4 p-0">
            <div class="card p-4 shadow m-0">
                <form action="index.php" method="POST" enctype="multipart/form-data">
                    <label for="InventoryCode" class="form-label">Code : </label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">GAME-</span>
                        </div>
                        <input name="InventoryCode" class="form-control" placeholder="1234" value="<?= htmlspecialchars(substr($code ?? '',5), ENT_QUOTES, 'UTF-8'); ?>" required/>
                    </div>
                    <label for="GameName" class="form-label">Game Name: </label>
                    <input name="GameName" class="form-control" placeholder="Quake 3" value="<?= htmlspecialchars($name ?? '', ENT_QUOTES, 'UTF-8'); ?>" required />
                    <label for="Console" class="form-label">Console: </label>
                    <select name="Console" class="form-select" required>
                        <optgroup label="Nintendo - Home">
                            <option value="n-2025-h">(NX2) Nintendo Switch 2</option>
                            <option value="n-2021-h">(NX-O) Nintendo Switch OLED</option>
                            <option value="n-2017-h">(NX) Nintendo Switch</option>
                            <option value="n-2012-h">(WUP) Wii U</option>
                            <option value="n-2006-h">(RVL) Wii</option>
                            <option value="n-2001-h">(DOL) Gamecube</option>
                            <option value="n-1996-h">(N64) Nintendo 64</option>
                            <option value="n-1990-h">(SNES) Super Nintendo Entertainment System</option>
                            <option value="n-1983-h">(NES) Nintendo Entertainment System</option>
                        </optgroup>
                        <optgroup label="Nintendo - Handheld">
                            <option value="n-2019-m">(NX-L) Nintendo Switch Lite</option>
                            <option value="n-2017-m">(N2DSXL) New Nintendo 2DS XL</option>
                            <option value="n-2014-m-2">(N3DSXL) New Nintendo 3DS XL</option>
                            <option value="n-2014-m">(N3DS) New Nintendo 3DS</option>
                            <option value="n-2013-m">(2DS) Nintendo 2DS</option>
                            <option value="n-2012-m">(3DSXL) Nintendo 3DS XL</option>
                            <option value="n-2011-m">(3DS) Nintendo 3DS</option>
                            <option value="n-2009-m">(DSiXL) Nintendo DSi XL</option>
                            <option value="n-2008-m">(DSi) Nintendo DSi</option>
                            <option value="n-2006-m">(DSl) Nintendo DS Lite</option>
                            <option value="n-2004-m">(DS) Nintendo DS</option>
                            <option value="n-2005-m">(GBA-M) Game Boy Advance Micro</option>
                            <option value="n-2003-m">(GBA-SP) Game Boy Advance SP</option>
                            <option value="n-2001-m">(GBA) Game Boy Advance</option>
                            <option value="n-1998-m">(GBC) Game Boy Color</option>
                            <option value="n-1998-m-2-jp">(GB-L) Game Boy Light</option>
                            <option value="n-1996-m">(GB-P) Game Boy Pocket</option>
                            <option value="n-1989-m">(GB) Game Boy</option>
                        </optgroup>
                        <optgroup label="Playstation - Home">
                            <option value="p-2020-h">(PS5) PlayStation 5</option>
                            <option value="p-2013-h">(PS4) PlayStation 4</option>
                            <option value="p-2006-h">(PS3) PlayStation 3</option>
                            <option value="p-2000-h">(PS2) PlayStation 2</option>
                            <option value="p-1994-h">(PSX) PlayStation</option>
                            
                            
                            
                            
                        </optgroup>
                        <optgroup label="PlayStation - Handheld">
                            <option value="p-2011-m">(Vita) PlayStation Vita</option>
                            <option value="p-2004-m">(PSP) PlayStation Portable</option>
                            
                        </optgroup>
                        <optgroup label="Xbox">
                            <option value="x-2020-h-2">(X-SX) Xbox Series X</option>
                            <option value="x-2020-h">(X-SS) Xbox Series S</option>
                            <option value="x-2013-h">(XOne) Xbox One</option>
                            <option value="x-2005-h">(X360) Xbox 360</option>
                            <option value="x-2001-h">(Xbox) Xbox</option>
                        </optgroup>
                        <optgroup label="Sega">
                            <option value="s-1998-h">(SDC) Sega Dreamcast</option>
                            <option value="s-1994-h-2">(SSAT) Sega Saturn</option>
                            <option value="s-1994-h">(S32X) Sega 32X</option>
                            <option value="s-1991-h">(SCD) Sega CD</option>
                            <option value="s-1989-h">(SGEN) Sega Genesis</option>
                            <option value="s-1986-h">(SMS) Sega Master System</option>
                            <option value="s-1983-h">(SSG) Sega SG-1000</option>
                        </optgroup>
                        <optgroup label="Misc">
                            <option value="pc">(PC) Personal Computer</option>
                            <option value="android">(Android) Android Smartphone</option>
                            <option value="ios">(IOS) Apple Smartphone</option>
                        </optgroup>
                    </select>
                    <label for="Price" class="form-label">Price: </label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="number" name="Price" class="form-control" required min="0" value="<?= htmlspecialchars($price ?? '', ENT_QUOTES, 'UTF-8') ; ?>">
                    </div>
                    <label for="IMG" class="form-label">Image: </label>
                    <input type="file" name="IMG" accept="image/*" class="form-control" required>
                    <input type="submit" value="Send">
                </form>
            </div>
        </div>
        <?php 
        if ($_POST && $ERROR !== '') {echo('<div class="card p-4 shadow alert alert-warning"><strong class="warning">' . $ERROR . '</strong></div>');}
        
         ?>
    </main>
</body>

</html>