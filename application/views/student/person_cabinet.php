<div class="row mt-3 mb-5">
    <div class="col-1"></div>
    <div class="col-10">
        <h2 class="text-center">Личный кабинет</h2>
        <div class="">
            <?php if ($student): ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>№ Студенческого билета</th>
                            <th>Группа</th>
                            <th>Год поступления</th>
                            <th>Форма обучения</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th><?= $student['number_stud_ticket']; ?></th>
                            <th><?= $group[0]['title_group']; ?></th>
                            <th><?= $student['year_post']; ?></th>
                            <th><?= $student['form_study']; ?></th>
                        </tr>
                    </tbody>

                </table>
            <?php else: ?>
                <form action="" method="post" style="width:400px" class=" mt-3 ms-auto me-auto">
                    <p class="text-center">У вас не установлены данные, заполните!</p>
                    <div class="mt-2">
                        <label for="">Группа:</label>
                        <select name="id_StudentGroup" class="form-control">
                            <?php foreach ($groups as $row): ?>
                                <option value="<?= $row['id_StudentGroup']; ?>"><?= $row['title_group']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mt-2">
                        <label for="">Год поступления:</label>
                        <input type="тгьиук" name="year_post" class="form-control">
                    </div>
                    <div class="mt-2">
                        <label for="">Форма обучения:</label>
                        <input type="text" name="form_study" class="form-control">
                    </div>
                    <div class="mt-2">
                        <label for="">Номер студенчесокго билета:</label>
                        <input type="text" name="number_stud_ticket" class="form-control">
                    </div>
                    <button class="btn btn-success mt-2" style="width: 100%;">Устанвоить</button>
                </form>

            <?php endif; ?>
        </div>
    </div>
    <div class="col-1"></div>
</div>