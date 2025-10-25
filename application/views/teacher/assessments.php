<div class="row">
    <div class="col-1"></div>
    <div class="col-10">
        <h2>Оценки</h2>
        <form action="" method="post" style="width: 250px;" class="ms-auto me-auto mb-3">
            <div class="d-flex mt-3">
                <div>
                    <label for="">Номер студенческого билета</label>
                    <select name="id_student" class="form-control">
                        <?php foreach ($students as $row): ?>
                            <option value="<?= $row['id_student'] ?>"><?= $row['number_stud_ticket'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="d-flex mt-3 gap-3">
                <div>
                    <label for="">Тип работы</label>
                    <select name="id_AssignmentType" class="form-control">
                        <?php foreach ($assignmentTypes as $row): ?>
                            <option value="<?= $row['id_AssignmentType'] ?>"><?= $row['title_types'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="">Дисциплина</label>
                    <select name="id_course" class="form-control">
                        <?php foreach ($courses as $row): ?>
                            <option value="<?= $row['id_course'] ?>"><?= $row['title'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="mt-3 mb-3">
                <label for="">Оценка</label>
                <input type="number" name="grade_title" class="form-control">
            </div>
            <button class="btn-primary btn">Выставить</button>
        </form>
        <table class="table  mt-4">
            <thead>
                <tr>
                    <th>№ студенческого билета</th>
                    <th>Дата</th>
                    <th>Дисциплина</th>
                    <th>Оценка</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($grades as $row): ?>
                    <tr>
                        <td><?= $row['number_stud_ticket']; ?></td>
                        <td><?= $row['date']; ?></td>
                        <td><?= $row['title']; ?></td>
                        <td><?= $row['grade_title']; ?></td>
                       <td><a href="<?= base_url('teacher/editgrade/'.$row['id_grade']); ?>" class="btn btn-success">Изменить</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="col-1"></div>
</div>