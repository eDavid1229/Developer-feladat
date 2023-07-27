<?php require dirname(__DIR__)."/view/header.php";?>

<section id="list" class="list">
    <header class="list__row list__header">
        <h1>
            Hírdetések
        </h1>
        <form action="." method="get" id="list__header_select" class="list__header_select">
            <input type="hidden" name="action" value="list_advertisements">
            <select name="user_id" required>
                <option value="0">Mind</option>
                <?php foreach ($users as $user) : ?>
                <?php if($user_id == $user['userID']) { ?>
                <option value="<?= $user['userID'] ?>" selected>
                    <?php } else { ?>
                <option value="<?= $user['userID'] ?>">
                    <?php } ?>
                    <?= $user['name'] ?>
                </option>
                <?php endforeach; ?>
            </select>
            <button class="add-button bold">Küld</button>
        </form>
    </header>
    <?php if($advertisements) { ?>
        <?php foreach ($advertisements as $advertisment) : ?>
            <div class="list__row">
                <div class="list__item">
                    <p class="bold"><?= "{$advertisment['name']}" ?></p>
                    <p><?= $advertisment['title'] ?></p>
                </div>
                <div class="list_removeItem">
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_advertisement">
                        <input type="hidden" name="advertisement_id" value="<?= $advertisement['ID'] ?>">
                        <button class="remove-button">Törlés</button>
                    </form>
                </div> 
                </div> 
        
        <?php endforeach; ?>
        <?php } else  { ?>
            <br>
            <?php if ($user_id){ ?>
                <p>Nincs megjeleníthető hírdetés a kiválasztott felhasználótól.</p>
                <?php } else { ?>
                    <p>Nincs megjeleníthető hírdetés.</p>
                    <?php }  ?>
                    <br>
                    <?php } ?>
</section>

<section id="add" class="add">
        <h2>Hírdetés hozzáadása</h2>
        <form action="." method="post" id="add__form" class="add__form">
            <input type="hidden" name="action" value="add_advertisement">
            <div class="add__inputs">
                <label">Felhasználó:</label>
                <select name="user_id" required>
                    <option value="">Kérlek Válassz egyet az alábbiak közül:</option>
                    <?php foreach($users as $user) : ?>
                    <option value="<? $user['userID']; ?>">
                    <?= $user['name']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <label>Cím:</label>
                <input type="text" name="title" maxlength="120" placeholder="title" required>
                </div>
                <div class="add__addItem">
                    <button class="add-button bold">Hozzáad</button>
                </div>
        </form>
</section>
<br>
<p><a href=".?action=list_users ">Felhasználó szerkesztése</a></p>

<?php require dirname(__DIR__)."/view/footer.php"; ?>