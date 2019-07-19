<div class="admin-content">
    <table style="width:100%">
        <thead>
        <th class="title">Quiz ID</th>
        <th class="title">Topic</th>
        </thead>
        <tbody>
        <?php foreach ($quizzes as $quiz) { ?>
            <tr>
                <td><?= $quiz['id'] ?></td>
                <td><?= $quiz['text'] ?></td>
                <form action="/admin/delete-quiz" method="post">
                    <input type="hidden" name="id" value="<?=$quiz['id']?>">
                    <td><button class="button button--small" type="submit">Remove</button></td>
                </form>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
