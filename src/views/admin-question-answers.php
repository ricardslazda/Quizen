<div class="admin-content">
    <table style="width:100%">
        <thead>
        <th class="title">Answer ID</th>
        <th class="title">Answer</th>
        <th class="title">Is correct</th>
        <th class="title">Question ID</th>
        </thead>
        <tbody>
        <?php foreach ($questionAnswers as $questionAnswer) { ?>
            <tr>
                <td><?= $questionAnswer['id'] ?></td>
                <td><?= $questionAnswer['text'] ?></td>
                <td><?= $questionAnswer['isCorrect'] ?></td>
                <td><?= $questionAnswer['questionId'] ?></td>
                <form action="/admin/delete-answer" method="post">
                        <input type="hidden" name="id" value="<?=$questionAnswer['id']?>">
                    <td><button class="button button--small" type="submit">Remove</button></td>
                </form>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>