<?php require dirname(__DIR__)."/view/header.php" ?>


<?php if($users) { ?>


    <section id="list" class="list">
        <header class="list__row list__header">
            <h1>
                Felhasználók listája
            </h1>
        </header>

        <?php foreach ($users as $user) : ?>
            <div class="list__row">
                <div class="list__item">
                    <p class="bold"><?= $user['name'] ?></p>
                </div>
                <div class="list__removeItem"> 
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_user">
                        <input type="hidden" name="user_id" value="<?= $user['userID']; ?>">
                        <button class="remove-button">Törlés</button>
                    </form>
                </div>
        </div>
        <?php endforeach; ?>
        </section>
<?php } else { ?>
    <p>Még nincsenek felhasználók.</p>
<?php } ?>

<section id="add" class="add">
    <h2>
        Felhasználó hozzáadása
    </h2>
    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_user">
        <div class="add__inputs">
            <label>Név:</label>
            <input type="text" name="user_name" maxlength="50" placeholder="Név" autofocus required>
        </div>
        <div class="add__addItem">
            <button class="add-button bold">Hozzáad</button>
        </div>
    </form>
</section>


<br>
<p><a href=".">Nézet &amp; Hírdetés hozzáadása</a></p>
<?php require dirname(__DIR__)."/view/footer.php" ?>