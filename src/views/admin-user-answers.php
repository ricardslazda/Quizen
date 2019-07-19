<div class="admin-content">
    <table style="width:100%">
        <thead>
        <th class="title">User ID</th>
        <th class="title">Question ID</th>
        <th class="title">Answer ID</th>
        <th class="title">Quiz ID</th>
        </thead>
        <tbody>
        <?php foreach ($userAnswers as $userAnswer) { ?>
            <tr>
                <td><?= $userAnswer['userId'] ?></td>
                <td><?= $userAnswer['questionId'] ?></td>
                <td><?= $userAnswer['answerId'] ?></td>
                <td><?= $userAnswer['quizId'] ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>