<div class="row">
    <div class="col-1"></div>
    <div class="col-10">
        <h2 class="text-center">Расписание</h2>
        <form action="" method="post" style="width: 300px;" class="ms-auto me-auto mb-3">
            <div class="d-flex gap-5">
                <div class="">
                    <label for="">Дисциплина:</label>
                    <select name="id_course" class="form-control">
                        <?php foreach ($courses as $row): ?>
                            <option value="<?= $row['id_course'] ?>"><?= $row['title'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="">
                    <label for="">Группа:</label>
                    <select name="id_StudentGroup" class="form-control">
                        <?php foreach ($groups as $row): ?>
                            <option value="<?= $row['id_StudentGroup'] ?>"><?= $row['title_group'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="d-flex gap-5 mb-3">
                <div class="">
                    <label for="">Аудитория:</label>
                    <input type="number" name="audience" class="form-control">
                </div>
                <div class="">
                    <label for="">Дата и время:</label>
                    <input type="datetime-local" name="datetime" class="form-control">
                </div>
            </div>
            <button class="btn btn-primary" style="width: 100%;">Установить</button>
        </form>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Дисциплина</th>
                    <th>Группа</th>
                    <th>Дата и время</th>
                    <th>Аудитория</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($schedule as $row): ?>
                    <tr>
                        <td><?= $row['title']; ?></td>
                        <td><?= $row['title_group']; ?></td>
                        <td><?= $row['datetime']; ?></td>
                        <td><?= $row['audience']; ?></td>
                        <td><a href="<?= base_url('teacher/editlesson/' . $row['id_lesson']); ?>" class="btn btn-success">Изменить</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="col-1"></div>
</div>