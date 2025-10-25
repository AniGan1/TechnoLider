<div class="row mt-3 mb-5">
    <div class="col-1"></div>
    <div class="col-10">
        <h2 class="text-center">Личный кабинет</h2>
        <div class="">
            <?php if ($teacher):?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Кафедра</th>
                            <th>Ученая степень</th>
                            <th>Должность</th>
                            <th>Контактные данные</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $teacher['department']; ?></td>
                            <td><?= $teacher['academic_degree']; ?></td>
                            <td><?= $teacher['job_title']; ?></td>
                            <td><?= $teacher['contacts_data']; ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php else: ?>
                <form action="" method="post" style="width:400px" class=" mt-3 ms-auto me-auto">
                    <p class="text-center">У вас не установлены данные, заполните!</p>
                    <div class="mt-2">
                        <label for="">Кафедра:</label>
                        <input type="text" name="department" class="form-control">
                    </div>
                    <div class="mt-2">
                        <label for="">Ученая степень:</label>
                        <input type="тгьиук" name="academic_degree" class="form-control">
                    </div>
                    <div class="mt-2">
                        <label for="">Дисциплина:</label>
                        <select name="id_course" class="form_control">
                            <?php foreach ($courses as $row): ?>
                                <option value="<?= $row['id_course']; ?>"><?= $row['title']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mt-2">
                        <label for="">Должность:</label>
                        <input type="text" name="job_title" class="form-control">
                    </div>
                    <div class="mt-2">
                        <label for="">Контактные данные:</label>
                        <input type="text" name="contacts_data" class="form-control">
                    </div>
                    <button class="btn btn-success mt-2" style="width: 100%;">Устанвоить</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-1"></div>
</div>