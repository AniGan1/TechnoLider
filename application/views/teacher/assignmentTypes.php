<div class="row">
    <div class="col-1"></div>
    <div class="col-10">

        <form action="" method="post" style="width: 300px;" class="ms-auto me-auto mb-4">
            <h2>Типы работ и заданий</h2>
            <div class="d-flex gap-3 mb-3">
                <div class="">
                    <label for="">Название:</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="">
                    <label for="">Вес:</label>
                    <input type="number" name="weight" class="form-control">
                </div>
            </div>
            <button type="submit" style="width: 100%;" class="btn btn-primary">Создать</button>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Название</th>
                    <th>Вес</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($assignmentTypes as $row): ?>
                <tr>
                    <th><?= $row['id_AssignmentType'] ?></th>
                    <th><?= $row['title_types'] ?></th>
                    <th><?= $row['weight'] ?></th>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="col-1"></div>
</div>