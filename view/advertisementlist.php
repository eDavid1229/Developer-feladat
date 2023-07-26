<?php include('view/header.php'); ?>

<section id="list" class="list">
    <header class="list_row list_header">
        <h1>Hírdetések</h1>
        <form action="." method="get" id="list_header_select" class="list_header_select">
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
                <?php endforech; ?>
            </select>
            <button class="add-button bold">Mehet</button>
        </form>
    </header>
</section>

<?php include('view/footer.php'); ?>