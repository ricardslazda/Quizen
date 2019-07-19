<div class="admin-content">
    <table style="width:100%">
        <thead>
        <th class="title">Question ID</th>
        <th class="title">Question</th>
        <th class="title">Quiz ID</th>
        </thead>
        <tbody>
        <?php foreach ($questions as $question) { ?>
            <tr>
                <td><?= $question['id'] ?></td>
                <td><?= $question['text'] ?></td>
                <td><?= $question['quizId'] ?></td>
                <form action="/admin/delete-question" method="post">
                    <input type="hidden" name="id" value="<?=$question['id']?>">
                <td><button class="button button--small" type="submit">Remove</button></td>
                </form>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>