<div class="row mt-3 mb-5">
    <div class="col-1"></div>
    <div class="col-10">
        <h2 class="text-center">История оценок</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Дисциплина</th>
                    <th>Оценка</th>
                    <th>Тип оаботы</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($grades as $row): ?>
                    <tr>
                        <td><?= $row['id_grade']; ?></td>
                        <td><?= $row['title']; ?></td>
                        <td><?= $row['grade_title']; ?></td>
                        <td><?= $row['title_types']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <?php
        $gradesBySubject = [];

        foreach ($selectGrades as $row) {
            $subject = $row['title'];
            $grade = $row['grade_title'];

            if (!isset($gradesBySubject[$subject])) {
                $gradesBySubject[$subject] = [];
            }
            $gradesBySubject[$subject][] = (float)$grade;
        }

        $averageBySubject = [];
        foreach ($gradesBySubject as $subject => $grades) {
            $averageBySubject[$subject] = round(array_sum($grades) / count($grades), 2);
        }
        ?>
        <div class="mb-4" style="max-width: 500px; margin: 0 auto;">
            <h4 class="text-center">Средние баллы по дисциплинам:</h4>
            <ul class="list-group">
                <?php foreach ($averageBySubject as $subject => $average): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?php echo $subject; ?>
                        <span class="badge bg-primary rounded-pill"><?php echo $average; ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="col-1"></div>
</div>