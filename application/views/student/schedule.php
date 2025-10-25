<div class="row mt-3 mb-5">
    <div class="col-1"></div>
    <div class="col-10">
        <h2 class="text-center">Расписание</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Группа</th>
                    <th>Дисциплина</th>
                    <th>Дата и время</th>
                    <th>№ Аудитории</th>
                    <th>Преподаватель</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($schedules as $row): ?>
                    <tr>
                        <td><?= $row['title_group']; ?></td>
                        <td><?= $row['title']; ?></td>
                        <td><?= $row['datetime']; ?></td>
                        <td><?= $row['audience']; ?></td>
                         <td><?= $row['contacts_data']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="col-1"></div>
</div>